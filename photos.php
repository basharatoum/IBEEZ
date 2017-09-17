<?php
include_once("php_includes/check_login_status.php");
// Make sure the _GET "u" is set, and sanitize it
$u = "";
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} else {
    header("location: http://www.webintersect.com");
    exit();	
}
$photo_form = "";
// Check to see if the viewer is the account owner
$isOwner = "no";
if($u == $log_username && $user_ok == true){
	$isOwner = "yes";
	$photo_form  = '<form style="border-radius:40px; background-color:#006ab8; border:none;" id="photo_form" enctype="multipart/form-data" method="post" action="php_parsers/photo_system.php">';
	$photo_form .=   '<h3>Hi '.$u.', add a new photo into one of your galleries</h3>';
	$photo_form .=   '<b>Choose Gallery:</b> ';
	$photo_form .=   '<select style="border:none; width:300px;  border-radius:15px; background-color:hsla(0,0%,100%,1.00); color:hsla(0,0%,0%,1.00); border:none;" name="gallery" required>';
	$photo_form .=     '<option value=""></option>';
	$photo_form .=     '<option value="Myself">Myself</option>';
	$photo_form .=     '<option value="Family">Family</option>';
	$photo_form .=     '<option value="Pets">Pets</option>';
	$photo_form .=     '<option value="Friends">Friends</option>';
	$photo_form .=     '<option value="Random">Random</option>';
	$photo_form .=   '</select>';
	$photo_form .=   ' &nbsp; &nbsp; &nbsp; <b>Choose Photo:</b> ';
	$photo_form .=   '<input style="border: none; color: #FFF; background-color: #4cc87f; padding: 10px;  margin-top:10px; padding-top: 10px; padding-bottom: 10px; border-radius: 40px;" type="file" name="photo" accept="image/*" required>';
	$photo_form .=   '<p><input style="border: none; color: #FFF; background-color: #4cc87f; padding: 10px;  margin-top:10px; padding-top: 10px; padding-bottom: 10px; border-radius: 40px;" type="submit" value="Upload Photo Now"></p>';
	$photo_form .= '</form>';
}
// Select the user galleries
$gallery_list = "";
$sql = "SELECT DISTINCT gallery FROM photos WHERE user='$u'";
$query = mysqli_query($db_conx, $sql);
if(mysqli_num_rows($query) < 1){
	$gallery_list = "This user has not uploaded any photos yet.";
} else {
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$gallery = $row["gallery"];
		$countquery = mysqli_query($db_conx, "SELECT COUNT(id) FROM photos WHERE user='$u' AND gallery='$gallery'");
		$countrow = mysqli_fetch_row($countquery);
		$count = $countrow[0];
		$filequery = mysqli_query($db_conx, "SELECT filename FROM photos WHERE user='$u' AND gallery='$gallery' ORDER BY RAND() LIMIT 1");
		$filerow = mysqli_fetch_row($filequery);
		$file = $filerow[0];
		$gallery_list .= '<div>';
		$gallery_list .=   '<div onclick="showGallery(\''.$gallery.'\',\''.$u.'\')">';
		$gallery_list .=     '<img src="user/'.$u.'/'.$file.'" alt="cover photo">';
		$gallery_list .=   '</div>';
		$gallery_list .=   '<b>'.$gallery.'</b> ('.$count.')';
		$gallery_list .= '</div>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $u; ?> Photos</title>
<link rel="icon" href="images/avatardefault.png" type="image/png">
<style type="text/css">
form#photo_form{background:#2c796f; color:white; border:#AFD80E 1px solid; padding:20px;}
div#galleries{}
div#galleries > div{float:left; margin:20px; text-align:center; cursor:pointer;}
div#galleries > div > div {height:100px; overflow:hidden;}
div#galleries > div > div > img{width:150px; cursor:pointer;}
div#photos{display:none; border:#666 1px solid; padding:20px;}
div#photos > div{float:left; width:125px; height:80px; overflow:hidden; margin:20px;}
div#photos > div > img{width:125px; cursor:pointer;}
div#picbox{display:none; padding-top:36px;}
div#picbox > img{max-width:800px; display:block; margin:0px auto;}
div#picbox > button{ display:block; float:right; font-size:36px; padding:3px 16px;}
</style>
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
<script>
function showGallery(gallery,user){
	_("galleries").style.display = "none";
	_("section_title").innerHTML = user+'&#39;s '+gallery+' Gallery &nbsp; <button style="border: none; color: #FFF; background-color: #4cc87f; padding: 10px;  margin-top:10px; padding-top: 10px; padding-bottom: 10px; border-radius: 40px;" onclick="backToGalleries()">Go back to all galleries</button>';
	_("photos").style.display = "block";
	_("photos").innerHTML = 'loading photos ...';
	var ajax = ajaxObj("POST", "php_parsers/photo_system.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			_("photos").innerHTML = '';
			var pics = ajax.responseText.split("|||");
			for (var i = 0; i < pics.length; i++){
				var pic = pics[i].split("|");
				_("photos").innerHTML += '<div><img onclick="photoShowcase(\''+pics[i]+'\')" src="user/'+user+'/'+pic[1]+'" alt="pic"><div>';
			}
			_("photos").innerHTML += '<p style="clear:left;"></p>';
		}
	}
	ajax.send("show=galpics&gallery="+gallery+"&user="+user);
}
function backToGalleries(){
	_("photos").style.display = "none";
	_("section_title").innerHTML = "<?php echo $u; ?>&#39;s Photo Galleries";
	_("galleries").style.display = "block";
}
function photoShowcase(picdata){
	var data = picdata.split("|");
	_("section_title").style.display = "none";
	_("photos").style.display = "none";
	_("picbox").style.display = "block";
	_("picbox").innerHTML = '<button style="border: none; color: #FFF; background-color: #4cc87f; padding: 10px;  margin-top:10px; padding-top: 10px; padding-bottom: 10px; border-radius: 40px;" onclick="closePhoto()">x</button>';
	_("picbox").innerHTML += '<img src="user/<?php echo $u; ?>/'+data[1]+'" alt="photo">';
	if("<?php echo $isOwner ?>" == "yes"){
		_("picbox").innerHTML += '<p id="deletelink"><a href="#" onclick="return false;" onmousedown="deletePhoto(\''+data[0]+'\')">Delete this Photo <?php echo $u; ?></a></p>';
	}
}
function closePhoto(){
	_("picbox").innerHTML = '';
	_("picbox").style.display = "none";
	_("photos").style.display = "block";
	_("section_title").style.display = "block";
}
function deletePhoto(id){
	var conf = confirm("Press OK to confirm the delete action on this photo.");
	if(conf != true){
		return false;
	}
	_("deletelink").style.visibility = "hidden";
	var ajax = ajaxObj("POST", "php_parsers/photo_system.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			if(ajax.responseText == "deleted_ok"){
				alert("This picture has been deleted successfully. We will now refresh the page for you.");
				window.location = "photos.php?u=<?php echo $u; ?>";
			}
		}
	}
	ajax.send("delete=photo&id="+id);
}
</script>

