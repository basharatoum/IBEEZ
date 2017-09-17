<?php
include_once("php_includes/check_login_status.php");
// If user is already logged in, header that weenis away
if($user_ok == true){
	header("location: user.php?u=".$_SESSION["username"]);
    exit();
}
?><?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["e"])){
	// CONNECT TO THE DATABASE
	include_once("db_conx.php");
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$e = mysqli_real_escape_string($db_conx, $_POST['e']);
	$p = md5($_POST['p']);
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// FORM DATA ERROR HANDLING
	if($e == "" || $p == ""){
		echo "login_failed";
        exit();
	} else {
	// END FORM DATA ERROR HANDLING
		$sql = "SELECT id, username, password FROM users WHERE email='$e' AND activated='1' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];
		if($p != $db_pass_str){
			echo "login_failed";
            exit();
		} else {
			// CREATE THEIR SESSIONS AND COOKIES
			$_SESSION['userid'] = $db_id;
			$_SESSION['username'] = $db_username;
			$_SESSION['password'] = $db_pass_str;
			setcookie("id", $db_id, strtotime( '+30 days' ), "/", "", "", TRUE);
			setcookie("user", $db_username, strtotime( '+30 days' ), "/", "", "", TRUE);
    		setcookie("pass", $db_pass_str, strtotime( '+30 days' ), "/", "", "", TRUE); 
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			$sql = "UPDATE users SET ip='$ip', lastlogin=now() WHERE username='$db_username' LIMIT 1";
            $query = mysqli_query($db_conx, $sql);
			echo $db_username;
		    exit();
		}
	}
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
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

<meta charset="UTF-8">
<title>Log In</title>
<style type="text/css">
#loginform{
	margin-top:24px;	
}
#loginform > div {
	margin-top: 12px;	
}
#loginform > input {
	width: 300px;
	padding: 5px;
	border:none;
	border-width: medium;
	border-color: #d3c584;
	 background-color:#2d2c3c;
	 color: #c1a96d;
	 
}
#loginbtn {
	font-size:15px;
	padding: 10px;
}
</style>
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
<script>
function emptyElement(x){
	_(x).innerHTML = "";
}
function login(){
	var e = _("email").value;
	var p = _("password").value;
	if(e == "" || p == ""){
		_("status").innerHTML = "Fill out all of the form data";
	} else {
		_("loginbtn").style.display = "none";
		_("status").innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "login.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "login_failed"){
					_("status").innerHTML = "Login unsuccessful, please try again.";
					_("loginbtn").style.display = "block";
				} else {
					window.location = "user.php?u="+ajax.responseText;
				}
	        }
        }
        ajax.send("e="+e+"&p="+p);
	}
}
</script>
<style>
a{
	text-decoration:none;
	color:2c796f;
	}
#pageMiddle{
	width: 960px;
	margin-left: auto;
	margin-right: auto;
	background-color: hsla(0,0%,0%,0.72);
	box-shadow: 0px 0px 14px 3px hsla(0,0%,0%,1.00);
	-webkit-box-shadow: 0px 0px 14px 3px hsla(0,0%,0%,1.00);
	color:white;
	font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
    a{
		color:#c1a96d;}
        </style>
</head>
<body style="margin: 0px;  background-image:url(images/bk.png);">

<div  id="perspective" style="background-color:#fec633;" class="perspective effect-moveleft">
         
<div class="container" style="background-color:#fec633;">
<div style="width:100%; z-index:15; height:100px; position:fixed;">
<img id="showMenu"  style="border:none; background-color:transparent; margin-top:140px; right:0; float:right; z-index:15;" src="images/menu.png" width="100" height="200" alt=""/>
 <div style="width:100px; height:33px; padding:6px; background-image:url(images/lang.png); float:right; margin-right:200px;">
         <a href="login.php">  <img style="	margin-left:15px;"src="images/eng.png" width="20" height="20" /></a>
            <a href="login-ar.php">  <img style="	margin-left:15px;" src="images/ar.png" width="20" height="20" /></a>
           </div>
       <img src="images/lll.png" width="221" height="300"  style="float:left; width:auto;	height:auto;	 z-index:10;" alt=""/>
</div>
		<div class="wrapper" style="">
					            
					<div class="main clearfix">
						
		  </div><!-- /main -->
                         
          
<div style="width:100%; height:80px;"> </div>


  <!-- LOGIN FORM -->
  <form id="loginform" onsubmit="return false;" style="text-align:right; width:300px; height:auto; margin-left:auto; color:hsla(0,0%,0%,1.00); font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;	 margin-right:auto;">
 
    <div style="text-align:right;">البريد الالكتروني</div>
    <input type="text" style="border-radius:15px;	background-color:hsla(0,0%,100%,1.00); color:hsla(0,0%,0%,1.00); border:none;" id="email" onfocus="emptyElement('status')" maxlength="88">
    <div style="text-align:right;">كلمة االمرور</div>
    <input type="password" style="border-radius:15px; background-color:hsla(0,0%,100%,1.00); color:hsla(0,0%,0%,1.00); border:none;" id="password" onfocus="emptyElement('status')" maxlength="100">
    <br /><br />
      <p id="status"></p>
 <!--   <a style="text-decoration:none; color:006ab8;" href="forget_pass.php">Forgot Your Password?</a>
    --><button  style="border: none; color: #FFF; background-color: #4cc87f; padding: 125px; bottom: 0px; margin-top:10px; padding-top: 10px; padding-bottom: 20px; border-radius: 40px;" id="loginbtn" onclick="login()">تسجيل الدخول</button> 
  
  </form>
  <!-- LOGIN FORM -->
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