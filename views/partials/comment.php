<?php 
    ob_start();
    require_once ROOT . '../../database.php';
    require_once ROOT . '../../functions.php';
    isset($_SESSION['fullName'])!='' ? $isLogin = true : $isLogin = false;

    //POST COMMENT 
    if(isset($_POST['comment'])){
        $commentDescription = $_POST['commentDescription'];
        $statement = $pdo->prepare("INSERT INTO comments 
                                    (UserId,BlogId,CommentDescription,CreateDate) 
                                     VALUES (:userId,:blogId,:commentDescription,:createDate)");
        $statement->bindValue(":userId",$_SESSION['userId']);
        $statement->bindValue(":blogId",$_GET['id']);
        $statement->bindValue(":commentDescription",$commentDescription);
        $statement->bindValue(":createDate",date('Y-m-d H:i:s'));
        $statement->execute();
        header("Location:/detail.php?id=" . $_GET['id'] . '#comments');
        
    }

    //GET COMMENTS BY BLOG ID

    if($_GET['id']){
        $statement = $pdo->prepare("SELECT * FROM comments c
                                    RIGHT JOIN users u 
                                    ON c.UserId = u.userId
                                    WHERE c.BlogId=:blogId
                                    ORDER BY c.CreateDate DESC
                                    ");
        $statement->bindValue(":blogId",$_GET['id']);
        $statement->execute();
        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<div class="custombox clearfix" id="comments">
    <h4 class="small-title"><?php echo count($comments); ?> Comments</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                <?php foreach($comments as $i=>$comment): ?>
                    <div class="media">
                    <a class="media-left" href="#">
                        <img src="../assets/upload/author.jpg" alt="" class="rounded-circle">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading user_name"><?php echo  $comment['userName']; ?><small><?php echo time_elapsed_string($comment['CreateDate']); ?> </small></h4>
                        <p><?php echo $comment['CommentDescription']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</div>

<hr class="invis1">
<div class="custombox clearfix">
    <h4 class="small-title">
        <?php  
            if($isLogin)
            {
                echo 'Leave a comment';
            }
            else
            {
                $id = $_GET['id'];
                echo "Sign in to post a comment.Click <a href='/auth/login.php?returnUrl=/detail.php?id=$id'>here</a>";

            }
        
        ?>   
    </h4>
    <div class="row" >
        <div class="col-lg-12" style="<?php  $isLogin ? '' : print 'filter: blur(8px);' ?> ">
            <form class="form-wrapper" action=" " method="POST">
                <textarea class="form-control" placeholder="Your comment" rows="10" name="commentDescription" required></textarea>
                <input type="<?php  $isLogin ? print 'submit' : print '' ?>" class="btn btn-primary" name="comment" value="Submit Comment"></input>
            </form>
        </div>
    </div>
</div>