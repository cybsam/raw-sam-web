<?php
include 'head.php';

global $get_page;
if (isset($_GET['page'])) {
	$get_page = $_GET['page'];
}
if ($get_page == "" || $get_page == 1) {
	$terget = 0;
}else {
	$terget = ($get_page * 10) - 10;
}


?>
<title>Andrea - Free Bootstrap 4 Template by Colorlib</title>
</head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php include 'nav.php'; ?>
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">
							<?php
								$blog_post = "SELECT * FROM site_blog WHERE post_status=0 ORDER BY blog_id DESC LIMIT $terget,10";
								$blog_post_que = mysqli_query($db_con,$blog_post);
							?>
							<?php foreach($blog_post_que as $blog): ?>
							<?php $l_link = md5("lol"); ?>
			    			<div class="col-md-12">
									<div class="blog-entry ftco-animate d-md-flex">
										<a href="single.php?post=<?= $blog['blog_id']; ?>&l=<?= $l_link; ?>&blog-category-name=<?= $blog['post_category_name']; ?>&blog-auth=<?= $blog['post_author']; ?>&l=<?= $l_link; ?>" class="img img-2" style="background-image: url(images/blog/<?= $blog['post_picture']; ?>);"></a>
										<div class="text text-2 pl-md-4">
				              				<h3 class="mb-2"><a href="single.php?post=<?= $blog['blog_id']; ?>&l=<?= $l_link; ?>&blog-category-name=<?= $blog['post_category_name']; ?>&blog-auth=<?= $blog['post_author']; ?>&l=<?= $l_link; ?>"><?= $blog['post_name']; ?></a></h3>
				              					<div class="meta-wrap">
													<p class="meta">
														<?php
															$show_date = date('M d, Y ',strtotime($blog['post_insert']));
														?>
				              							<span><i class="icon-calendar mr-2"></i><?= $show_date; ?></span>
				              								<span><a href="?category"><i class="icon-folder-o mr-2"></i><?= $blog['post_category_name']; ?></a></span>
				              								<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
				              						</p>
			              						</div>
				              				<p class="mb-4"><?= $blog['post_short_text']; ?>.</p>
				              				<p><a href="single.php?post=<?= $blog['blog_id']; ?>&l=<?= $l_link; ?>&blog-category-name=<?= $blog['post_category_name']; ?>&blog-auth=<?= $blog['post_author']; ?>&l=<?= $l_link; ?>" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
								<?php
									$pagg_db = "SELECT * FROM site_blog WHERE post_status=0";
									$pagg_db_que = mysqli_query($db_con,$pagg_db);
									$pagg_db_row = mysqli_num_rows($pagg_db_que);
									
									$page = ceil($pagg_db_row / 10);
									
								?>
			    		<div class="row">
			          <div class="col">
			            <div class="block-27">
			              <ul>
			                
							<?php for ($s_page=1; $s_page <= $page ; $s_page++): ?>
			                <li class="<?= $get_page == $s_page ? 'active':' '; ?>"><a href="?page=<?= $s_page; ?>"><span><?php echo $s_page; ?></a></span></li>
			                <?php endfor; ?>
			                
			              </ul>
			            </div>
			          </div>
			        </div>
			    	</div>
	    			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              <form action="#" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Categories</h3>
	              <ul class="categories">
					  <?php
						$sel_cate = "SELECT * FROM site_category WHERE cate_status=0";
						$sel_cate_que = mysqli_query($db_con,$sel_cate);

					  ?>
					  <?php foreach($sel_cate_que as $category): ?>
	                <li><a href="#"><?= $category['category_name']; ?> <span>(6)</span></a></li>
					  <?php endforeach; ?>
	              </ul>
	            </div>

	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Popular Articles</h3>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
	                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
	                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
	                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	            </div>

	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Tag Cloud</h3>
	              <ul class="tagcloud">
	                <a href="#" class="tag-cloud-link">animals</a>
	                <a href="#" class="tag-cloud-link">human</a>
	                <a href="#" class="tag-cloud-link">people</a>
	                <a href="#" class="tag-cloud-link">cat</a>
	                <a href="#" class="tag-cloud-link">dog</a>
	                <a href="#" class="tag-cloud-link">nature</a>
	                <a href="#" class="tag-cloud-link">leaves</a>
	                <a href="#" class="tag-cloud-link">food</a>
	              </ul>
	            </div>

							<div class="sidebar-box subs-wrap img py-4" style="background-image: url(images/bg_1.jpg);">
								<div class="overlay"></div>
								<h3 class="mb-4 sidebar-heading">Newsletter</h3>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
	              <form action="#" class="subscribe-form">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Email Address">
	                  <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
	                </div>
	              </form>
	            </div>

	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Archives</h3>
	              <ul class="categories">
	              	<li><a href="#">Decob14 2018 <span>(10)</span></a></li>
	                <li><a href="#">September 2018 <span>(6)</span></a></li>
	                <li><a href="#">August 2018 <span>(8)</span></a></li>
	                <li><a href="#">July 2018 <span>(2)</span></a></li>
	                <li><a href="#">June 2018 <span>(7)</span></a></li>
	                <li><a href="#">May 2018 <span>(5)</span></a></li>
	              </ul>
	            </div>


	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Paragraph</h3>
	              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
	            </div>
	          </div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<?php include 'footer.php'; ?>