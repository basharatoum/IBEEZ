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
<h1 style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">iBeez أهداف</h1>
<p style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:17px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
نحن نعتقد أن التكنولوجيا هي أهم شيء في الوقت الحاضر ، وأنه يتعين علينا أن نركز على ذلك، لماذا ؟ لأن كمية الحاجة للمبرمجين و المصممين في وقتنا هذا في ازدياد، ولأن تعلم ذلك سوف يعطيك عامل المنطق الذي يفتقره الكثير من الناس؛ ولهذا  بنينا هذا الموقع لإعلام المستخدمين حول الأحداث ، والمواقع ، والكتب ، وكل شيء من شأنه أن يساعدهم في معرفة المزيد عن البرمجة ، ونحن أيضا بنينا هذا الموقع ل ربط الطلاب مع المعلمين من جميع أنحاء العالم حتى يتمكنوا من تبادل المعرفة من خلال هذه الشبكة الاجتماعية البسيطة.
</p>
</div>
         <div id="pageMiddle" style=" margin-top:30px; background-color:#252424; border-radius:50px; height:auto;  width:920px; margin-left:auto; color:#000;  margin-right:auto; padding:40px; ">
<h1 style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">Code.org</h1>

<p style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:17px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
أطلقت في عام  2013 هي منظمة ل توسيع المشاركة في علوم الكمبيوتر من خلال جعلها متاحة في المزيد من المدارس ، وزيادة مشاركة المرأة والطلبة، وهي منظمة غير ربحية. رؤيتنا هي أن كل طالب في كل مدرسة يجب أن يتاح له الفرصة ل تعلم علوم الكمبيوتر. ونعتقد أنه ينبغي ان تكون علوم الكمبيوتر و برمجة الكمبيوتر جزءا من المناهج الدراسية الأساسية في مجال التعليم ، جنبا إلى جنب مع العلوم الأخرى والتكنولوجيا والهندسة والرياضيات
</p>
<div id="vvid" style="width:810px; margin-top:20px; height:auto;	 margin-left:auto; margin-right:auto;">
                    <iframe  width="800" height="450" style="margin-left:auto; margin-right:auto;" src="https://www.youtube.com/embed/nKIu9yen5nc" frameborder="0"></iframe>
                    </div>
</div>

   <div id="pageMiddle" style=" margin-top:30px; background-color:#252424; border-radius:50px; height:auto;  width:920px; margin-left:auto; color:#000;  margin-right:auto; padding:40px; ">
<h1 style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:72px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">Codability</h1>

<p style="text-align:center; color:#FFFFFF; margin-top:10px; font-size:17px; font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
هو حدث جرى في جامعة الأميرة سمية في صيف عام 2014 الذي اقيم لتعليم الأطفال الصغار كيفية كتابة التعليمات البرمجية ، عن طريق تعليمهم لغة برمجية . يمكنك الانضمام دائما في هذا الحدث عن طريق الاتصال بجامعة الأميرة سمية ، وأفضل شيء في هذا المشروع هو المشروع الذي يقدم بالعربية بالكامل الذي هو في الحقيقة شيء يمكن أن نفخر بهذ</p>
<div id="vvid" style="width:810px; margin-top:20px; height:auto;	 margin-left:auto; margin-right:auto;">
                    <iframe  width="800" height="450" style="margin-left:auto; margin-right:auto;" src="https://www.youtube.com/embed/uP-piIngtbA" frameborder="0"></iframe>
                    </div>
</div>
                    
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