<?php 
    if($_GET["id"]){
        $id = $_GET["id"];
        require_once("../database.php");
        $statement = $pdo->prepare("SELECT * FROM blog
                                    INNER JOIN category
                                    on blog.CategoryId = category.CategoryId
                                    INNER JOIN creator
                                    on blog.CreatorId = creator.CreatorId
                                    WHERE blog.CreatorId = :id
                                    ");
        $statement->bindParam(":id",$id);
        $statement->execute();
        $authorBlog = $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }else{
        header("Location:/index.php");
    }
    
                               
?>

<?php include_once "../views/partials/header.php"; ?>

<div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-star bg-orange"></i> Author by: <?php echo $authorBlog[0]["CreatorName"]; ?></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Author</a></li>
                            <li class="breadcrumb-item active"><?php echo $authorBlog[0]["CreatorName"]; ?></li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="assets/upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#"><?php echo $authorBlog[0]["CreatorName"]; ?></a></h4>
                                        <p><?php echo $authorBlog[0]["CreatorDescription"]; ?></p>

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

                            <div class="blog-list clearfix">
                            <?php foreach($authorBlog as $i=>$blog):?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="tech-single.html" title="">
                                                <img src="/assets/upload/tech_blog_01.jpg" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="/detail.php?id=<?php echo $blog["BlogId"]; ?>"><?php echo $blog["BlogTitle"]; ?></a></h4>
                                        <p><?php echo $blog["BlogDescription"]; ?></p>
                                        <small class="firstsmall"><a class="bg-orange" style="background-color: <?php echo $blog["CategoryColor"];?> !important;" href="/category/index.php?id=<?php echo $blog["CategoryId"]; ?>" title=""><?php echo $blog["CategoryName"]; ?></a></small>
                                        <small><a href="/detail.php?id=<?php echo $blog["BlogId"]; ?>"><?php echo date('Y-m-d', strtotime($blog["BlogCreatedTime"])); ?></a></small>
                                        <small><a href="/author.php?id=<?php echo $blog["CreatorId"]; ?>" title=""><?php echo $blog["CreatorName"]; ?></a></small>
                                        <small><a href="/detail.php?id=<?php echo $blog["BlogId"]; ?>"><i class="fa fa-eye"></i> <?php echo $blog["ViewCount"]; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                                <?php endforeach; ?>
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <?php include_once "../views/partials/section-right.php" ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
<?php include_once "../views/partials/footer.php" ?>