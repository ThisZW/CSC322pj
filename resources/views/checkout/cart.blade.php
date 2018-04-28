 @include('layouts.header')
<div class="shopping-cart">
   <div class="cart">
    <h1>Shopping Cart </h1>	
    <table class="cart-main-table" align="center" width="700">
	   <thead>
	      <tr class="first last">
		       <th></th>
			   <th></th>
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
				       <div class = "price-item" align="center">$5.75</div>
				   </span>
				</td>
				<td>
				   <div class="qty-holder" align="center">
                   <input type="number" name="name" value="1">
					</div>
				</td>
				<td>
				   <div class="total-price" align="center">$5.75</div>
				</td>
			 </tr>
		</tbody>
		
		<tfoot>
		     <tr class = "first last">
			   <td class = "a-right last" colspan="50">
			    <button class = "button continue">Continue Shopping</button>
				<button class = "button clear" style="float: right;">Clear Cart</button>
				<button class = "button update" style="float: right;">Update Cart</button>
			   </td>
			 </tr>
		</tfoot>
	
	
	</table>
	</div>
	<div class="summary">
	     <h2>Summary</h2>
		 <div>
		   <table class="summary-table" style="text-align: left;" >
		       <colgroup>
			       <col />
				   <col width = "1" />
			   </colgroup>
			   
			   <tfoot>
			       <tr>
				      <td style="text-align: left; padding: 10px 14px;">Ground_Total_Excl.Tax</td>
					  <td class="a-right">
					     <strong> <span class = "price" style="padding: 10px 50px">$5.75</span></strong>
					  </td>
					 <tr>
					  <td style="text-align: left; padding: 10px 14px;">
					     Final Price 
					  </td>
					  <td style="text-align: center;"">
					     <strong> <span class = "price" style="padding: 10px 50px">$5.75</span></strong>
					  </td>
					 <tr>
				   </tr>
			   </tfoot>
			   
			   <tbody>
			   <tr>
			         <td style="text-align: left; padding: 10px 14px;">Subtotal</td>
					 <td>
					    <strong> <span class = "price" style="padding: 10px 30px">$5.75</span></strong>
					  </td>
			   </tr>
			   </tbody>
		   </table>
		   <ul class = "Check out">
		   	<p></p>
		         <button class = "button checkout">Process to Check Out >></button>
		   </ul>
		 </div>
	</div>
</div>


@include('layouts.footer')



<pre>{{ print_r(session()->all())}}

</pre>