<style>
#pageMiddle{
	width: 920px;
	margin-left: auto;
	margin-right: auto;
	height: 800px;
	padding:20px;
	}
	</style>
    <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>iBeez</title>
		<meta name="description" content="Perspective Page View Navigation: Transforms the page in 3D to reveal a menu" />
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
</head>
<body style="margin: 0px;  background-image:url(images/bk.png);">


<div  id="perspective" style="background-color:#fec633;" class="perspective effect-moveleft">
         
<div class="container" style="background-color:#fec633;">
<div style="width:100%; z-index:15; height:100px; position:fixed;">
<img id="showMenu"  style="border:none; background-color:transparent; margin-top:140px; right:0; float:right; z-index:15;" src="images/menu.png" width="100" height="200" alt=""/>
 <div style="width:100px; height:33px; padding:6px; background-image:url(images/lang.png); float:right; margin-right:200px;">
         <a href="index.php">  <img style="	margin-left:15px;"src="images/eng.png" width="20" height="20" /></a>
            <a href="index-ar.php">  <img style="	margin-left:15px;" src="images/ar.png" width="20" height="20" /></a>
           </div>
       <img src="images/lll.png" width="221" height="300"  style="float:left; width:auto;	height:auto;	 z-index:10;" alt=""/>
</div>		<div class="wrapper" style=" width:auto; height:autobackground-color:#fec633;"><!-- wrapper needed for scroll -->
					<!-- Top Navigation -->
					            
					<div class="main clearfix">
						
		  </div><!-- /main -->

<div style=" width:100%; height:100px;"></div>

<div id="pageMiddle" style=" background-color:#252424; border-radius:50px; height:auto;  width:920px; margin-left:auto; color:#000;  margin-right:auto; padding:40px; color:white;">
  <div id="photo_form"><?php echo $photo_form; ?></div>
  <h2 id="section_title"><?php echo $u; ?>&#39;s Photo Galleries</h2>
  <div id="galleries"><?php echo $gallery_list; ?></div>
  <div id="photos"></div>
  <div id="picbox"></div>
  <p style="clear:left;">These photos belong to <a href="user.php?u=<?php echo $u; ?>"><?php echo $u; ?></a></p>
</div>
</div><!-- wrapper -->
		  </div><!-- /container -->
			<nav class="outer-nav right vertical">
				<a href="index.php" >Home</a>
				<a href="ler.php" >Learn</a>
				<?php include_once("template_pageTop.php"); ?>

			</nav>
		</div><!-- /perspective -->
		<script src="js/classie.js"></script>
		<script src="js/menu.js"></script>
</body>
</html>