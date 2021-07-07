<?php
include 'dbconnection.php';

$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10;

$stmt = $pdo->prepare('SELECT * FROM blog ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$cmd = $pdo->prepare('SELECT * FROM comment ORDER BY id LIMIT :current_page, :record_per_page');
$cmd->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$cmd->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$cmd->execute();

$comments = $cmd->fetchAll(PDO::FETCH_ASSOC);

function addComment($id, $blog_id){
    if (!empty($_POST)) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $message = isset($_POST['message']) ? $_POST['message'] : '';

        $postcomment = $pdo->prepare('INSERT INTO blog VALUES (?, ?, ?, ?, ?)');
        $postcomment->execute([$id, $blog_id, $name, $email, $message]);
    }
}

?>

<?php include 'includes/header.php'; ?>

        <!-- Blog -->
        <div class="blog">
            <div class="container-fluid">
                <div class="row g-3">
                    <div class="col-lg-8">
                        <?php foreach ($blogs as $blog): ?>
                            <div class="blog-item">
                            <h3 class="blog-title"><a href="#"><?=$blog['title']?></a></h3>
                                <div class="blog-img">
                                <a href="#"><img src="<?=$blog['img']?>" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul class="btm-cate">
                                            <li>
                                                <div class="blog-date">
                                                    <i class="fa fa-calendar-check-o"></i> January 10, 2020                                                        
                                                </div>
                                            </li>
                                            <li>
                                                <div class="author">
                                                    <i class="fa fa-user-o"></i> Admin  
                                                </div>
                                            </li> 
                                        </ul>
                                    </div>
                                    <div class="blog-desc">   
                                    <?=$blog['content']?>
                                    </div>
                                    <h3 class="comment-title">Comments on “<?=$blog['title']?>”</h3>
                                        <div class="blog-comment">
                                            <?php foreach ($comments as $comment):?>
                                            <?php  if($blog['id'] == $comment['blog_id']) {?>
                                            <div class="comment-body">
                                                <div class="comment-logo">
                                                    <img src="img/blog/comment.png" alt="">
                                                </div>
                                                <div class="comment-meta">
                                                    <span><a href="#"><?=$comment['name']?></a></span>
                                                    <a href="#">December 3, 2020 at 8:30 am</a>
                                                    <p>
                                                    <?=$comment['message']?>
                                                   </p>
                                                    <div class="btn-part">
                                                        <a class="readon reply" href="#">Reply</a> 
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }; ?>
                                            <?php endforeach;?>
                                            <h3 class="comment-title">Leave a Reply</h3>
                                            <p>Your email address will not be published. Required fields are marked *</p>
                                            <div class="comment-note">
                                                <div id="form-messages"></div>
                                                <form id="contact-form" method="post" onsubmit="addComment($comment['id'],$comment['blog_id'])">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input class="from-control" type="text" id="name" name="name" placeholder="Name*" required="">
                                                            </div> 
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <input class="from-control" type="text" id="email" name="email" placeholder="E-Mail*" required="">
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <textarea class="from-control" id="message" name="message" placeholder="Your message Here" required=""></textarea>
                                                            </div>
                                                        </div>
                                                        <input type="submit" value="Post Comment">
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                </div>       
                            </div>     
                        <?php endforeach; ?>
                    </div>

                    <div class="col-lg-4">
                        <div class="widget-area">
                            <div class="search-widget">
                                <div class="search-wrap">
                                    <input type="search" placeholder="Searching..." name="s" class="search-input" value="">
                                    <button type="submit" class="button-search"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="recent-posts">
                                <div class="widget-title">
                                    <h3 class="title">Latest Posts</h3>
                                </div>
                                <div class="recent-post-widget">
                                    <div class="post-img">
                                        <a href="blog-details.php"><img src="img/blog/1.jpg" alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="blog-details.php">Pen Source Job Report Show More Openings Fewer </a>
                                        <span class="date">
                                            <i class="fa fa-calendar"></i>
                                            January 21, 2020
                                        </span>
                                    </div>
                                </div>
                                <div class="recent-post-widget">
                                    <div class="post-img">
                                        <a href="blog-details.php"><img src="img/blog/2.jpg" alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="blog-details.php">Tech Products That Makes Its Easier to Stay at Home</a>
                                        <span class="date">
                                            <i class="fa fa-calendar"></i>
                                            January 21, 2020
                                        </span>
                                    </div>
                                </div>
                                <div class="recent-post-widget">
                                    <div class="post-img">
                                        <a href="blog-details.php"><img src="img/blog/3.jpg" alt=""></a>
                                    </div>
                                    <div class="post-desc">
                                        <a href="blog-details.php">Necessity May Give Us Your Best Virtual Court System </a>
                                        <span class="date">
                                            <i class="fa fa-calendar"></i>
                                            January 21, 2020
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="categories">
                                <div class="widget-title">
                                    <h3 class="title">Categories</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Application Testing</a></li>
                                    <li><a href="#">Artifical Intelligence</a></li>
                                    <li><a href="#">Digital Technology</a></li>
                                    <li><a href="#">IT Services</a></li>
                                    <li><a href="software-development.html">Software Development</a></li>
                                    <li><a href="web-development.html">Web Development</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'includes/footer.php'; ?>