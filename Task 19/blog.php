<?php
include 'dbconnection.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 10;

// Prepare the SQL statement and get records from our blog table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM blog ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records so we can display them in our template.
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include 'includes/header.php'; ?>

        <!-- Blog -->
        <div class="blog">
            <div class="container-fluid">
                <div class="row g-3">
                    <div class="col-lg-8">
                    <?php foreach ($blogs as $blog): ?>
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="#"><img src="<?=$blog['img']?>" alt=""></a>
                                <div class="post-categories">
                                    <li><a href="#"><?=$blog['category']?></a></li>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h3 class="blog-title"><a href="#"><?=$blog['title']?></a></h3>
                                <div class="blog-meta">
                                    <ul>
                                        <li>
                                            <div class="blog-date">
                                                <span class="bar-img"><img src="img/icons/date.png"> January 10, 2020 </span>                                                        
                                            </div>
                                        </li>
                                        <li>
                                            <div class="author">
                                                <span class="bar-img"><img src="img/icons/admin.png"> Admin </span>
                                            </div>
                                        </li> 
                                    </ul>
                                </div>
                                <div class="blog-desc">   
                                    <p>
                                    <?=$blog['content']?>
                                </div>
                                <div class="blog-button inner-blog">
                                    <a class="blog-btn" href="#">Continue Reading</a>
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