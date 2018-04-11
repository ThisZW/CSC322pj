<!-- index.blade.php -->
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

 <div class="index-banner">
				
				<div>
					<a href="product.html">Pizza Delivery</a>
				</div>
			</div>
			<div class="body">
				<div>
					<div>
						<h1>NEW PRODUCT</h1>
						<h2>The Twist of Healthy Yogurt</h2>
						<p>This website template has been designed by freewebsitetemplates.com for you, for free. You can replace all this text with your own text.</p>
					</div>
					<img src="<?php echo e(asset("images/yogurt.jpg")); ?>" alt="">
				</div>
			</div>
			<div class="footer">
				<div>
					<ul>
						<li>
							<a href="product.html" class="product"></a>
							<h1>PRODUCTS</h1>
						</li>
						<li>
							<a href="about.html" class="about"></a>
							<h1>OUR STORY</h1>
						</li>
						<li>
							<a href="product.html" class="flavor"></a>
							<h1>FLAVORS</h1>
						</li>
						<li>
							<a href="contact.html" class="contact"></a>
							<h1>OUR LOCATION</h1>
						</li>
					</ul>
				</div>
			</div>

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>