<!-- index.blade.php -->
@extends('layouts.layout')

@section('header-extra')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="./lib/raphael-min.js"></script>
    <script type="text/javascript" src="./lib/es5-shim.min.js"></script>
    <script type="text/javascript" src="./lib/state-machine.min.js"></script>
    <script type="text/javascript" src="./lib/async.min.js"></script>
    <script type="text/javascript" src="./lib/pathfinding-browser.min.js"></script>
    <script type="text/javascript" src="./lib/pathfinding-browser.min.js"></script>
    <script type="text/javascript" src="./js/view.js"></script>
    <script type="text/javascript" src="./js/controller.js"></script>
    <script type="text/javascript" src="./js/panel.js"></script>
@endsection


@section('front-content')
 <div class="main-page container">
	<script type="text/javascript">
        //by Zw, this can be the field that takes parameter from backend(address/axis)
    var stores = {!! json_encode($data) !!};
    var tempStores = [];
    var check = false;
    var storeSelection = [];
    var customerAddressSelection = [];

    $(document).ready(function() {
      if (!Raphael.svg) {
          window.location = './notsupported.html';
      }

      $('#confirm-address').click(function(event) {
        $.ajax({
            type: "POST",
            url: '/select-store',
            data: {coord: storeSelection,
                    _token: "{{ csrf_token() }}"},
            success: function(msg) {
                console.log(msg);
            }
        });
      });

      $.extend(Controller,{
        //overwrite
        mousedown: function (event) {
          //set offset to the draw area first, in order to make the event of x,y work
          var posX = $('#draw_area').offset().left;
          var posY = $('#draw_area').offset().top;
          var coord = View.toGridCoordinate(event.pageX-posX, event.pageY-posY),
          gridX = coord[0],
          gridY = coord[1],
          grid  = this.grid;

          console.log(tempStores);

          for ( i in tempStores){
            if (tempStores[i].x_grid == gridX && tempStores[i].y_grid == gridY)
              check = true;
          }

          if(check){
            this.setSelectedNode(gridX,gridY);
            storeSelection = [];
            storeSelection.push(gridX, gridY);
            check = false;
          }
          else if (this.can('eraseWall') && !grid.isWalkableAt(gridX, gridY)) {
            this.setEndPos(gridX, gridY);
            findNearestStores(gridX,gridY);
          }
        },

        setDefaultStartEndPos: function() {
          var width, height,
              marginRight, availWidth,
              centerX, centerY,
              endX, endY,
              nodeSize = View.nodeSize;

          width  = $(window).width();
          height = $(window).height();

          marginRight = $('#algorithm_panel').width();
          availWidth = width - marginRight;

          centerX = Math.ceil(availWidth / 2 / nodeSize);
          centerY = Math.floor(height / 2 / nodeSize);

          //set default blocks
          for (height = 0; height < 18; height++) {
              for (width = 0;  width < 32; width++) {
                  if ((height % 3 !== 0) && (width % 4 !== 0))
                      this.setWalkableAt(width, height, false);
              }
          }
        },

      });
      // suppress select events
      $(window).bind('selectstart', function(event) {
          event.preventDefault();
      });

      // initialize visualization
      Panel.init();
      Controller.init();

    //Controller.setStartPosWithoutDeletePrev(10,10);
      });


   //拉出所有store, 算路程，sort， 输出三个store , 输出的同时清除之前出现位置的其他store
    function findNearestStores(x , y){
        for (var i in stores){
          if (i==3)
            break;
          else
            Controller.flushCurrentGreenNodes(stores[i]);
            tempStores = []; //this will clear current nearest stores before getting new ones.
        }

        for(var i in stores){
          stores[i].distance = Math.sqrt( Math.pow((stores[i].x_grid - x), 2) + Math.pow((stores[i].y_grid - y),2));
        }
        stores.sort(function(a,b){ 
            var x = a.distance < b.distance? -1:1; 
            return x; 
        });
        for(var i in stores){
          if (i==3)
            break;
          else
            tempStores.push({x_grid : stores[i].x_grid, y_grid : stores[i].y_grid });
            Controller.setStartPosWithoutDeletePrev(stores[i].x_grid, stores[i].y_grid);
        }
    }

</script>

  <div id="draw_area"></div>

  <button id="confirm-address" class="btn btn-md center">Confirm Store and Your Address! </button>
    <div id="instructions_panel" class="panel">
    </div>
    <div id="algorithm_panel" class="panel right_panel">
      <header><h2 class="header_title">Select Algorithm</h2></header>
      <div class="accordion">
      </div><!-- .accordion -->
    </div><!-- #algorithm_panel -->
    <div id="play_panel" class="panel right_panel">
    </div>
    <div id="stats"></div>
</div>
@endsection
