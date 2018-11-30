<?php 
	header("content-type:text/html;charset=utf-8");
	header('Access-Control-Allow-Headers:x-requested-with,content-type'); 

	require "./public_function.php";

	dbInit();

	$rws_post = $GLOBALS['HTTP_RAW_POST_DATA'];
	
	$empAdd = json_decode($rws_post);
	
	$sql="insert into emp_info (e_name,e_dept,date_of_birth,date_of_entry) values ('$empAdd->e_name','$empAdd->e_dept','$empAdd->date_of_birth','$empAdd->date_of_entry')";

	var_dump($sql);

	if($res=query($sql)){
		echo 1;
	}else{
		echo 0;
	}

 ?>