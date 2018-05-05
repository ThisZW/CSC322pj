<!-- index.blade.php -->
@extends('layouts.index')

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

<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('myAccount')}}">
                                        {{ __('My Account') }} </a>
                                    <a class="dropdown-item" href="{{ route('myOrders')}}">
                                        {{ __('My Orders')}} </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


 <div class="main-page container">
	<script type="text/javascript">
        //by Zw, this can be the field that takes parameter from backend(address/axis)
    var stores = {!! json_encode($data) !!};
    var tempStores = [];
    var check = false;
    var storeSelection = [];
    var customerAddressSelection = [];

    var url="{{Request::url() . '/stores/'}}";
    var imgRoot = "{{ asset('images/product-images')}}" ;
    $(document).ready(function() {
      if (!Raphael.svg) {
          window.location = './notsupported.html';
      }

      $('#confirm-address').click(function(event) {
        $.ajax({
            type: "POST",
            url: '/select-store',
            data: {coord: storeSelection,
                    customerAddr: customerAddressSelection,
                    _token: "{{ csrf_token() }}"},
            success: function(data) {
                console.log(data.data.products);
                $('#store-display-area').show();
                $('#confirm-address').hide();
                $('#view-listing').show();
                $('#view-listing').click(function(){
                  window.location.href= '/stores/' + data.data.id +'/menu';
                });
                $('#store-display-area h3').text('You have Selected your store: ' + data.data.name);
                for (var i = 0; i < 3; i++){
                  $('#product-'+ (parseInt(i)+1) +' a').attr('href',url + data.data.id +'/menu/'+ data.data.products[i].category_id +
                             '/product/' + data.data.products[i].id);
                  $('#product-'+ (parseInt(i)+1) +' .menu-product-image').attr('src', imgRoot + '/' + data.data.products[i].image);
                  $('#product-'+ (parseInt(i)+1) +' h4').text(data.data.products[i].name);                   
                  $('#product-'+ (parseInt(i)+1) +' .menu-price').text( '$' + data.data.products[i].price_t1);
                }
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
            customerAddressSelection = [];
            customerAddressSelection.push(gridX, gridY);
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

<h2 class="center">Welcome to the iEats! Select your address and choose your store before starting your order!</h2>
  <div id="draw_area"></div>
<div id="store-display-area">
  <div class="row">
    <h3><p id="store-name"></p></h3>
  </div>
  <div class="row">
    <div class="col-1"></div>
    <div class="col-3 small-product" id="product-2">
      <a href=""><div class="menu-product-div">
        <img class="menu-product-image" src=""/>
          <h4></h4>
          <div class="menu-price"></div>
      </div></a>
    </div>
    <div class="col-4 large-product" id="product-1">
      <a href=""><div class="menu-product-div">
        <img class="menu-product-image" src=""/>
          <h4 class="center"></h4>
          <div class="menu-price"></div>
      </div></a>
    </div>
    <div class="col-3 small-product" id="product-3">
      <a href=""><div class="menu-product-div">
        <img class="menu-product-image" src=""/>
          <h4 class="center"></h4>
          <div class="menu-price"></div>
      </div></a>
    </div>
    <div class="col-1"></div>
  </div>



</div>
  <button id="confirm-address" class="btn btn-md center">Confirm Store and Your Address! </button>
  <button id="view-listing" class="btn btn-md center"> View Full Categories. </button>
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
