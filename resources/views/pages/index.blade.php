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

    //by Zw, this can be the field that takes parameter from backend(address/axis)
    $.extend(Controller,{
      x1 : 10, y1 : 11,
      x2 : 8 , y2 : 16,
      x3 : 9 , y3 : 10
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

		if (this.can('eraseWall') && !grid.isWalkableAt(gridX, gridY)) {
		  this.setEndPos(gridX, gridY);
		}
      },
    });
    //Controller.setStartPosWithoutDeletePrev(10,10);
});

   //思路: 用ajax在后端把三个最近地址送到前端 通过extend打进controller class 然后跑这个function把三个startPos画出来当做stores?
    function confirmAction(){
      Controller.setStartPosWithoutDeletePrev(Controller.x1,Controller.y1);
      Controller.setStartPosWithoutDeletePrev(Controller.x2,Controller.y2);
      Controller.setStartPosWithoutDeletePrev(Controller.x3,Controller.y3); 
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

    <div class="btn-center">
    	 <button name="confirm" id="confirm_address" class="btn btn-md" onclick="confirmAction()">Confirm your address</button>
    </div>
    <div id="play_panel" class="panel right_panel" style="display:none">

      <button id="button1" class="control_button">Start Search</button>
      <button id="button2" class="control_button">Pause Search</button>
      <button id="button3" class="control_button">Clear Walls</button>
    </div>

    <div id="stats"></div>
</div>
@endsection
