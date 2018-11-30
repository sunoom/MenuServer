<?php 

	function dbInit(){
		$link=mysql_connect('localhost','root','root');
		if (!$link) {
			die("数据库连接失败！");
		}
		mysql_select_db('mydb');
	}

	function query($sql){
		if ($result=mysql_query($sql)) {
			return $result;
		}else{
			echo 'SQL语句执行失败！',mysql_errno(),mysql_error();
			die();
		}
	}
	
	function fetchAll($sql){
		if($result=query($sql)){
			$assocs=array();
			while ($assoc=mysql_fetch_assoc($result)) {
				$assocs[]=$assoc;
			}
			mysql_free_result($result);
			return $assocs;
		}else{
			return flase;
		}
	}

	function fetchRow($sql){
		if($result=query($sql)){
			$row=mysql_fetch_row($result);
			mysql_free_result($result);
			return $row;
		}else{
			return flase;
		}
	}
?>