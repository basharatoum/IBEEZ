<!DOCTYPE html>
<?php
include_once("php_includes/check_login_status.php");
$sql= mysqli_query($db_conx,$sql);
$userlist="";
?>
<html lang="en" class="no-js">
	<head>
    <script src="js/main.js"></script>
<script src="js/ajax.js"></script>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>iBeez</title>
		<meta name="description" content="Perspective Page View Navigation: Transforms the page in 3D to reveal a menu" />
	<link rel="icon" href="images/avatardefault.png" type="image/png">

    	<meta name="keywords" content="3d page, menu, navigation, mobile, perspective, css transform, web development, web design" />
		<meta name="author" content="Codrops" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!-- csstransforms3d-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load --> 
		<script src="js/modernizr.custom.25376.js"></script>
        		<link rel="stylesheet" type="text/css" href="css/normalizee.css" />
		<link rel="stylesheet" type="text/css" href="css/demoo.css" />
		<link rel="stylesheet" type="text/css" href="css/componentt.css" />
		<script src="js/snap.svg-min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="js/jquery.bxslider.min.js"></script>

<link href="css/jquery.bxslider.css" rel="stylesheet" />
	</head>
	<body style="	margin:0px; background-color:#fec633; ">
		<div  id="perspective" style="background-color:#fec633; " class="perspective effect-moveleft">
         
<div class="container" style="background-color:#fec633;">
<div style="width:100%; z-index:15; height:100px; position:fixed;">

<img id="showMenu"  style="border:none; background-color:transparent; margin-top:140px; right:0; float:right; z-index:15;" src="images/menu.png" width="100" height="200" alt=""/>
 <div style="width:100px; height:33px; padding:6px; background-image:url(images/lang.png); float:right; margin-right:200px;">
         <a href="ler.php">  <img style="	margin-left:15px;"src="images/eng.png" width="20" height="20" /></a>
            <a href="ler-ar.php">  <img style="	margin-left:15px;" src="images/ar.png" width="20" height="20" /></a>
           </div>
       <img src="images/lll.png" width="221" height="300"  style="float:left; width:auto;	height:auto;	 z-index:10;" alt=""/>
</div>
		<div class="wrapper" style=" "><!-- wrapper needed for scroll -->
					<!-- Top Navigation -->
					            
					<div class="main clearfix">
						
		  </div><!-- /main -->
             <div id="pageMiddle" style=" margin-top:30px; background-color:#252424; border-radius:50px; height:auto;  width:920px; margin-left:auto; color:#000;  margin-right:auto; padding:40px; ">
<h1 style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">iBeez goals</h1>
<p style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:17px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
We believe that technology is the most important thing nowadays and that we should focus on it and let our students focus on it,why? because the amount of need for programmers and designers is just increasing, and because learning to do so will give you the logic factor that so many people lack of; thats why we have made iBeez to inform our users about the events, websites, books, and everything that will help them to know more about programming, we also made this website to connect students with teachers from all around the globe so they can share knowledge by this simple social network platform. 
</p>
</div>
         <div id="pageMiddle" style=" margin-top:30px; background-color:#252424; border-radius:50px; height:auto;  width:920px; margin-left:auto; color:#000;  margin-right:auto; padding:40px; ">
<h1 style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">Code.org</h1>

<p style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:17px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
Launched in 2013, Code.org® is a non-profit dedicated to expanding participation in computer science by making it available in more schools, and increasing participation by women and underrepresented students of color. Our vision is that every student in every school should have the opportunity to learn computer science. We believe computer science and computer programming should be part of the core curriculum in education, alongside other science, technology, engineering, and mathematics (STEM) courses, such as biology, physics, chemistry and algebra.
</p>
<div id="vvid" style="width:810px; margin-top:20px; height:auto;	 margin-left:auto; margin-right:auto;">
                    <iframe  width="800" height="450" style="margin-left:auto; margin-right:auto;" src="https://www.youtube.com/embed/nKIu9yen5nc" frameborder="0"></iframe>
                    </div>
</div>

   <div id="pageMiddle" style=" margin-top:30px; background-color:#252424; border-radius:50px; height:auto;  width:920px; margin-left:auto; color:#000;  margin-right:auto; padding:40px; ">
<h1 style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">Codability</h1>

<p style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:17px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
It is an event that was done in PSUT in the summer of 2014 which was made to teach young kids how to write code, by teaching them C++ programming language; you can always join that event by contacting the PSUT, the best thing in this project that it is a fully arabian made project which is really something to be proud of.
</p>
<div id="vvid" style="width:810px; margin-top:20px; height:auto;	 margin-left:auto; margin-right:auto;">
                    <iframe  width="800" height="450" style="margin-left:auto; margin-right:auto;" src="https://www.youtube.com/embed/uP-piIngtbA" frameborder="0"></iframe>
                    </div>
</div>
                    
</div><!-- wrapper -->
		  </div><!-- /container -->
			<nav class="outer-nav right vertical">
				<a style="" href="index.php" >Home</a>
				<a style="" href="ler.php" >Learn</a>
				
				<?php include_once("template_pageTop.php"); ?>

			</nav>
		</div><!-- /perspective -->
		<script src="js/classie.js"></script>
		<script src="js/menu.js"></script>
	</body>
</html>