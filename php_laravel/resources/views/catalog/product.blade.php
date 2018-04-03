 @include('layouts.header')
<div class="product-container main">
	<div class="product-image">

	<img src="{{asset('images/product-images/' . $data->image)}}" border ="10" style="border-style: inset" 
	   style = "border-color: coral" width="400" height="400" alt="Image of tea"
	title="picture of tea"/>

	</div>


	<div class="product-side">
	     <div class="product-name"> Original Bubble Tea</div>
	      <p class="price-label">${{ number_format($data->price_t1,2)}}</p>
		 <h6> Select a size</h6>
		    <div class="options">
		       <select id="size">
					<option value="$2.75">SMALL(12OZ)</option>
					<option value="$3.75">MEDIUM(16OZ)</option>
					<option value="$4.75">LARGE(20OZ)</option>
			   </select> 
			</div>
		<script language = "javascript">
		 function show(){
				var x = f.size;
				var y = "The price of this size is:" + x.value;
				var result = y.fontcolor("red");
				var price = result.fontsize(6);
				
				document.getElementById("product-price").innerHTML = price;}
	    </script>
			   <p>  </p>
		  <h6> Options: </h6>
		   <p> </p>
		    <select>
					<option value="cold">Cold</option>
					<option value="hot">Hot</option>
		   </select> 
	        <p> </p>
		  <h6> Select Quantity: </h6>
		  <p>  </p>
		 <form id="quantity">
                <input type="number" value="1"  name="quantity" min="1" max="100" step = "1" >
		   </form>
		   <p> </p>
		   
			<p><button class = "button">Add to Cart</button>
	  
	  
		  
	  
	  </div>	  
	  <div class="product-descriptions">
	  
	  <h2> Star Rating </h2>
	  <span class="fa fa-star checked"></span>
	  <span class="fa fa-star checked"></span>
	  <span class="fa fa-star checked"></span>
	  <span class="fa fa-star checked"></span>
	  <span class="fa fa-star checked"></span>
	  
	  {!! html_entity_decode($data->description) !!}
	  
	  </div>

</div>
</div>
@include('layouts.footer')