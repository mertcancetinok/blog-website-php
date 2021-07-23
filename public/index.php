<?php 
    require_once("../database.php");
    require_once("../functions.php");
    //GET THE  LAST 10 RECORDS FROM BLOG TABLE
    $statement = $pdo->prepare("SELECT * FROM blog
                                INNER JOIN category
                                on blog.CategoryId = category.CategoryId
                                INNER JOIN creator
                                on blog.CreatorId = creator.CreatorId
                                ORDER BY blog.BlogId DESC LIMIT 10");
    $statement->execute();
    $blogs = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //GET RANDOM 3 BLOG 
    $statement = $pdo->prepare("SELECT * FROM blog 
                                INNER JOIN category 
                                on blog.CategoryId = category.CategoryId 
                                INNER JOIN creator 
                                on blog.CreatorId = creator.CreatorId 
                                ORDER BY rand() DESC LIMIT 3");
    $statement->execute();
    $randomBlog = $statement->fetchAll(PDO::FETCH_ASSOC);
    

?>
        <?php include_once "../views/partials/header.php"; ?>
        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix">
                    <div class="first-slot">
                        <div class="masonry-box post-media">
                             <img src="/assets/upload/tech_01.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a href="/category/index.php?id=<?php echo $randomBlog[0]["CategoryId"]; ?>"><?php echo $randomBlog[0]["CategoryName"]; ?></a></span>
                                        <h4><a href="/detail.php?id=<?php echo $randomBlog[0]["BlogId"]; ?>"><?php echo $randomBlog[0]["BlogTitle"]; ?></a></h4>
                                        <small><a href="/detail.php?id=<?php echo $randomBlog[0]["BlogId"]; ?>"><?php echo time_elapsed_string($randomBlog[0]["BlogCreatedTime"]); ?></a></small>
                                        <small><a a href="/author.php?id=<?php echo $randomBlog[0]["CreatorId"]; ?>"><?php echo $randomBlog[0]["CreatorName"]; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end first-side -->

                    <?php for($i=1;$i<count($randomBlog);$i++): ?>
                    <div class="second-slot">
                        <div class="masonry-box post-media">
                             <img src="/assets/upload/tech_02.jpg" alt="" class="img-fluid">
                             <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"  style="background-color: <?php echo $randomBlog[$i]["CategoryColor"];?> !important;"><a href="/category/index.php?id=<?php echo $randomBlog[$i]["CategoryId"]; ?>"><?php echo $randomBlog[$i]["CategoryName"]; ?></a></span>
                                        <h4><a href="/detail.php?id=<?php echo $randomBlog[$i]["BlogId"]; ?>"><?php echo $randomBlog[$i]["BlogTitle"]; ?></a></h4>
                                        <small><a href="/detail.php?id=<?php echo $randomBlog[$i]["BlogId"]; ?>"><?php echo time_elapsed_string($randomBlog[$i]["BlogCreatedTime"]); ?></a></small>
                                        <small><a href="/author.php?id=<?php echo $randomBlog[$i]["CreatorId"]; ?>"><?php echo $randomBlog[$i]["CreatorName"]; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                             </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end second-side -->
                    <?php endfor; ?>

                    
                </div><!-- end masonry -->
            </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Last News <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <div class="blog-list clearfix">
                                <?php foreach($blogs as $i=>$blog):?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="tech-single.html">
                                                <img src="/assets/upload/tech_blog_01.jpg" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="/detail.php?id=<?php echo $blog["BlogId"]; ?>"><?php echo $blog["BlogTitle"]; ?></a></h4>
                                        <p><?php echo $blog["BlogDescription"]; ?></p>
                                        <small class="firstsmall"><a class="bg-orange" style="background-color: <?php echo $blog["CategoryColor"];?> !important;" href="/category/index.php?id=<?php echo $blog["CategoryId"]; ?>"><?php echo $blog["CategoryName"]; ?></a></small>
                                        <small><a href="/detail.php?id=<?php echo $blog["BlogId"]; ?>"><?php echo time_elapsed_string($blog["BlogCreatedTime"]); ?></a></small>
                                        <small><a href="/author.php?id=<?php echo $blog["CreatorId"]; ?>"><?php echo $blog["CreatorName"]; ?></a></small>
                                        <small><a href="/detail.php?id=<?php echo $blog["BlogId"]; ?>"><i class="fa fa-eye"></i> <?php echo $blog["ViewCount"]; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                                <?php endforeach; ?>
                                

                                
                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                    </div><!-- end col -->
                    <?php include_once "../views/partials/section-right.php" ?>
                </div>
            </div>
        </section>
        

        
        <?php include_once "../views/partials/footer.php" ?>

       