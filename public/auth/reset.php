<?php include_once "../../views/partials/header.php"; ?>
<?php 
    require_once("../../database.php");
    ob_start();
    if (isset($_SESSION['fullName'])!="" ) {
        header("Location: /index.php");
        exit;
    }

    if($_GET['key'] && $_GET['reset'])
    {
        $errors = [];
        $email=$_GET['key'];
        $pass=$_GET['reset'];

        //GET DATA
        $statement = $pdo->prepare("select userEmail,userPass from users where SHA2(userEmail,256)=:email and SHA2(userPass,256)=:pass");
        $statement->bindValue(":email",$email);
        $statement->bindValue(":pass",$pass);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);

        //update password
        if(isset($_POST['resetPassword'])){
            $newPassword = $_POST['password'];
            $statement = $pdo->prepare("update users set userPass=:password where userEmail=:email");

            $statement->bindValue(":password",hash('sha256',$newPassword));
            $statement->bindValue(":email",$email=$data['userEmail']);
            $statement->execute();

            header("Location:/auth/login.php");
        }
       
    }else{
        header("Location:/index.php");
    }
?>
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
                <p class="login-card-description">New Password</p>
              <form action="#!" method="POST">
                  <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="confirmPassword" class="sr-only">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                  </div>
                  <input name="resetPassword" id="resetPassword" class="btn btn-block login-btn mb-4" type="submit" value="Reset Password">
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
<?php include_once "../../views/partials/footer.php"; ?>