 @include('layouts.header')
 <style>
   thead {color: black;}
   table, th, td {border: 2px solid black;}
   table {width: 600px;}
   .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    } 
	
 </style>
<div class="shopping-cart">
   <div class="cart">
    <h1>Shopping Cart </h1>
	
	<table>
	   <thead>
	      <tr class="first last">
		       <th rowspan = "1"></th>
			   <th rowspan = "1"></th>
		       <th>Proudct Name</th>
               <th>Unit Price</th>
               <th>Qty</th>
	           <th>Subtotal</th>
		   </tr>
		</thead>
		
		
		<tbody>
		        <td>
				    <button class = "center">Remove</button>
				</td>
				<td class ="prouct-image-td">
				   <a title = "Green Milk Tea" class = "center">
				   <img src="image/bubbletea2.jpg" border ="10" style="border-style: inset" 
	                    style = "border-color: coral" width="80" height="100" alt="Image of tea"
	                    title="picture of tea" class = "center"/>
				</td>
				<td>
				<p>Green Milk Tea</p>
				<p>Bubble</p>
				</td>
				<td>
				   <span class = "cart-price">
				       <span class = "price">$5.75</span>
				   </span>
				</td>
				<td>
				   <div class = "qty-holder">
				   <button class="plus-btn" type="button" name="button">
                   </button>
                   <input type="text" name="name" value="1">
                   <button class="minus-btn" type="button" name="button">
				   </button>
					</div>
				</td>
				<td>
				   <div class="total-price">$5.75</div>
				</td>
			 </tr>
		</tbody> co   
		
		<tfoot>
		     <tr class = "first last">
			   <td class = "a-right last" colspan="50">
			    <button class = "Continue Shopping">Continue Shopping</button>
				<button class = "Clear cart">Clear Cart</button>
				<button class = "Update Cart">Update Cart</button>
			   </td>
			 </tr>
		</tfoot>
	
	
	</table>
	</div>
	<div class="summary">
	     <h2>Summary</h2>
		 <div>
		   <table class="summary-table">
		       <colgroup>
			       <col />
				   <col width = "1" />
			   </colgroup>
			   
			   <tfoot>
			       <tr>
				      <td class="a-right" colspan="1">
					     <strong> Ground Total Excl. Tax </strong>
					  </td>
					  <td class="a-right">
					     <strong> <span class = "price">$5.75</span></strong>
					  </td>
					 <tr>
					  <td class="a-right" colspan="1">
					     <strong> Final Price </strong>
					  </td>
					  <td class="a-right">
					     <strong> <span class = "price">$5.75</span></strong>
					  </td>
					 <tr>
				   </tr>
			   </tfoot>
			   
			   <tbody>
			   <tr>
			         <td class="a-right" colspan="1">Subtotal</td>
					 <td class="a-right">
					     <span class = "price">$5.75</span>
					  </td>
			   </tr>
			   </tbody>
		   </table>
		   <ul class = "Check out">
		         <button class = "Checkout">Process to CheckOut</button>
		   </ul>
		 </div>
	</div>
</div>


@include('layouts.footer')



<pre>{{ print_r(session()->all())}}

</pre>