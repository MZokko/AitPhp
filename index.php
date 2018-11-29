<?php
$page_title = 'Home';
/**
dollar sign to call variable

**/
$greeting = "Heelo there , you are at $page_title";
$fruits = array('apple','pineapple','green apple', 'red apple');
/**
array ,
in php array have an index starting by 0 as usual
to print a cel -> echo $arr[1];(INDEXED ARRAY)

$car = array('model' =>'model s','make' => 'Tesla','color' => 'red');(ASSIOCIATIVE ARRAY)
to print the make cel -> echo $car['make'];
create connection to DB ->mysqli_connect($host,$user,$pass,$dbName)
**/
$car = array('model' =>'model s','make' => 'Tesla','color' => 'red');

?>
<!doctype html>
<html>
  <head>
    <title><?php echo $page_title;?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="custom.css">
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <h2>Column 1</h2>
          <p>This is a column in a Bootstrap grid system</p>
          <p><?php echo $greeting; ?></p>
          <hr>
        </div>
        <div class="col-md-6 col-sm-6">
          <h2>Column 2</h2>
          <p>This is a column in a Bootstrap grid system</p>
          <hr>
        </div>
        <div class="col-md-12 col-sm-6">
          <h2>Column 3</h2>
          <p>This is a column in a Bootstrap grid system</p>
          <hr>
        </div>
      </div>
      
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="1000">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://dummyimage.com/2048x800/0afafa/000212" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://dummyimage.com/2048x800/fac20a/000212" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://dummyimage.com/2048x800/da70f5/000212" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
  <div class="container">
      <div class="row">
          <?php
            foreach($fruits as $item){
                echo "<div class=\"col\">$item</div>";
            }
          ?>
          
      </div>
      <div class="row">
          <?php 
          foreach($car as $key=>$value){
              echo "<div class=\"col\">$key : $value </div>";
          }
          ?>
      </div>
  </div>
  </body>
</html>