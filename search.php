<?php
include 'head.php';

if (isset($_POST['search'])) {
    $keyWord = $_POST['search'];

    if (!empty($keyWord)) {
        $con_sear = "SELECT * FROM site_blog WHERE post_name LIKE '%$keyWord%' OR post_keyword LIKE '%$keyWord%'";
        $con_search = mysqli_query($db_con,$con_sear);
        
    }else {
        $err = 'oops, fild blank...';
    }

}


?>
<title>Single - <?= $info['site_title']; ?></title>
</head>
  <body>
<?php

?>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php include 'nav.php'; ?>
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">
							<div class="col-md-12">
                                <div class="col-md-12">
                                    <form action="search?" method="post">
                                        <div class="form-group">
                                            <label style="font-weight:700;background-color:yellow;">Your keyword: </label>
                                            
                                            <input type="text" name="search" placeholder="" value="<?= $keyWord; ?>" readonly class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for=""><span style="color:red;font-weight:900;">Do you change it?</span> <span style="color:green;">Enter your new keyword.</span></label>
                                            <input type="text" class="form-control" name="search" placeholder="Your new keyword.">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-info py-2 px-5">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <?php if (!empty($keyWord)) { ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <!-- <th>S.N</th> -->
                                            <th>Name</th>
                                            <th>Identity</th>
                                        </tr>
                                        <?php foreach($con_search as $result): ?>
                                            <?php $nem='SAM'; $l_link = md5($nem); ?>
                                        <tr>
                                            <td><a href="single?token=<?= $l_link; ?>&post=<?= $result['blog_id']; ?>&l=<?= $l_link; ?>&blog-category-name=<?= $result['post_category_name']; ?>&blog-auth=<?= $result['post_author']; ?>&l=<?= $l_link; ?>"><?= $result['post_name']; ?></a></td>
                                            <td><a href="#"><?php if ($result['post_identity']==1) {
                                                echo "Blog";
                                            }elseif ($result['post_identity']==2) {
                                                echo "Article";
                                            }else {
                                                echo "Unknown contact.";
                                            } ?></a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                        <?php }else {
                                            echo "<script>alert('fild blank...')</script>";
                                        } ?>
                                </div>
                            </div>
						</div>				
					</div>
			    		
			          
			        
	    		<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
	            <div class="sidebar-box pt-md-4">
	              
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
	                <li><a href="#"><i class="icon-folder-o mr-2"></i> <?= $category['category_name']; ?> <span>(<?= $con_cate_assoc['count_cate']; ?>)</span></a></li>
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