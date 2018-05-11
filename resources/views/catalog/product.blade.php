 @extends('layouts.layout')
 
 @section('front-content')
<div class="product-container main">
	@guest
	<div class="notification">You are currently a visitor in this website, <a href="{{ route('login') }}">login</a> / <a href="{{ route('login') }}">register</a> if you want to receive a better price!</div>
	 @php
		 $price_for_user = $data->price_t1;
	 @endphp
	@else
	
	 @php
	 	if($tier ==3){
			echo '<div class="notification">You are currently a VIP based on your excellent rating, you will receive best prices.</div>';
			$price_for_user = $data->price_t3;
		}
		else if($tier == 2){
			echo '<div class="notification">You are currently a member of this website, you will enjoy your member price.</div>';
			$price_for_user = $data->price_t2;
		}
		else{
			echo '<div class="notification">Your rating is low, your price will be the same as visitors until you raise up your rating.</div>';
			$price_for_user = $data->price_t1;
		}
	 @endphp
	@endguest

	<div class="product-image">
	<img src="{{asset('images/product-images/' . $data->image)}}" border ="10" style="border-style: inset" 
	   style = "border-color: coral" width="400" height="400" alt="Image of tea"
	title="picture of tea"/>

	</div>


	<div class="product-side">
		<form action="{{ route('addToCart')}}" method="POST" >
				@csrf
	     <div class="product-name"> {{$data->name}}</div>
	      <p class="price-label">$<span class="price-field">{{ number_format($price_for_user,2)}}</span></p>

	     <!--For size Options-->
		 <h6> Select a Size</h6>
		    <div class="options">
		       <select id="size" name="option[size]">
		       		@foreach($data->productOptions as $o)
		       			@if ($o->option_type == 'size')
		       				<option data-add-on="{{$o->add_on_price,2}}" value="{{$o->id}}">{{$o->option_name}}</option>
		       				@endif
					@endforeach
			   </select> 
			</div>


		<script language="javascript">
		var currentPrice = $(".price-field").text();
		var addSizePrice = 0;
		var addOptionPrice = 0; 
		@if ($data->productOptions->count() != 0)
		 $(document).ready(function(){
		    $("#size").change(function(){
		        addSizePrice = $(this).find(':selected').data('addOn');
		        $(".price-field").text( parseFloat(currentPrice) + parseFloat(addSizePrice) + parseFloat(addOptionPrice));
		    }).trigger('change');
		    $("#option").change(function(){
		        addOptionPrice = $(this).find(':selected').data('addOn');
		        $(".price-field").text( parseFloat(currentPrice) + parseFloat(addSizePrice) + parseFloat(addOptionPrice));
		    }).trigger('change');
		});
		 @endif
	    </script>
	    <p></p>

	    <!-- for general options -->
		  <h6> Select a Option: </h6>
		  <div class="options">
		    <select id="option" name="option[option]">
		       		@foreach($data->productOptions as $o)
		       			@if ($o->option_type == 'option')
		       				<option data-add-on="{{$o->add_on_price,2}}" value="{{$o->id}}">{{$o->option_name}}</option>
		       				@endif
					@endforeach
		   </select>
		</div>
	        <p> </p>


		  <h6> Select Quantity: </h6>

		<p></p>

                <input type="number" value="1"  name="quantity" min="1" max="100" step="1" >
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="name" value="{{ $data->name}}">
                <input type="hidden" name="price" value="{{ $price_for_user }}"><br>
                <input type="submit" class="btn btn-success btn-md add-to-cart-btn" value="Add to Cart">
		   </form>
	  
	  
	  </div>	  
	  <div class="product-descriptions">
	  
	  <!-- This will be linked to the rating model -->
	  <h2> Star Rating </h2>
	  <span class="fa fa-star checked"></span>
	  <span class="fa fa-star checked"></span>
	  <span class="fa fa-star checked"></span>
	  <span class="fa fa-star checked"></span>
	  <span class="fa fa-star checked"></span>
	  
	  {!! html_entity_decode($data->description) !!}
	  
	  </div>
	
{{$data}}
</div>

@endsection