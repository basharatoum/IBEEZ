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
		<meta name="keywords" content="3d page, menu, navigation, mobile, perspective, css transform, web development, web design" />
		<meta name="author" content="Codrops" />
<link rel="icon" href="images/avatardefault.png" type="image/png">
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
<div style="width:100%; z-index:15; height:150px; position:fixed;">
<img id="showMenu"  style="border:none; background-color:transparent; margin-top:140px; right:0; float:right; z-index:15;" src="images/menu.png" width="100" height="200" alt=""/>

 <div style="width:100px; height:33px; padding:6px; background-image:url(images/lang.png); float:right; margin-right:200px;">
         <a href="index.php">  <img style="	margin-left:15px;"src="images/eng.png" width="20" height="20" /></a>
            <a href="index-ar.php">  <img style="	margin-left:15px;" src="images/ar.png" width="20" height="20" /></a>
           </div>

</div>
		<div class="wrapper" style="background-color:#fec633;"><!-- wrapper needed for scroll -->
					<!-- Top Navigation -->
					            
					<div class="main clearfix">
						
		  </div><!-- /main -->
                         
          
                    <div id="vid" style="width: 100%; height: 700px; ">
                    <div style="width:700px;	margin-left:auto; margin-right:auto; height:150px;">       <img src="images/ll.png" width="700" height="150"  style="float:left; width:auto;	height:auto;	 " alt=""/>
		                 
           </div>
                    <div id="vvid" style="width:810px; margin-top:20px; height:auto;	 margin-left:auto; margin-right:auto;">
                    <iframe  width="800" height="450" style="margin-left:auto; margin-right:auto;" src="https://www.youtube.com/embed/gQ35PNvBFjA" frameborder="0" allowfullscreen></iframe>
                    </div>
                    </div>
<div style="width: 100%; height: 1050px; margin-top: 0px; background-color: hsla(0,0%,10%,1.00); border-radius: 0px;">
<h1 style="text-align:center; color:white; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">من نحن</h1>
<div style="width:960px; margin-right:auto; margin-left:auto; height:910px;">
   <div class="p" style=" float:left; text-align:right; border-radius:20px;background-color:#fec633; color:hsla(0,0%,0%,1.00); font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:20px; padding:20px;	margin:15px; margin-top:140px; width:600px; height:200px;">"انا بشار العتوم من مدرسة اليوبيل ، عمري 17 سنة، حصلت على المركز الثالث في مسابقة السوفتك، وحصلت على المركز الاول في مسابقة الكومبيوتر ويزرد في الهند و كنت احدى الاربعة الممثيلين الاردن في الاولمبياد العالمية للمعلوماتية في تايوان 2014 ، و حصلت على المركز الاول في الاولمبياد الاردني للمعلوماتية و سوف امثل الاردن في الاولمبياد العالمية للمعلوماتية في كازاخستان 2015
     </div>    
                     <div id="grid"   style="" class="grid clearfix">
				<a href="#"  style="float:left;" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
                
					<figure>
						<img src="img/4.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
						<figcaption>
							<h2>بشار</h2>
							<p>المبرمج</p>
						</figcaption>
					</figure>
				</a>
                
			</div>

            
            <div class="p"  style=" text-align:right; float:left; border-radius:20px;background-color:#fec633; color:hsla(0,0%,0%,1.00); font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size:20px; padding:20px;	margin:15px; margin-top:140px; width:600px; height:200px;">انا حسام ابو خرج من مدرسة اليوبيل ، عمري 17 سنة، حصلت على المركز الثالث في مسابقة السوفتك، وحصلت على المركز الثالث في مسابقة الكومبيوتر كويز في الهند و حصلت على جوائز في التصميم في الاردن
            </div>
             <div id="grid"   style="" class="grid clearfix">
                     
				<a href="#"   data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
					<figure>
						<img src="img/2.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
						<figcaption>
							<h2>حسام</h2>
							<p>المصمم</p>
						</figcaption>
					</figure>
                    
				</a>
          </div>
        </div>
