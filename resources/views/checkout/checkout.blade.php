@include('layouts.header')

<!-- <div class="checkout-container main">
fjdksaljfdkl;sajfkdsaljfal;
</div>  -->
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">

        <div class="row">
          <div class="col-50">
            <h3><b>Billing Address</b></h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> Phone number</label>
            <input type="text" id="city" name="city" placeholder="212-008-774">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3><strong>Order Summary</strong></h3>
            
          <select>
          <option value="volvo">Visa Unaviable</option>
          <option value="saab">Master Card Unaviable</option>
          <option value="mercedes">Discover Unaviable</option>
          </select>

            <label for="cname">Promo Code</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            
            <h4><b>Order</b></h4>
            <h6>Merchandise Subtotal</h6>
            <h6>Shopping and Handling      TBA</h6>
            <h6>Tax       TBA</h6>
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
