<link rel="shortcut icon" href="../favicon.ico">
<?php
// It is important for any file that includes this file, to have
// check_login_status.php included at its very top.
include("db_conx.php");
$envelope = '';
$loginLink = '<a href="login.php">  Log In</a>  <a href="signup.php"> Sign Up </a>';
if($user_ok == true) {
	
	$sql = "SELECT notescheck FROM users WHERE username='$log_username' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$row = mysqli_fetch_row($query);
	$notescheck = $row[0];
	$sql = "SELECT id FROM notifications WHERE username='$log_username' AND date_time > '$notescheck' LIMIT 1";
	$query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
		$envelope = '<a href="notifications.php" title="Your notifications and friend requests">No notifications</a>';
    } else {
		$envelope = '<a href="notifications.php"  title="You have new notifications">New notifications</a>';
	}
    $loginLink = '<a href="user.php?u='.$log_username.'"  >'.$log_username.'</a> <a href="logout.php"> Log Out</a>';
} 
include("db_conx.php");
if(!isset($_POST['search'])){
	header("Location:index.php");
	}
$search_sql="SELECT * FROM users  WHERE username LIKE '%".$_POST['search']."%'" ;
$search_query=mysqli_query($db_conx, $search_sql);
if(mysqli_num_rows($search_query)!=0){
$search_rs=mysqli_fetch_assoc($search_query);
}

?>
<style>
#nav{
	background-color:#2c796f;
	width:100%;
	height:70px;
	margin:0px;
	text-decoration:none;
	color:#FFFFFF;
		box-shadow: 0px 0px 14px 3px hsla(0,0%,0%,1.00);
	-webkit-box-shadow: 0px 0px 14px 3px hsla(0,0%,0%,1.00);
	position: fixed;
	}
	#contnav{
		width:960px;
		margin-left:auto;
		margin-right:auto;
		height:70px;
		text-decoration:none;
		font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-size:16px;
		color:#FFFFFF;
		}
		
		.notif{
				width:auto;
				height:auto;
				padding:20px;
				float:right;				
   	    }

</style>
	
  <?php echo $envelope; echo $loginLink; ?> <?php  ?>
<!-- <div  style="width:350px; margin-top:20px; float:left;  margin-left:40px; height:auto;">
    <form id="kk" method="GET" action="srch.php">
    <input name="search" style="width:100%; border:none;	color:#2d2c3c; font-size:16px;	height:30px;" type="text" />
    </form>
   <div id="sd" style="width:100%; height:auto;">--> 
    <?php
if($_POST['search']!=""){
if(mysqli_num_rows($search_query)!=0){
	$ss=0;
do{
	$ss=$ss+1;
	if($ss%2==0){
echo "<a  href="."user.php?u=".$search_rs['username'].'"'."><div class=".'"srche"'.">";
			if($search_rs['avatar']!=""){
				echo "<img width=".'"18"'. "height=".'"18"'." src=".'"user/'.$search_rs['username'].'/'.$search_rs['avatar'].'"'."/>";
				}else{
				echo "<img width=".'"18"'. "height=".'"18"'." src=".'"images/avatardefault.jpg"'."/>";
					}
					echo $search_rs['username']."</div></a>";
						}else{
			echo "<a  href="."user.php?u=".$search_rs['username'].'"'."><div class=".'"srcho"'.">";
			if($search_rs['avatar']!=""){
				echo "<img width=".'"18"'. "height=".'"18"'." src=".'"user/'.$search_rs['username'].'/'.$search_rs['avatar'].'"'."/>";
				}else{
				echo "<img width=".'"18"'. "height=".'"18"'." src=".'"images/avatardefault.jpg"'."/>";
					}
					echo $search_rs['username']."</div></a>";
		}
	}while($search_rs=mysqli_fetch_assoc($search_query));
}else{
	echo "<div class=".'"srcho"'.">nothing was found</div>";
	}
	}	
?>
<script src="js/classie.js"></script>
		<script src="js/cbpAnimatedHeader.min.js"></script>