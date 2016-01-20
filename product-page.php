<?php
// Variables
$pagename = "Product Page";

$expiry = time() + (365 * 24 * 60 * 60);

$cookieArray = json_decode($_COOKIE["TestCookie"],true);
$cookieArray["lastpage"] = trim($_SERVER["REQUEST_URI"], "/");
$value = $cookieArray; 

setcookie("TestCookie", json_encode($value), $expiry);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>
    
    <title><?php echo $pagename; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
    <link href="css/style.css" rel="stylesheet" />  

    
  </head>
  <body>

    <div class="container">
      <div class="col-md-4">
        <h1><?php echo $pagename; ?></h1>

            <?php 

            echo trim($_SERVER["REQUEST_URI"], "/");

           ?>
      </div>
    </div>



  </body>
</html>