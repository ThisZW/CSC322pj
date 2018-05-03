 @extends('layouts.layout')

 @section('front-content')
<div class="shopping-cart">
   <div class="cart">
    <h1>Shopping Cart </h1>	
    <table class="cart-main-table" align="center" width="700">
	   <thead>
	      <tr class="first last">			   <th></th>
		       <th>Proudct Name</th>
               <th>Unit Price</th>
               <th>Qty</th>
	           <th>Subtotal</th>
		   </tr>
		</thead>
		
		
		<tbody>
			
				@foreach(session()->get('cart') as $p)
				<tr>
			        <td>
					    <button class = "center">Remove</button>
					</td>
					<td>
					<p>{{$p['name']}}</p>
					<p>{{$p['option_string']}}</p>
					</td>
					<td>
					   <span class = "cart-price">
					       <div class = "price-item" align="center">${{$p['price']}}</div>
					   </span>
					</td>
					<td>
					   <div class="qty-holder" align="center">
	                   <input type="number" name="name" value="{{$p['quantity']}}">
						</div>
					</td>
					<td>
					   <div class="total-price" align="center">${{$p['price'] * $p['quantity']}}</div>
					</td>
					 </tr>
				@endforeach
			
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
					     <strong> <span class = "price" style="padding: 10px 50px">${{session()->get('subtotal')}}</span></strong>
					  </td>
					 <tr>
					  <td style="text-align: left; padding: 10px 14px;">
					     Final Price 
					  </td>
					  <td style="text-align: center;"">
					     <strong> <span class = "price" style="padding: 10px 50px">${{session()->get('subtotal')}}</span></strong>
					  </td>
					 <tr>
				   </tr>
			   </tfoot>
			   
			   <tbody>
			   <tr>
			         <td style="text-align: left; padding: 10px 14px;">Subtotal</td>
					 <td>
					    <strong> <span class = "price" style="padding: 10px 30px">${{session()->get('subtotal')}}</span></strong>
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

<pre>{{ print_r(session()->all())}}

</pre>
@endsection
