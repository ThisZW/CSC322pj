<!-- index.blade.php -->
@extends('layouts.layout')

@section('header-extra')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="./lib/raphael-min.js"></script>
    <script type="text/javascript" src="./lib/es5-shim.min.js"></script>
    <script type="text/javascript" src="./lib/state-machine.min.js"></script>
    <script type="text/javascript" src="./lib/async.min.js"></script>

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
      $('#confirm_address').click(function(event) {
        $.ajax({
            type: "POST",
            url: "/select-store",
            data:{
              Coord: storeSelection,
            },
            success:function(data){
              console.log(data.msg);
              $("#msg").html(data.msg);
            },
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



    <div id="instructions_panel" class="panel">
      <header>
        <h2 class="header_title">Instructions</h2>
        <span id="hide_instructions">hide</span>
      </header>
      Click within the <span class="white">white</span> grid and drag your mouse to draw obstacles. <br>
      Drag the <span class="green">green</span> node to set the start position. <br>
      Drag the <span class="red">red</span> node to set the end position. <br>
      Choose an algorithm from the right-hand panel. <br>
      Click Start Search in the lower-right corner to start the animation.
    </div>

    <div id="algorithm_panel" class="panel right_panel">
      <header><h2 class="header_title">Select Algorithm</h2></header>

      <div class="accordion">
        <h3 id="astar_header"><a href="#">A*</a></h3>
        <div id="astar_section" class="finder_section">
          <header class="option_header">
            <h3>Heuristic</h3>
          </header>
          <div id="astar_heuristic" class="sub_options">
            <input type="radio" name="astar_heuristic" value="manhattan" checked />
            <label class="option_label">Manhattan</label> <br>
            <input type="radio" name="astar_heuristic" value="euclidean"/>
            <label class="option_label">Euclidean</label> <br>
            <input type="radio" name="astar_heuristic" value="octile"/>
            <label class="option_label">Octile</label> <br>
            <input type="radio" name="astar_heuristic" value="chebyshev"/>
            <label class="option_label">Chebyshev</label> <br>
          </div>

          <header class="option_header">
            <h3>Options</h3>
          </header>
          <div class="optional sub_options">
            <input type="checkbox" class="allow_diagonal" checked>
            <label class="option_label">Allow Diagonal</label> <br>
            <input type="checkbox" class="bi-directional">
            <label class="option_label">Bi-directional</label> <br>
            <input type="checkbox" class="dont_cross_corners">
            <label class="option_label">Don't Cross Corners</label> <br>
            <input class="spinner" name="astar_weight" value="1">
            <label class="option_label">Weight</label> <br>
          </div>
        </div>

        <h3 id="ida_header"><a href="#">IDA*</a></h3>
        <div id="ida_section" class="finder_section">
          <header class="option_header">
            <h3>Heuristic</h3>
          </header>
          <div id="ida_heuristic" class="sub_options">
            <input type="radio" name="ida_heuristic" value="manhattan" checked />
            <label class="option_label">Manhattan</label> <br>
            <input type="radio" name="ida_heuristic" value="euclidean"/>
            <label class="option_label">Euclidean</label> <br>
            <input type="radio" name="ida_heuristic" value="octile"/>
            <label class="option_label">Octile</label> <br>
            <input type="radio" name="ida_heuristic" value="chebyshev"/>
            <label class="option_label">Chebyshev</label> <br>
          </div>
          <header class="option_header">
            <h3>Options</h3>
          </header>
          <div class="optional sub_options">
            <input type="checkbox" class="allow_diagonal" checked>
            <label class="option_label">Allow Diagonal</label> <br>
            <input type="checkbox" class="dont_cross_corners">
            <label class="option_label">Don't Cross Corners</label> <br>
            <input class="spinner" name="astar_weight" value="1">
            <label class="option_label">Weight</label> <br>
            <input class="spinner" name="time_limit" value="10">
            <label class="option_label">Seconds limit</label> <br>
            <input type="checkbox" class="track_recursion" checked />
            <label class="option_label">Visualize recursion</label> <br>
          </div>
        </div>

        <h3 id="breadthfirst_header"><a href="#">Breadth-First-Search</a></h3>
        <div id="breadthfirst_section" class="finder_section">
          <header class="option_header">
            <h3>Options</h3>
          </header>
          <div class="optional sub_options">
            <input type="checkbox" class="allow_diagonal" checked>
            <label class="option_label">Allow Diagonal</label> <br>
            <input type="checkbox" class="bi-directional">
            <label class="option_label">Bi-directional</label> <br>
            <input type="checkbox" class="dont_cross_corners">
            <label class="option_label">Don't Cross Corners</label> <br>
          </div>
        </div>

        <h3 id="bestfirst_header"><a href="#">Best-First-Search</a></h3>
        <div id="bestfirst_section" class="finder_section">
          <header class="option_header">
            <h3>Heuristic</h3>
          </header>
          <div id="bestfirst_heuristic" class="sub_options">
            <input type="radio" name="bestfirst_heuristic" value="manhattan" checked />
            <label class="option_label">Manhattan</label> <br>
            <input type="radio" name="bestfirst_heuristic" value="euclidean"/>
            <label class="option_label">Euclidean</label> <br>
            <input type="radio" name="bestfirst_heuristic" value="octile"/>
            <label class="option_label">Octile</label> <br>
            <input type="radio" name="bestfirst_heuristic" value="chebyshev"/>
            <label class="option_label">Chebyshev</label> <br>
          </div>

          <header class="option_header">
            <h3>Options</h3>
          </header>
          <div class="optional sub_options">
            <input type="checkbox" class="allow_diagonal" checked>
            <label class="option_label">Allow Diagonal</label> <br>
            <input type="checkbox" class="bi-directional">
            <label class="option_label">Bi-directional</label> <br>
            <input type="checkbox" class="dont_cross_corners">
            <label class="option_label">Don't Cross Corners</label> <br>
          </div>
        </div>

        <h3 id="dijkstra_header"><a href="#">Dijkstra</a></h3>
        <div id="dijkstra_section" class="finder_section">
          <header class="option_header">
            <h3>Options</h3>
          </header>
          <div class="optional sub_options">
            <input type="checkbox" class="allow_diagonal" checked>
            <label class="option_label">Allow Diagonal</label> <br>
            <input type="checkbox" class="bi-directional">
            <label class="option_label">Bi-directional</label> <br>
            <input type="checkbox" class="dont_cross_corners">
            <label class="option_label">Don't Cross Corners</label> <br>
          </div>
        </div>

        <h3 id="jump_point_header"><a href="#">Jump Point Search</a></h3>
        <div id="jump_point_section" class="finder_section">
          <header class="option_header">
            <h3>Heuristic</h3>
          </header>
          <div id="jump_point_heuristic" class="sub_options">
            <input type="radio" name="jump_point_heuristic" value="manhattan" checked />
            <label class="option_label">Manhattan</label> <br>
            <input type="radio" name="jump_point_heuristic" value="euclidean"/>
            <label class="option_label">Euclidean</label> <br>
            <input type="radio" name="jump_point_heuristic" value="octile"/>
            <label class="option_label">Octile</label> <br>
            <input type="radio" name="jump_point_heuristic" value="chebyshev"/>
            <label class="option_label">Chebyshev</label> <br>
          </div>
          <header class="option_header">
            <h3>Options</h3>
          </header>
          <div class="optional sub_options">
            <input type="checkbox" class="track_recursion" checked>
            <label class="option_label">Visualize recursion</label> <br>
          </div>
        </div>

  <h3 id="orth_jump_point_header"><a href="#">Orthogonal Jump Point Search</a></h3>
        <div id="orth_jump_point_section" class="finder_section">
          <header class="option_header">
            <h3>Heuristic</h3>
          </header>
          <div id="orth_jump_point_heuristic" class="sub_options">
            <input type="radio" name="orth_jump_point_heuristic" value="manhattan" checked />
            <label class="option_label">Manhattan</label> <br>
            <input type="radio" name="orth_jump_point_heuristic" value="euclidean"/>
            <label class="option_label">Euclidean</label> <br>
            <input type="radio" name="orth_jump_point_heuristic" value="octile"/>
            <label class="option_label">Octile</label> <br>
            <input type="radio" name="orth_jump_point_heuristic" value="chebyshev"/>
            <label class="option_label">Chebyshev</label> <br>
          </div>
          <header class="option_header">
            <h3>Options</h3>
          </header>
          <div class="optional sub_options">
            <input type="checkbox" class="track_recursion" checked>
            <label class="option_label">Visualize recursion</label> <br>
          </div>
        </div>

      </div><!-- .accordion -->
    </div><!-- #algorithm_panel -->

    <div id="play_panel" class="panel right_panel">
      <button id="button1" class="control_button">Start Search</button>
      <button id="button2" class="control_button">Pause Search</button>
      <button id="button3" class="control_button">Clear Walls</button>
    </div>

    <div id="stats"></div>
</div>
@endsection
