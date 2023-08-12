<?php
session_start();
if (!isset($_SESSION['admin_auth'])) {
    $_SESSION['signin_require'] = "<script>alert('Sam Web->Admin Order: Sign in require. No sign in no entry. :)');</script>";
    header('location:signin.php?signin-require');
}
require_once('database/dbCon.php');

$get_page = $_GET['page'];
if ($get_page == 0 || $get_page == 1) {
    $target = 0;
}else {
    $target = ($get_page * 10)-10;
}

$sel_blog = "SELECT * FROM site_blog WHERE post_status=0 ORDER BY blog_id DESC LIMIT $target,10";
$sel_blog_que = mysqli_query($db_con,$sel_blog);



include 'header.php'; 

?>
<title>Blog - Sam Web</title>
<?php include 'navbar.php'; ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                        <!-- let's begain -->
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        status:-<?php if (!empty($_SESSION['blog_st'])): ?>
                                                <?= $_SESSION['blog_st']; ?>
                                        <?php endif; unset($_SESSION['blog_st']); ?>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr style="color:#8b8d8f;">
                                                <th>Blog ID</th>
                                                <th>Blog Name</th>
                                                <th>Create-at</th>
                                                <th>Author</th>
                                                <th>Identity</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach ($sel_blog_que as $blog): ?>
                                            <tr>
                                                <td><?= $blog['blog_id']; ?></td>
                                                <td><a href="#"><strong><?= substr($blog['post_name'], 0,25); ?>... <a href="#"></a></strong></a></td>
                                                <td><span style="color:#808080;"><?= date('d-M-y',strtotime($blog['post_insert'])); ?></span></td>
                                                <td><span class="badge badge-warning"><?= ucfirst($blog['post_author']); ?></span></td>
                                                <td><?php if ($blog['post_identity']==1) { ?>
                                                        <span class="badge badge-success"><?php echo "Blog"; ?></span>
                                                    <?php }elseif ($blog['post_identity']==2) { ?>
                                                        <span class="badge badge-info"><?php echo "Travel"; ?></span>
                                                    <?php }else { ?>
                                                        <span class="badge badge-danger"><?php echo "Unknown"; ?></span>
                                                    <?php } ?></td>
                                                <td>
                                                    <a href="#"><i class="fa fa-edit"></i></a>
                                                    <a href="inc/blog.status.php?blog-id=<?= $blog['blog_id']; ?>&blog-category-name=<?= $blog['post_category_name']; ?>"><i class="fa fa-trash-alt" style="color:red;"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                        <?php
                                            $db_page = "SELECT * FROM site_blog WHERE post_status=0";
                                            $db_page_que = mysqli_query($db_con,$db_page);
                                            $db_page_num = mysqli_num_rows($db_page_que);
                                            $page = ceil($db_page_num / 10);

                                        ?>
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <li class="page-item <?= $get_page <= 1 ? 'disabled':' '; ?>">
                                                <a class="page-link" href="?page=<?php echo $get_page -1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                                </li>
                                                <?php for($s_page = 1 ; $s_page <= $page; $s_page ++): ?>
                                                <li class="page-item <?= $s_page == $get_page ?'active':' '; ?>"><a class="page-link" href="?page=<?php echo $s_page; ?>"><?php echo $s_page; ?></a></li>
                                                <?php endfor; ?>
                                                <li class="page-item <?= $get_page == $page ? 'disabled':' '; ?>">
                                                <a class="page-link" href="?page=<?= $get_page + 1; ?>">Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end content -->
                    </div>
                </main>






<?php include 'copy-right.php'; include 'footer.php'; ?>