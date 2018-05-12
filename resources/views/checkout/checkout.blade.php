@extends('layouts.layout')

@section('header-extra')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

@endsection

@section('content')
<div class="checkout-container main">
 
<div class="row">
  <div class="col-75">
    <div class="container">
      @if (session()->has('cart'))
      <form method="POST" action="{{ route('placeOrder')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <h3><b>Billing Information</b></h3>
            <div class="form-group row">
              <div class="col-md-6">
              <label for="name"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="name" name="name" value="{{$data['name']}}" readonly="readonly">
            </div>
              <div class="col-md-6">
              <label for="phone-number"><i class="fa fa-phone"></i> Phone number</label>
              <input type="text" id="phone_number" name="phone_number" value="212-008-774">
            </div>
          </div>
          @if (Auth::guest())
          <div class="row">
            <div class="col-md-6">
              <label for="file"><i class="fa fa-file"></i>Self Identification Proofs.</label>
              <input type="file" id="verification" name="verification" required="required">
            </div>
          </div>
          <br>
          @endif
            
          </div>
          
          <div class="col-md-4">
            <h3><strong>Payments</strong></h3>
          <p>
          </p>  
          <label for="payment_method"><i class="fa fa-credit-card"></i> Payment Method</label>
          <select>
          <option value="volvo">paypal</option>
          </select>
          </div>

          <div class="col-md-8">
            <h3><strong>Coupon</strong></h3>
          <p>
          </p>  
          <label for="coupon"><i class="fa fa-bill"></i>Coupon code</label>
          <div class="row">
           <div class="col-md-8">
            <input type="text" id="coupon" name="coupon" placeholder="Enter your coupon code if you have it">
           </div>
           <div class="col-md-4">
             <button type="button" class="btn btn-md" id="enter-coupon">Enter</button>
             <p></p>
           </div>
           <script>
             $(document).ready(function() {
              $('#enter-coupon').click(function(){
                var obj = $(this);
                $.ajax({
                  type: "POST",
                  url: '/checkout/ajaxcoupon',
                  data: { 
                          _token: "{{ csrf_token() }}"},
                  success: function(data) {
                      console.log(data.data);
                      $(this).next().text(data.data);
                      $('#enter-coupon').attr("disabled","disabled");
                      $('#subtotal-value').text( (parseFloat($('#subtotal-value').text()) * 0.9).toFixed(2));
                      $('#text-percent').text('(10% percent off)');
                  }
                });
              });
             });
           </script>
         </div>
          </div>

          <div class="col-md-12">
            <!-- <label for="cname">Promo Code</label>
            <input type="text" id="cname" name="cardname" placeholder="YAYROUGE"> -->
            <br><br>
            <h4><b>Order</b></h4>
            <h5 ><b>Estimated Subtotal</b>: <h5 id="subtotal-value">{{$data['subtotal']}}</h5></h5><h5 id="text-percent"></h5>

          </div>

        </div>
        <label>
         <!--  <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing -->
        </label>
        <input type="submit" value=" Checkout With Paypal" class = "btc">
        
      </form>
      @else
      {{"Your shopping cart is empty!"}}
      @endif
    </div>
  </div>

</div>
</div> 
<!--
Delivery Information
______
Name
Phone Number
Address
Payment Method(dropdown -> Paypal, Visa, MasterCard)

Subtotal
(Place Order)




Account:
	Customer page -> Infos....  Order history(rating ->product deliver store).
	Deiliver person page-> Info.... Delivery History(rating)...  Delivery queue...
Delivery:
	Grid map:  alg........ -> fjdsaklfjdlks;ajfkldsajflk;das//

Rating:

Cook/Superuser page-> .......


-->
@endsection