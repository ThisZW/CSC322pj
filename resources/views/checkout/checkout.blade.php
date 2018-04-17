@include('layouts.header')

<div class="checkout-container main">
 
<div class="row">
  <div class="col-75">
    <div class="container">
      <form method="POST" action="{{ route('placeOrder')}}">
        @csrf
        @if (Auth::guest())
          @include('checkout.on-checkout-register')
          @endif
        <div class="row">
          <div class="col-md-12">
            <h3><b>Billing Address</b></h3>
            <div class="form-group row">
              <div class="col-md-6">
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="Cesar M De">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="TheCityClass@example.com">
            </div>
              <div class="col-md-6">
              <label for="address"><i class="fa fa-map-marker"></i> Address</label>
              <input type="text" id="address" name="address" placeholder="542 W. 15th Street">
              <label for="phone-number"><i class="fa fa-phone"></i> Phone number</label>
              <input type="text" id="phone-number" name="phone-number" placeholder="212-008-774">
            </div>
          </div>

            
          </div>
          
          <div class="col-md-12">
            <h3><strong>Order Summary</strong></h3>
          <p>
          </p>  
          <label for="payment_method"><i class="fa fa-credit-card"></i> Payment Method</label>
          <select>
          <option value="volvo">Visa Unaviable</option>
          <option value="saab">Master Card Unaviable</option>
          <option value="mercedes">Discover Unaviable</option>
          </select>
          <p>
          </p>

            <label for="cname">Promo Code</label>
            <input type="text" id="cname" name="cardname" placeholder="YAYROUGE">
            
            <h4><b>Order</b></h4>
            <h6>Merchandise Subtotal</h6>
            <h6>Shopping and Handling:&#160;<b>TBA</b></h6>
            <h6>Tax:&#160;<b>TBA</b></h6>
            <h5><b>Estimated Subtotal</b></h5>

          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value=" Checkout With Paypal" class = "btc">
        
      </form>
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






-------
Account:
	Customer page -> Infos....  Order history(rating ->product deliver store).
	Deiliver person page-> Info.... Delivery History(rating)...  Delivery queue...
Delivery:
	Grid map:  alg........ -> fjdsaklfjdlks;ajfkldsajflk;das//

Rating:

Cook/Superuser page-> .......


-->
@include('layouts.footer')
<pre>{{ print_r(session()->all())}}</pre>