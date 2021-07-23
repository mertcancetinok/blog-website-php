<?php 
    require_once "../../database.php";
    require_once "../../functions.php";
    ob_start();
    $errors = [];
    if (isset($_SESSION['fullName'])!="" ) {
      header("Location: /index.php");
      exit;
    }
    if(isset($_POST['forgotPassword'])){
        $email = $_POST['email'];
        $statement = $pdo->prepare("SELECT * FROM users WHERE userEmail=:userEmail");
        $statement->bindValue(":userEmail",$email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        $result = "";
        if($user!=null){
             $emailSHA256 = hash('sha256', $email);
             $passSHA256 = hash('sha256', $user['userPass']);
             $mailContent = "
             <h2>Reset your Password</h2></br>
             <a href='http://localhost:8080/auth/reset.php?key=".$emailSHA256."&reset=".$passSHA256."'>Click To Reset password</a>";
             $result = sendEmail($email,'Password Reset - blog.com',$mailContent);
        }else{
            $errors[] = "$email.We couldn't find any users.";
        }
    }
?>
<?php include_once "../../views/partials/header.php"; ?>
<div class="container">
      <div class="card login-card" style="margin-top: 10%; margin-bottom:10%;">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <?php foreach($errors as $error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
              <?php endforeach; ?>
              <?php if(isset($result)!=''): ?>
                <div class="alert alert-success">
                 <?php echo $result; ?>
                </div>
              <?php endif; ?>
                <p class="login-card-description">Forgot Password</p>
              <form action="#!" method="POST">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                  </div>
                  <input name="forgotPassword" id="forgotPassword" class="btn btn-block login-btn mb-4" type="submit" value="Forgot Password">
                </form>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
</div>
<?php include_once "../../views/partials/footer.php" ?>