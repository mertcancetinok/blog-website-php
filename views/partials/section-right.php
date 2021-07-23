<?php
require_once ROOT . '../../database.php';
require_once ROOT . '../../functions.php';
//GET TOP 3 POPULAR BLOG
$statement = $pdo->prepare("SELECT * FROM blog ORDER BY ViewCount DESC LIMIT 3");
$statement->execute();
$blogs = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="/assets/upload/banner_07.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end widget -->



        <div class="widget">
            <h2 class="widget-title">Popular Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">

                    <?php foreach ($blogs as $i => $blog) : ?>
                        <a href="/detail.php?id=<?php echo $blog['BlogId']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="/assets/upload/tech_blog_08.jpg" alt="" class="img-fluid float-left">
                                <h5 class="mb-1"><?php echo $blog['BlogTitle']; ?></h5>
                                <small><?php echo time_elapsed_string($blog["BlogCreatedTime"]); ?></small>
                            </div>
                        </a>
                    <?php endforeach; ?>

                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->



        <div class="widget">
            <h2 class="widget-title">Follow Us</h2>

            <div class="row text-center">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button facebook-button">
                        <i class="fa fa-facebook"></i>
                        
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button twitter-button">
                        <i class="fa fa-twitter"></i>
                        
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button google-button">
                        <i class="fa fa-google-plus"></i>
                        
                    </a>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <a href="#" class="social-button youtube-button">
                        <i class="fa fa-youtube"></i>
                        
                    </a>
                </div>
            </div>
        </div><!-- end widget -->

        <div class="widget">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="/assets/upload/banner_03.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end widget -->
    </div><!-- end sidebar -->
</div><!-- end col -->
</div><!-- end row -->
</div><!-- end container -->
</section>