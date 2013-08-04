<?php
	//添加事项
	session_start();
	if(!isset($_POST['submit'])){
	    exit('数据没有被提交过来!');
	}
	$id = $_GET["id"];
	$endtime = $_POST['endtime'];
	$note = $_POST['note'];

	include('conn.php');
	$q = "UPDATE 'cdlist' SET note = '$note', endtime = '$endtime' WHERE `id` = '$id'";
	$check_query = mysql_query($q,$conn);
	if($check_query){
		echo "修改数据成功！";
	    //登录成功直接进入用户中心
	 	header("Location: countdown.php"); 
	    exit;
	} else {
		echo "修改数据失败：".mysql_error();
		//echo "<script> alert("hey!")</script>";
		//echo "<script language="javascript">alert("godd!");</script>"; 
		header("Location: countdown.php"); 
	    exit;
	}
?>