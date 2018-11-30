<?php 
	header("content-type:text/html;charset=utf-8");

	require "./public_function.php";

	dbInit();

	$page=1;

	$page_size=2;

	$sql="select count(*) from emp_info";

	$count=fetchRow($sql);

	$count=$count[0];
	
	$max_page=ceil($count/$page_size);

	$page=isset($_GET['page'])?$_GET['page']:1;

	$page=$page>$max_page?$max_page:$page;

	$page=$page<1?1:$page;

	$lim=($page-1)*$page_size;

	$sql="select * from emp_info limit $lim,$page_size";

	$emp_info=fetchAll($sql);

 	$jsonArray=array('total'=>intval($count),'data'=>$emp_info);

	echo json_encode($jsonArray);
 ?>