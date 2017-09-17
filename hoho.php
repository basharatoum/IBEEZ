<?php
if($user_ok == true){
$status_ui = "";
$statuslist = "";
$u ="blog";
	$status_ui = '<textarea style="width:700px; margin-left:auto; margin-right:auto; border-radius:20px;" id="statustext" onkeyup="statusMax(this,250)" placeholder="Whats new with you '.$u.'?"></textarea>';
	$status_ui .= '<button style="border:none; color:#FFF; background-color:#4cc87f; margin-left:10px; border-radius:20px; padding:40px; padding-top:20px; padding-bottom:20px;" id="statusBtn" onclick="postToStatus(\'status_post\',\'a\',\''.$u.'\',\'statustext\')">Post</button>';
?><?php 
$sql = "SELECT * FROM status WHERE account_name='$u' AND type='a' OR account_name='$u' AND type='c' ORDER BY postdate DESC LIMIT 20";
$query = mysqli_query($db_conx, $sql);
$statusnumrows = mysqli_num_rows($query);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	$statusid = $row["id"];
	$account_name = $row["account_name"];
	$author = $row["author"];
	$postdate = $row["postdate"];
	$data = $row["data"];
	$data = nl2br($data);
	$data = str_replace("&amp;","&",$data);
	$data = stripslashes($data);
	$statusDeleteButton = '';
	if($author == $log_username || $account_name == $log_username ){
		$statusDeleteButton = '<span  style="text-decoration:none; color:#4cc87f; float:right;" id="sdb_'.$statusid.'"><a style=" color:#4cc87f; text-decoration:none;" href="#" onclick="return false;" onmousedown="deleteStatus(\''.$statusid.'\',\'status_'.$statusid.'\');" title="DELETE THIS STATUS AND ITS REPLIES">delete status</a></span> &nbsp; &nbsp;';
	}
	// GATHER UP ANY STATUS REPLIES
	$status_replies = "";
	$query_replies = mysqli_query($db_conx, "SELECT * FROM status WHERE osid='$statusid' AND type='b' ORDER BY postdate ASC");
	$replynumrows = mysqli_num_rows($query_replies);
    if($replynumrows > 0){
        while ($row2 = mysqli_fetch_array($query_replies, MYSQLI_ASSOC)) {
			$statusreplyid = $row2["id"];
			$replyauthor = $row2["author"];
			$replydata = $row2["data"];
			$replydata = nl2br($replydata);
			$replypostdate = $row2["postdate"];
			$replydata = str_replace("&amp;","&",$replydata);
			$replydata = stripslashes($replydata);
			$replyDeleteButton = '';
			if($replyauthor == $log_username || $account_name == $log_username ){
				$replyDeleteButton = '<span  style="text-decoration:none; color:#4cc87f; float:right;" id="srdb_'.$statusreplyid.'"><a style="text-decoration:none; color:#4cc87f;" href="#" onclick="return false;" onmousedown="deleteReply(\''.$statusreplyid.'\',\'reply_'.$statusreplyid.'\');" title="DELETE THIS COMMENT" style="text-decoration:none; color:#4cc87f; float:right;">remove</a></span>';
			}
			$status_replies .= '<div id="reply_'.$statusreplyid.'" style="width:500px; margin-top:0px;margin-left:auto; margin-right:auto; border-radius:20px; margin-top:10px;	background-color:#006ab8; color:#FFF; padding:20px;"><div><b>Reply by <a style=" color:#4cc87f;text-decoration:none;" href="user.php?u='.$replyauthor.'">'.$replyauthor.'</a> '.$replypostdate.':</b> '.$replyDeleteButton.'<br />'.$replydata.'</div></div>';
        }
    }
	$statuslist .= '<div id="status_'.$statusid.'"  style="width:700px; margin-top:10px; margin-left:auto; margin-right:auto; border-radius:20px; padding:20px;	background-color:#fec633; color:#000;"><div><b>Posted by <a style=" color:#4cc87f;text-decoration:none;" href="user.php?u='.$author.'">'.$author.'</a> '.$postdate.':</b> '.$statusDeleteButton.' <br />'.$data.'</div>'.$status_replies.'</div>';
	
	    $statuslist .= '<div style="width:650px;	height:auto;margin-left:auto; margin-right:auto;"><textarea style="width:500px;  border-radius:10px;" id="replytext_'.$statusid.'"  onkeyup="statusMax(this,250)" placeholder="write a comment here"></textarea><button style="border:none; color:#FFF; background-color:#4cc87f; margin-left:10px; border-radius:20px; padding:40px; padding-top:20px; padding-bottom:20px;" id="replyBtn_'.$statusid.'" onclick="replyToStatus('.$statusid.',\''.$u.'\',\'replytext_'.$statusid.'\',this)">Reply</button></div>';	
	
}
}else{
	echo "<h1 style=".'"text-align:center; color:#FFFFFF; margin-top:10px; font-size:24px; font-family:Gotham, '."'Helvetica Neue'".', Helvetica, Arial, sans-serif;"'.">You need to be logged in</h1>";
	}