</div>
<div style="width: 100%; height: 950px; margin-top: 0px; background-color: #d0d0d0; border-radius: 0px;">
<h1 style="text-align:center; color:#000000; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">Brain manager</h1>
<div style="width:960px; margin-right:auto; margin-left:auto; height:910px;">
<div style="width:400px; margin-left:0px;float:left;">
<ul class="bxslider">
  <li><img src="images/pic1.jpg" /></li>
  <li><img src="images/pic2.jpg" /></li>
  <li><img src="images/pic3.jpg" /></li>
  <li><img src="images/pic4.jpg" /></li>
</ul>
</div>
<div style="width:50%; float:right;  height:50px;">
  <img  style="float:right;"src="images/icon logo.png" width="50" height="50" alt=""/>
     <h3 style="float:right; margin-left:10px; text-align:right; color:hsla(0,0%,0%,1.00);">ما هو؟</h3>
   </div>
   <div style="color:hsla(0,0%,0%,1.00); float:right; width:50%;text-align:right; margin-top:5px; font-size:16px; padding:10px;">هو عبارة عن تطبيق قام ببنائه فريق السيمبسونز في مسابقة الروبوت المفتوحة ، يقوم هذا التطبيق بمساعدة الطلاب بحل المسائل الرياضية و الفيزيائية.</div>

<div style="width:50%; float:right;  height:50px; margin-top:10px;">
  <img  style="float:right;"src="images/icon logo.png" width="50" height="50" alt=""/>
     <h3 style="float:right; margin-left:10px;text-align:right;  color:hsla(0,0%,0%,1.00);">كيف يعمل؟</h3>
   </div>
   <div style=" float:right;color:hsla(0,0%,0%,1.00); margin-top:5px; font-size:16px; text-align:right; width:50%; padding:10px;">يجب على المستخدم ان يعطي ما يكفي من المتغيرات إلى التطبيق بحيث يستطيع حل المعادلة

</div>
   <div style="width:50%; float:right;  height:50px; margin-top:10px">
  <img  style="float:right;"src="images/icon logo.png" width="50" height="50" alt=""/>
     <h3 style="float:right; text-align:right;  margin-left:10px; color:hsla(0,0%,0%,1.00);">فقط؟</h3>
   </div>
   <div style=" float:right;color:hsla(0,0%,0%,1.00); margin-top:5px; width:50%; text-align:right; font-size:16px;  padding:10px;">كلا، هذا التطبيق يحتوي على اختبار الدماغ الذي سيختبر الجهة الأكثر استخداما من عقلك ، و سوف يساعدك على تنظيم عملك اعتمادا على النتيجة

</div>
   <a href="brainmanager.apk">
       <button  style="border:none; float:right; color: #FFF; background-color: #4cc87f; padding: 125px; bottom: 0px; margin-left:auto; margin-right:auto; margin-top:10px; padding-top: 10px; padding-bottom: 20px; border-radius: 40px; font-weight:900;" >تحميل للاندرويد</button> 
</a>
</div>
</div>
<div id="pageMiddle" style=" margin-top:30px; background-color:#252424; border-radius:50px; height:auto;  width:920px; margin-left:auto; color:#000;  margin-right:auto; padding:40px; ">
<h1 style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">المدونة</h1>
  <?php include_once("hoho.php"); ?>

</div>
<script>
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>

		<script>
		
			(function() {
	
				function init() {
					var speed = 330,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
		</script>
	</div><!-- wrapper -->
		  </div><!-- /container -->
			<nav class="outer-nav right vertical">
			<a href="index-ar.php" >الصفحة الرئيسية</a>
				<a href="ler-ar.php" >تعلم</a>
				
				<?php include_once("template_pageTop-ar.php"); ?>
			</nav>
		</div><!-- /perspective -->
		<script src="js/classie.js"></script>
		<script src="js/menu.js"></script>
	</body>
</html>