 <?php  
session_start();
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Consommons Autrement</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keyword" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">  
   <link  href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/
          font-awesome.min.css">  
   <link href="assets/css/style.css" type="text/css" rel="stylesheet">
   <script src="jquery.js"></script>
   <script src="script.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar">
  
<div class="main"> 
 <header>
	<div id="myCarousel" class="carousel slide" data-ride="carousel" >   
    <div class="carousel-inner">
      <div class="item ">
        <img src="assets/images/panorama1.jpg" class="img-responsive" height="25%" alt="panorama1" style="width:100%;">
        <div class="carousel-caption">
											<h1>Consommons Autrement</h1>
											<p>Le site d'information pour bien acheter </p>
											</div>
      </div>
      <div class="item active">
        <img src="assets/images/vignoble.jpg" class="img-responsive" height="25%" alt="vignoble" style="width:100%;">
        <div class="carousel-caption">
											<h1>Consommons Autrement</h1>
											<p>Le site d'information pour bien acheter </p>
											</div>
      </div>    
      <div class="item">
        <img src="assets/images/lamer.jpeg" class="img-responsive" height="25%" alt="lamer.jpeg" style="width:100%;"><div class="carousel-caption">
											<h1>Consommons Autrement</h1>
											<p>Le site d'information pour bien acheter</p>
											</div>
      </div>
      <div class="item">
        <img src="assets/images/poissons.jpg" class="img-responsive" height="25%" alt="poissons.jpg" style="width:100%;"><div class="carousel-caption">
                      <h1>Consommons Autrement</h1>
                      <p>Le site d'information pour bien acheter</p>
                      </div>
      </div>
      <div class="item">
        <img src="assets/images/marchelegumes.jpeg" class="img-responsive" height="25%" alt="marchélegumes" style="width:100%;">
        <div class="carousel-caption">
											<h1>Consommons Autrement</h1>
											<p>Le site d'information pour bien acheter</p>
											</div>
      </div>
    </div>        
			<a class="left carousel-control" href="./myCarousel" data-slide="prev">
								<span class="glyphicon glyphicon-control glyphicon-chevron-left"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="./myCarousel" data-slide="next">
										<span class="glyphicon glyphicon-control glyphicon-chevron-right"></span>
										<span class="sr-only">Next</span>
									</a>									
								</div>						
 	<nav class="navbar navbar-inverse">
  <div class="container">    
    <ul class="nav navbar-nav">
      <li><a class="w3-bar-item.w3-button" href="./home">Accueil</a></li>
      <li><a class="w3-bar-item.w3-button" href="./achetez_malin">Achetez malin </a></li>
      <li><a class="w3-bar-item.w3-button" href="./achetez_responsable">Achetez responsable </a></li>
      <?php 
         if (!isset ($_SESSION['id_membre'])) {
           echo '
             <li><a class="w3-bar-item.w3-button" href="./inscription">Inscription</a></li>
            <li><a class="w3-bar-item.w3-button" href="./forum">Forum</a></li> 
              <li><a class="w3-bar-item.w3-button" href="./login">login</a></li> ';        
         }else{
             echo '<li><a class="w3-bar-item.w3-button" href="index.php?page=logout">logout</a></li>';
         }
         ?>
    </ul>
  </div>
<div id="cookie"><span class="cookie-span">  En poursuivant votre navigation sur notre site vous acceptez l'utilisation des cookies pour vous proposer des contenues et services adapter à vos centres d'intérêts ainsi qu'une navigation plus agréable.   </span><a id="cookie-dismiss" href="#">Ok</a></div>
</nav>
 <br>
 </header>