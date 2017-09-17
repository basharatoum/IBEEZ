<?php
include_once("php_includes/check_login_status.php");
// If the page requestor is not logged in, usher them away
if($user_ok != true || $log_username == ""){
	header("location: http://www.yoursite.com");
    exit();
}
$notification_list = "";
$sql = "SELECT * FROM notifications WHERE username LIKE BINARY '$log_username' ORDER BY date_time DESC";
$query = mysqli_query($db_conx, $sql);
$numrows = mysqli_num_rows($query);
if($numrows < 1){
	$notification_list = "You do not have any notifications";
} else {
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$noteid = $row["id"];
		$initiator = $row["initiator"];
		$app = $row["app"];
		$note = $row["note"];
		$date_time = $row["date_time"];
		$date_time = strftime("%b %d, %Y", strtotime($date_time));
		$notification_list .= "<p><a href='user.php?u=$initiator'>$initiator</a> | $app<br />$note</p>";
	}
}
mysqli_query($db_conx, "UPDATE users SET notescheck=now() WHERE username='$log_username' LIMIT 1");
?><?php
$friend_requests = "";
$sql = "SELECT * FROM friends WHERE user2='$log_username' AND accepted='0' ORDER BY datemade ASC";
$query = mysqli_query($db_conx, $sql);
$numrows = mysqli_num_rows($query);
if($numrows < 1){
	$friend_requests = 'No friend requests';
} else {
	while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
		$reqID = $row["id"];
		$user1 = $row["user1"];
		$datemade = $row["datemade"];
		$datemade = strftime("%B %d", strtotime($datemade));
		$thumbquery = mysqli_query($db_conx, "SELECT avatar FROM users WHERE username='$user1' LIMIT 1");
		$thumbrow = mysqli_fetch_row($thumbquery);
		$user1avatar = $thumbrow[0];
		$user1pic = '<img src="user/'.$user1.'/'.$user1avatar.'" alt="'.$user1.'" class="user_pic">';
		if($user1avatar == NULL){
			$user1pic = '<img src="images/avatardefault.png" alt="'.$user1.'" class="user_pic">';
		}
		$friend_requests .= '<div id="friendreq_'.$reqID.'" class="friendrequests">';
		$friend_requests .= '<a href="user.php?u='.$user1.'">'.$user1pic.'</a>';
		$friend_requests .= '<div class="user_info" id="user_info_'.$reqID.'">'.$datemade.' <a href="user.php?u='.$user1.'">'.$user1.'</a> requests friendship<br /><br />';
		$friend_requests .= '<button style='.'" background-color:#4cc87f; border-radius:20px; width:auto; border:none; padding:10px; color:white;"'.' onclick="friendReqHandler(\'accept\',\''.$reqID.'\',\''.$user1.'\',\'user_info_'.$reqID.'\')">accept</button> or ';
		$friend_requests .= '<button style='.'" background-color:#4cc87f; border-radius:20px; width:auto; border:none; padding:10px; color:white;"'.' onclick="friendReqHandler(\'reject\',\''.$reqID.'\',\''.$user1.'\',\'user_info_'.$reqID.'\')">reject</button>';
		$friend_requests .= '</div>';
		$friend_requests .= '</div>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link rel="icon" href="images/avatardefault.png" type="image/png">
<link rel="stylesheet" href="style/style.css">
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

<link rel="stylesheet" href="style/style.css">
<style type="text/css">
div#notesBox{float:left; width:330px; border-radius:30px; border:#4cc87f 1px dashed; margin-right:60px; padding:10px;}
div#friendReqBox{float:left; width:330px; border-radius:30px; border:#4cc87f 1px dashed; padding:10px;}
div.friendrequests{height:74px; border-bottom:#CCC 1px solid; margin-bottom:8px;}
img.user_pic{float:left; border-radius:50px; width:68px; height:68px; margin-right:8px;}
div.user_info{float:left; font-size:14px;}
</style>
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
<script type="text/javascript">
function friendReqHandler(action,reqid,user1,elem){
	var conf = confirm("Press OK to '"+action+"' this friend request.");
	if(conf != true){
		return false;
	}
	_(elem).innerHTML = "processing ...";
	var ajax = ajaxObj("POST", "php_parsers/friend_system.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			if(ajax.responseText == "accept_ok"){
				_(elem).innerHTML = "<b>Request Accepted!</b><br />Your are now friends";
			} else if(ajax.responseText == "reject_ok"){
				_(elem).innerHTML = "<b>Request Rejected</b><br />You chose to reject friendship with this user";
			} else {
				_(elem).innerHTML = ajax.responseText;
			}
		}
	}
	ajax.send("action="+action+"&reqid="+reqid+"&user1="+user1);
}
</script>
</head>
<body style="background-color:#f6fff8;">

<div  id="perspective" style="background-color:#fec633;" class="perspective effect-moveleft">
         
<div class="container" style="background-color:#fec633;">
<div style="width:100%; z-index:15; height:100px; position:fixed;">
<img id="showMenu"  style="border:none; background-color:transparent; margin-top:140px; right:0; float:right; z-index:15;" src="images/menu.png" width="100" height="200" alt=""/>
           <div style="width:100px; height:33px; padding:6px; background-image:url(images/lang.png); float:right; margin-right:200px;">
         <a href="index.php">  <img style="	margin-left:15px;"src="images/eng.png" width="20" height="20" /></a>
            <a href="index-ar.php">  <img style="	margin-left:15px;" src="images/ar.png" width="20" height="20" /></a>
           </div>
       <img src="images/lll.png" width="221" height="300"  style="float:left; width:auto;	height:auto;	 z-index:10;" alt=""/>
</div>	<div class="wrapper" style=" width:auto; height:autobackground-color:#fec633;"><!-- wrapper needed for scroll -->
					<!-- Top Navigation -->
					            
					<div class="main clearfix">
						
		  </div><!-- /main -->
<div style=" width:100%; height:100px;"></div>

<div id="pageMiddle" style=" background-color:#252424; border-radius:50px; height:auto;  width:920px; margin-left:auto; color:#000;  margin-right:auto; padding:40px; color:white; ">
  <!-- START Page Content -->
  <div id="notesBox"><h2>Notifications</h2><?php echo $notification_list; ?></div>
  <div id="friendReqBox"><h2>Friend Requests</h2><?php echo $friend_requests; ?></div>
  <div style="clear:left;"></div>
  <!-- END Page Content -->
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