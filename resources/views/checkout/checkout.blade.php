@include('layouts.header')

<div class="checkout-container main">
 
<div class="row">
  <div class="col-75">
    <div class="container">
      @if (session()->has('cart'))
      <form method="POST" action="{{ route('placeOrder')}}">
        @csrf
        {{$register = 0}}
        @if (Auth::guest())
          @include('checkout.on-checkout-register')
          {{$register = 1}}
          @endif
        <div class="row">
          <div class="col-md-12">
            <h3><b>Billing Information</b></h3>
            <div class="form-group row">
              <div class="col-md-6">
              <label for="name"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="name" name="name" placeholder="Cesar M De">
            </div>
              <div class="col-md-6">
              <label for="phone-number"><i class="fa fa-phone"></i> Phone number</label>
              <input type="text" id="phone_number" name="phone_number" placeholder="212-008-774">
            </div>
          </div>

            
          </div>
          
          <div class="col-md-12">
            <h3><strong>Payments</strong></h3>
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

            <!-- <label for="cname">Promo Code</label>
            <input type="text" id="cname" name="cardname" placeholder="YAYROUGE"> -->
            <br><br>
            <h4><b>Order</b></h4>
            <h6>Merchandise Subtotal</h6>
            <h6>Shopping and Handling:&#160;<b>TBA</b></h6>
            <h6>Tax:&#160;<b>TBA</b></h6>
            <h6>Shopping and Handling&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<b>TBA</b></h6>
            <h6>Tax&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<b>TBA</b></h6>
            <h5><b>Estimated Subtotal</b></h5>

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
@include('layouts.footer')
<pre>{{ print_r(session()->all())}}</pre>