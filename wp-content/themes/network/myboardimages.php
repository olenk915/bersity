<?php
$usrid = $_POST['usrid'];
$ImgPath = $_POST['imgpth'];
$album = $_POST['album'];
$conn= mysql_connect('localhost','bandver5_truepro','#K%MubqZ@$hc');
mysql_select_db('bandver5_mar23bandvers',$conn);
$squery = "select `id` from `wp_myboard_images` where `albumNumber`='".$album."' and `userid`='".$usrid."'";
$a = mysql_query($squery,$conn);
$i=0;
while($b = mysql_fetch_array($a)){
	$i = $b['id'];
}
if($i>0){
	$query = "update `wp_myboard_images` set `imagepath`='".$ImgPath."' where `id` = '".$i."'";
	mysql_query($query,$conn);
}else{
	$query = "INSERT INTO `wp_myboard_images` (`userid`, `albumNumber`, `imagepath`) VALUES ('".$usrid."', '".$album."', '".$ImgPath."')";
	mysql_query($query,$conn);
}
?>