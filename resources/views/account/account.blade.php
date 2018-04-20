@extends('layouts.app')


@section('content')
	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12"><div class="card">
			<div class="card-header">
				My Account page
			</div> 
			
				<link rel="stylesheet" href="superstylesheet.css">
                <head>
                	<title>Bootstrap Website Example</title>
                	<meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <link rel="stylesheet" href="superstylesheet.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    <style>
                    .fakeimg {
                    	height: 200px;
                    	background: #aaa;
                    }
                    </style>
                </head>
                <hr class="hidden-sm hidden-md hidden-lg">

				<div class="card-body row">
					<div class="container">
						<div class="row">
							<div class="col-sm-4">
								<h2><strong>About Me</strong></h2>
								<h5>Photo of me:</h5>
								<div class="jumbotron text-center" style="margin-bottom:0">
                                    <p>fake image</p>
                                </div>



								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								
								

								
								<hr class="hidden-sm hidden-md hidden-lg">

								<h3><b>More Information<b></h3>
                                
                                <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#">Account</a></li>
                                <li><a href="#">Order</a></li>
                                <li><a href="#">Change Password</a></li>
                                </ul>
								
                                
                            </div>

                            <div class="col-sm-8">
                            	<h2><b>Personal Information</b></h2>

                            	    <label for="fname"><i class="fa fa-user"></i> Full Name</label><br>
                            	    <input type="text" id="fname" name="firstname" placeholder="Cesar M De"><br>
                            	    <label for="email"><i class="fa fa-envelope"></i> Email</label><br>
                                    <input type="text" id="email" name="email" placeholder="TheCityClass@example.com"><br>
                                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label><br>
                                    <input type="text" id="adr" name="address" placeholder="542 W. 15th Street"><br>
                                    <label for="city"><i class="fa fa-institution"></i> Phone number</label><br>
                                    <input type="text" id="city" name="city" placeholder="212-008-774"><br>

                            	    <label for="fname"><i class="fa fa-user"></i> Registeration Data</label><br>
                            	    <input type="text" id="fname" name="firstname" placeholder="You Cannot Change"><br>
                            	    <label for="email"><i class="fa fa-envelope"></i>Rating</label><br>
                                    <input type="text" id="email" name="email" placeholder="You Might Enter a Number between 1-5 "><br>
                                    <label for="adr"><i class="fa fa-address-card-o"></i> VIP</label><br>
                                    <input type="text" id="adr" name="address" placeholder="You Cannot Change"><br>
                                    <label for="city"><i class="fa fa-institution"></i>Role</label><br>
                                    <input type="text" id="city" name="city" placeholder="You Cannot Change"><br>
                                    &#160;&#160;&#160;
                                    &#160;&#160;&#160;<div class="row">
                                        &#160;&#160;&#160;<input type="submit" value="Save">
                                    &#160;&#160;&#160;</div>





                                
                            </div>
                        </div>
                    </div>
	            </div>
	        
       		</div>
        </div>
    </div>
</div>
@endsection

