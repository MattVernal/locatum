<?php
//
//~ Template for index.php
// variables:
//  $template - page to be displayed (included)
//  $flashes - flash messages
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $headTemplate->getTitle(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Latest compiled and minified CSS -->
        <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One|Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
        <link rel="stylesheet" href="../web/css/main.css" type="text/css">

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href='../web/index-controller.php'><img class="navbar-brand" src='../web/img/logo2.svg' href="index-controller.php" alt='logo'></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">                        
                        <?php
                        if (array_key_exists('role', $_SESSION)){
                        if ($_SESSION['role'] === 'admin' or $_SESSION['role'] === 'clinic' ){
                        echo '<li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clinic Options <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../web/index-controller.php?module=job&page=list">View my jobs</a></li>
                                <li><a href="../web/index-controller.php?module=job&page=create">Create job</a></li>
                            </ul>
                        </li>';                            
                        }}
                            ?>
                        <li><a href="../web/index-controller.php?module=browse&page=list">Browse Jobs</a></li>
                        <li><a href="../web/index-controller.php?module=contact&page=contact">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (isset($_SESSION['email'])) {
                            echo '<li><a href="index-controller.php?module=auth&page=auth&logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                        } else {
                            echo '<li><a href="index-controller.php?module=account&page=account"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                            echo '<li><a href="index-controller.php?module=auth&page=auth"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php require $view; ?>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">#MV Web Development</p>
            </div>
        </footer>  

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src='../web/js/bootstrap.js'></script>

        <!-- Latest compiled and minified JavaScript -->
    </body>




</html>
