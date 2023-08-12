<?php include 'head.php'; ?>
<title>Blog - <?= $info['site_title']; ?></title>
  </head>
  <body>
	<?php
		global $get_page;
		if (isset($_GET['page'])) {
			$get_page = $_GET['page'];
		}
		
		if ($get_page == "" || $get_page == 1) {
			$target = 0;
		}else {
			$target = ($get_page * 10) - 10;
		}
		$db_blog = "SELECT * FROM site_blog WHERE post_identity=1 ORDER BY blog_id DESC LIMIT $target,10";
		$db_blog_q = mysqli_query($db_con,$db_blog);
	?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php include 'nav.php'; ?>
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 px-md-5 py-5">
	    				<div class="row pt-md-4">
						
						<?php foreach($db_blog_q as $blog): ?>
						<div class="col-md-12">
		    					<div class="blog-entry-2 ftco-animate">
	    							<a href="" class="img" style="background-image: url(images/blog/<?= $blog['post_picture']; ?>);"></a>
	    							<div class="text pt-4">
				              <h3 class="mb-4"><a href="#"><?= $blog['post_name']; ?></a></h3>
				              <p class="mb-4"><?= $blog['post_short_text']; ?>.</p>
				              <div class="author mb-4 d-flex align-items-center">
									  <?php
										 $usr = $blog['post_author_id'];
										 $db_usr = "SELECT * FROM users_admin WHERE admin_id='$usr'";
										 $db_usr_que = mysqli_query($db_con,$db_usr);
										 $dbusr_ass = mysqli_fetch_assoc($db_usr_que);
									  ?>
				            		<a href="#" class="img" style="background-image: url(administrator/uploads/admin-users/<?= $dbusr_ass['user_picture']; ?>);"></a>
				            		<div class="ml-3 info">
				            			<span>Written by</span>
				            			<h3><a href="#"><?= ucfirst($blog['post_author']); ?></a>, <span><?= date('M d, Y',strtotime($blog['post_last_update'])); ?></span></h3>
				            		</div>
				            	</div>
				              <div class="meta-wrap d-md-flex align-items-center">
				              	<div class="half order-md-last text-md-right">
					              	<p class="meta">
					              		<span><i class="icon-heart"></i>3</span>
					              		<span><i class="icon-eye"></i>100</span>
					              		<span><i class="icon-comment"></i>5</span>
					              	</p>
				              	</div>
				              	<div class="half">
					              	<p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Continue Reading</a></p>
				              	</div>
				              </div>
				            </div>
			    		</div>
	    					</div>
							<?php endforeach; ?>
			    		</div><!-- END-->
						<!--  -->
			    		<div class="row">
			          <div class="col">
			            <div class="block-27">
			              <ul>
							  <?php 
								 $pag_db = "SELECT * FROM site_blog WHERE post_identity=1";
								 $pag_db_que = mysqli_query($db_con,$pag_db);
								 $all_page = mysqli_num_rows($pag_db_que);
								 $page = ceil($all_page / 10); 
							  ?>
			                <?php for ($s_page=1; $s_page <= $page; $s_page++): ?>
			                <li class="<?= $get_page == $s_page ? 'active':' '?>"><a href="?page=<?= $s_page; ?>"><span><?= $s_page; ?></span></a></li>
							<?php endfor; ?>
			                
			              </ul>
			            </div>
			          </div>
			        </div>
			    	</div>
	    			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              <?php include 'ser-form.php'; ?>
	            </div>
	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Categories</h3>
	              <ul class="categories">
				  
					  <?php foreach($category_query as $category): ?>
					  <?php
					  	$cate_id = $category['cate_id'];
						$con_cate = "SELECT COUNT(*) AS count_cate FROM site_blog WHERE post_category_id='$cate_id'";
						$con_cate_que = mysqli_query($db_con,$con_cate);
						$con_cate_assoc = mysqli_fetch_assoc($con_cate_que);
						?>
	                <li><a href="#"><i class="icon-folder-o mr-2"></i><?= $category['category_name']; ?> <span>(<?= $con_cate_assoc['count_cate']; ?>)</span></a></li>
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
	              	<li><a href="#">December 2018 <span>(10)</span></a></li>
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