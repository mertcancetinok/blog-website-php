<?php
if ($_GET["id"]) {
    $id = $_GET["id"];
    require_once "../database.php";
    require_once "../functions.php";

    //GET BLOG DETAILS
    $statement = $pdo->prepare("SELECT * FROM blog 
                                    INNER JOIN category
                                    on blog.CategoryId = category.CategoryId
                                    INNER JOIN creator
                                    on blog.CreatorId = creator.CreatorId
                                    WHERE blog.BlogId=:blogId
                                    ORDER BY blog.BlogId DESC
                                    ");
    $statement->bindParam(":blogId", $id);
    $statement->execute();
    $blog = $statement->fetch(PDO::FETCH_ASSOC);

    $currentView = $blog['ViewCount'] += 1;

    //UPDATE BLOG VIEW COUNT

    $statement = $pdo->prepare("UPDATE blog SET ViewCount = :viewcount WHERE BlogId = :id");
    $statement->bindValue(':viewcount', $currentView);
    $statement->bindValue(':id', $id);
    $statement->execute();

    //GET RANDOM 2 BLOG
    $statement = $pdo->prepare("SELECT * FROM blog 
                                INNER JOIN category 
                                on blog.CategoryId = category.CategoryId 
                                INNER JOIN creator 
                                on blog.CreatorId = creator.CreatorId 
                                ORDER BY rand() DESC LIMIT 2");
    $statement->execute();
    $randomBlogs = $statement->fetchAll(PDO::FETCH_ASSOC);
} else {
    header("Location:index.php");
}
?>
<?php include_once "../views/partials/header.php"; ?>
<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active"><?php echo $blog["BlogTitle"]; ?></li>
                        </ol>

                        <span class="color-orange"><a href="/category/index.php?id=<?php echo $blog["CategoryId"]; ?>" title=""><?php echo $blog["CategoryName"]; ?></a></span>

                        <h3><?php echo $blog["BlogTitle"]; ?></h3>

                        <div class="blog-meta big-meta">
                            <small><a href="#" title=""><?php echo time_elapsed_string($blog["BlogCreatedTime"]); ?></a></small>
                            <small><a href="author.php?id=<?php echo $blog["CreatorId"]; ?>" title=""><?php echo $blog["CreatorName"]; ?></a></small>
                            <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo $blog["ViewCount"]; ?></a></small>
                        </div><!-- end meta -->


                    </div><!-- end title -->



                    <?php echo $blog["BlogDescription"]; ?>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="../assets/upload/banner_01.jpg" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="invis1">

                   


                    <div class="custombox authorbox clearfix">
                        <h4 class="small-title">About author</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <img src="../assets/upload/author.jpg" alt="" class="img-fluid rounded-circle">
                            </div><!-- end col -->

                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <h4><a href="/author.php?id=<?php echo $blog["CreatorId"]; ?>"><?php echo $blog["CreatorName"] ?></a></h4>
                                <p><?php echo $blog["CreatorDescription"] ?></p>

                                <div class="topsocial">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                </div><!-- end social -->

                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end author-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">You may also like</h4>
                        <div class="row">
                            <?php foreach($randomBlogs as $i=>$randomBlog): ?>
                            <div class="col-lg-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="/detail.php?id=<?php echo $randomBlog['BlogId']; ?>" title="">
                                            <img src="../assets/upload/tech_menu_04.jpg" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class=""></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="/detail.php?id=<?php echo $randomBlog['BlogId']; ?>" title=""><?php  echo $randomBlog['BlogTitle']; ?></a></h4>
                                        <small><a href="/category/index.php?id=<?php echo $randomBlog['CategoryId']; ?>" title=""><?php  echo $randomBlog['CategoryName']; ?></a></small>
                                        <small><a href="/detail.php?id=<?php echo $randomBlog['BlogId']; ?>" title=""><?php  echo time_elapsed_string($blog["BlogCreatedTime"]); ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->
                            <?php endforeach; ?>
                            
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">



                    <?php include_once "../views/partials/comment.php" ?>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->

            <?php include_once "../views/partials/section-right.php" ?>
            <!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>


<?php include_once "../views/partials/footer.php" ?>