 @include('layouts.header')
<div class="product-container main">

	<div class="breadcrumbs">This is the place for breadcrumbs!</div>

	<div class="product-image">
	<img src="{{asset('images/product-images/' . $data->image)}}" border ="10" style="border-style: inset" 
	   style = "border-color: coral" width="400" height="400" alt="Image of tea"
	title="picture of tea"/>

	</div>

	@php
	$price_for_user = $data->price_t1; //This will be the price based on customer login
	@endphp

	<div class="product-side">
	     <div class="product-name"> {{$data->name}}</div>
	      <p class="price-label">$<span class="price-field">{{ number_format($price_for_user,2)}}</span></p>

	     <!--For size Options-->
		 <h6> Select a Size</h6>
		    <div class="options">
		       <select id="size">
		       		@foreach($data->productOptions as $o)
		       			@if ($o->option_type == 'size')
		       				<option value="{{$o->add_on_price,2}}">{{$o->option_name}}</option>
		       				@endif
					@endforeach
			   </select> 
			</div>


		<script language = "javascript">
		var currentPrice = $(".price-field").text();
		var addSizePrice = 0;
		var addOptionPrice = 0;
		 $(document).ready(function(){
		    $("#size").change(function(){
		        addSizePrice = $(this).val();
		        $(".price-field").text( parseFloat(currentPrice) + parseFloat(addSizePrice) + parseFloat(addOptionPrice));
		    });
		    $("#option").change(function(){
		        addOptionPrice = $(this).val();
		        $(".price-field").text( parseFloat(currentPrice) + parseFloat(addSizePrice) + parseFloat(addOptionPrice));
		    });
		});
	    </script>
	    <p></p>

	    <!-- for general options -->
		  <h6> Select a Option: </h6>
		  <div class="options">
		    <select id="option">
		       		@foreach($data->productOptions as $o)
		       			@if ($o->option_type == 'option')
		       				<option value="{{$o->add_on_price,2}}">{{$o->option_name}}</option>
		       				@endif
					@endforeach
		   </select>
		</div>
	        <p> </p>


		  <h6> Select Quantity: </h6>
		  <p>  </p>
		 <form action="{{ url('/cart')}}" method="POST" >

                <input type="number" value="1"  name="quantity" min="1" max="100" step="1" >
                <input type="hidden" name="id" value="{{ $data->id }}">
                <input type="hidden" name="name" value="{{ $data->name }}">
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
	

</div>

@include('layouts.footer')

{{$data}}