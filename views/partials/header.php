<?php
    ob_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
    define('ROOT', dirname(__DIR__));
    require ROOT . '../../database.php';
    
    $statement = $pdo->prepare('SELECT * FROM category');
    $statement->execute();
    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['action'])){
        session_unset();
        session_destroy();
        header("Location: /auth/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Tech Blog - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="/assets/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="/assets/css/colors.css" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="/assets/css/version/tech.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="/index.php"><img src="/assets/images/version/tech-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php">Home</a>
                            </li>
                            <?php 
                                foreach($categories as $i=> $category):
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/category/index.php?id=<?php echo $category["CategoryId"]; ?>"><?php echo $category['CategoryName']?></a>
                            </li>                                              
                            <?php endforeach ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact.php">Contact</a>
                            </li>
                            <?php if(isset($_SESSION['fullName'])==""): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/auth/login.php">Login</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <ul class="navbar-nav mr-2">
                        <?php if(isset($_SESSION['fullName'])!=""): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php?action=logout">Logout</a>
                            </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-rss"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-android"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-apple"></i></a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->