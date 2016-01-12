<?php
// Variables
$pagename = "Landing Page";


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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control preloademail" id="email" placeholder="Email" onfocusout="sendEmail()">
          </div>
          <div class="form-group">
            <label for="name">Password</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
          </div>
          <input type="submit" class="btn btn-default" id="name">
        </form>

      </div>
    </div>



  </body>
</html>