<!-- index.blade.php -->
@extends('layouts.layout')

@section('header-extra')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script type="text/javascript" src="./lib/raphael-min.js"></script>
    <script type="text/javascript" src="./lib/es5-shim.min.js"></script>
    <script type="text/javascript" src="./lib/state-machine.min.js"></script>
    <script type="text/javascript" src="./lib/async.min.js"></script>

    <script type="text/javascript" src="./js/jquery-ui.min.js"></script>

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
   $(document).ready(function() {
    if (!Raphael.svg) {
        window.location = './notsupported.html';
    }

    // suppress select events
    $(window).bind('selectstart', function(event) {
        event.preventDefault();
    });

    // initialize visualization
    Panel.init();
    Controller.init();

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
    });
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
  
      function confirmAction(){
        $.ajax({
            type: "POST",
            url: "/select-store",
            data:{
              Coord: storeSelection,
              _token : '<?php echo csrf_token() ?>",
            },
            success:function(data){
              console.log(data.msg);
              $("#msg").html(data.msg);
            },
        });
      }
</script>



    <div id="draw_area">
      
    </div>
   
<div id="instructions_panel" class="panel">
    </div>

    <div id="algorithm_panel" class="panel right_panel">

      <div class="accordion">
        

      </div><!-- .accordion -->
    </div><!-- #algorithm_panel -->

    <!-- by ZW: confirmAction button should send xgrid and ygrid from var storeSelection and send it back to the backend-->
    <div class="btn-center">
    	 <button name="confirm" id="confirm_address" class="btn btn-md" onclick="confirmAction()">Confirm your address</button>
    </div>
        <div class="btn-center">
       <button name="confirm" id="confirm_address" class="btn btn-md" onclick="clearStores()">test</button>
    </div>

    <div id="play_panel" class="panel right_panel" style="display:none">

      <button id="button1" class="control_button">Start Search</button>
      <button id="button2" class="control_button">Pause Search</button>
      <button id="button3" class="control_button">Clear Walls</button>
    </div>

    <div id="stats"></div>
</div>
@endsection
