<?php
if ($_GET["id"]) {
    $id = $_GET["id"];
    require_once "../../database.php";
    $statement = $pdo->prepare("SELECT * FROM blog
                                INNER JOIN category
                                on blog.CategoryId = category.CategoryId
                                INNER JOIN creator
                                on blog.CreatorId = creator.CreatorId
                                WHERE blog.CategoryId = :categoryId
                                ORDER BY blog.BlogId");

    $statement->bindParam(":categoryId", $id);
    $statement->execute();
    $blogs = $statement->fetchAll(PDO::FETCH_ASSOC);
} else {
    header("Location:/index.php");
}
?>
<?php include_once "../../views/partials/header.php"; ?>

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-gears bg-orange"></i> <?php echo $blogs[0]['CategoryName']?> <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active"><?php echo $blogs[0]['CategoryName']?></li>
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
                    <div class="blog-grid-system">
                        <div class="row">
                            <?php foreach ($blogs as $i => $blog) : ?>
                                <div class="col-md-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="tech-single.html" title="">
                                                <img src="../assets/upload/tech_menu_01.jpg" alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta big-meta">
                                            <span class="color-orange"><a href="/category/index.php?id=<?php echo $blog["CategoryId"]; ?>" style="background-color: <?php echo $blog["CategoryColor"];?> !important;"><?php echo $blog["CategoryName"]; ?></a></span>
                                            <h4><a href="/detail.php?id=<?php echo $blog["BlogId"]; ?>" title=""><?php echo $blog["BlogTitle"] ?></a></h4>
                                            <p><?php echo $blog["BlogDescription"]; ?></p>
                                            <small><a href="tech-single.html" title=""><?php echo date('Y-m-d', strtotime($blog["BlogCreatedTime"])); ?></a></small>
                                            <small><a href="tech-author.html" title=""><?php echo $blog["CreatorName"]; ?></a></small>
                                            <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i> <?php echo $blog["ViewCount"]; ?></a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                            <?php endforeach; ?>
                        </div><!-- end row -->
                    </div><!-- end blog-grid-system -->
                </div><!-- end page-wrapper -->

                <hr class="invis3">

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
            <?php include_once "../../views/partials/section-right.php" ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php include_once "../../views/partials/footer.php" ?>