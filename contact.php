<?php 
session_start();

include 'head.php'; ?>
<title>Contac - Sam Web</title>
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php include 'nav.php'; ?>
		<div id="colorlib-main">
			<section class="ftco-section contact-section px-md-4">
	      <div class="container">
	        <div class="row d-flex mb-5 contact-info">
	          <div class="col-md-12 mb-4">
	            <h2 class="h3">Contact Information</h2>
	          </div>
	          <div class="w-100"></div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
		          </div>
	          </div>
	          <div class="col-lg-6 col-xl-3 d-flex mb-4">
	          	<div class="info bg-light p-4">
		            <p><span>Website</span> <a href="#">yoursite.com</a></p>
		          </div>
	          </div>
	        </div>
			<section id="contact">
				<div class="row block-9">
				<div class="col-lg-6 d-flex">
				<?php if (!empty($_SESSION['ins_com'])): ?>
				<span><?= $_SESSION['ins_com']; ?></span>
				<?php endif; unset($_SESSION['ins_com']); ?>
					<form action="contac.php" class="bg-light p-5 contact-form" method="post">
					<div class="form-group">
						<input type="text" name="your_name" class="form-control" placeholder="Your Name">
						<?php if(!empty($_SESSION['nem_err'])): ?>
						<span style="color:red;"><?php echo $_SESSION['nem_err']; ?></span>
						<?php endif; unset($_SESSION['nem_err']); ?>
					</div>
					<div class="form-group">
						<input type="text" name="your_email" class="form-control" placeholder="Your Email">
						<?php if(!empty($_SESSION['eml_err'])): ?>
						<span style="color:red;"><?php echo $_SESSION['eml_err']; ?></span>
						<?php endif; unset($_SESSION['eml_err']);?>
					</div>
					<div class="form-group">
						<input type="text" name="your_subject" class="form-control" placeholder="Subject">
						<?php if(!empty($_SESSION['sub_err'])): ?>
						<span style="color:red;"><?php echo $_SESSION['sub_err']; ?></span>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<textarea name="" id="" name="your_message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
						<?php if(!empty($_SESSION['msg_err'])): ?>
						<span style="color:red;"><?php echo $_SESSION['msg_err']; ?></span>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<button type="submit" name="submit" value="submit" class="btn btn-primary py-3 px-5">Send Message</button>
					</div>
					</form>
				
				</div>

				<div class="col-lg-6 d-flex">
					<div id="map" class="bg-light"></div>
				</div>
				</div>
			</section>
	      </div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<?php include 'footer.php'; ?>