?>
<script>
function postToStatus(action,type,user,ta){
	var data = _(ta).value;
	if(data == ""){
		alert("Type something first weenis");
		return false;
	}
	_("statusBtn").disabled = true;
	var ajax = ajaxObj("POST", "php_parsers/status_system.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			var datArray = ajax.responseText.split("|");
			if(datArray[0] == "post_ok"){
				var sid = datArray[1];
				data = data.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\n/g,"<br />").replace(/\r/g,"<br />");
				var currentHTML = _("statusarea").innerHTML;
				_("statusarea").innerHTML = '<div id="status_'+sid+'" style="width:700px; margin-left:auto; margin-right:auto; border-radius:20px; padding:20px; margin-top:10px;	background-color:#fec633; color:#000;" ><div><b>Posted by you just now:</b> <span   style="text-decoration:none; color:#a9a6a5; float:right;" id="sdb_'+sid+'"><a style=" color:#d3c584;text-decoration:none;" href="#" onclick="return false;" onmousedown="deleteStatus(\''+sid+'\',\'status_'+sid+'\');" title="DELETE THIS STATUS AND ITS REPLIES">delete status</a></span><br />'+data+'</div></div><div style="width:650px;	height:auto;margin-left:auto; margin-right:auto;"><textarea id="replytext_'+sid+'" style="width:500px;  border-radius:10px;" onkeyup="statusMax(this,250)" placeholder="write a comment here"></textarea><button style="border:none; color:#FFF; background-color:#4cc87f; margin-left:10px; border-radius:20px; padding:40px; padding-top:20px; padding-bottom:20px;" id="replyBtn_'+sid+'" onclick="replyToStatus('+sid+',\'<?php echo $u; ?>\',\'replytext_'+sid+'\',this)">Reply</button></div>'+currentHTML;
				_("statusBtn").disabled = false;
				_(ta).value = "";
			} else {
				alert(ajax.responseText);
			}
		}
	}
	ajax.send("action="+action+"&type="+type+"&user="+user+"&data="+data);
}
function replyToStatus(sid,user,ta,btn){
	var data = _(ta).value;
	if(data == ""){
		alert("Type something first weenis");
		return false;
	}
	_("replyBtn_"+sid).disabled = true;
	var ajax = ajaxObj("POST", "php_parsers/status_system.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			var datArray = ajax.responseText.split("|");
			if(datArray[0] == "reply_ok"){
				var rid = datArray[1];
				data = data.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\n/g,"<br />").replace(/\r/g,"<br />");
				_("status_"+sid).innerHTML += '<div id="reply_'+rid+'" ><div style="width:500px; margin-top:0px;margin-left:auto; margin-right:auto; border-radius:20px; margin-top:10px;	background-color:#006ab8; color:#FFF; padding:20px;"><b>Reply by you just now:</b><span   style="text-decoration:none; color:#a9a6a5; float:right;" id="srdb_'+rid+'"><a style=" color:#d3c584;text-decoration:none;" href="#"  onclick="return false;" onmousedown="deleteReply(\''+rid+'\',\'reply_'+rid+'\');" title="DELETE THIS COMMENT">remove</a></span><br />'+data+'</div></div>';
				_("replyBtn_"+sid).disabled = false;
				_(ta).value = "";
			} else {
				alert(ajax.responseText);
			}
		}
	}
	ajax.send("action=status_reply&sid="+sid+"&user="+user+"&data="+data);
}
function deleteStatus(statusid,statusbox){
	var conf = confirm("Press OK to confirm deletion of this status and its replies");
	if(conf != true){
		return false;
	}
	var ajax = ajaxObj("POST", "php_parsers/status_system.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			if(ajax.responseText == "delete_ok"){
				_(statusbox).style.display = 'none';
				_("replytext_"+statusid).style.display = 'none';
				_("replyBtn_"+statusid).style.display = 'none';
			} else {
				alert(ajax.responseText);
			}
		}
	}
	ajax.send("action=delete_status&statusid="+statusid);
}
function deleteReply(replyid,replybox){
	var conf = confirm("Press OK to confirm deletion of this reply");
	if(conf != true){
		return false;
	}
	var ajax = ajaxObj("POST", "php_parsers/status_system.php");
	ajax.onreadystatechange = function() {
		if(ajaxReturn(ajax) == true) {
			if(ajax.responseText == "delete_ok"){
				_(replybox).style.display = 'none';
			} else {
				alert(ajax.responseText);
			}
		}
	}
	ajax.send("action=delete_reply&replyid="+replyid);
}
function statusMax(field, maxlimit) {
	if (field.value.length > maxlimit){
		alert(maxlimit+" maximum character limit reached");
		field.value = field.value.substring(0, maxlimit);
	}
}
</script>
<div id="statusui">
  <?php echo $status_ui; ?>
</div>
<div id="statusarea">
  <?php echo $statuslist; ?>
</div>