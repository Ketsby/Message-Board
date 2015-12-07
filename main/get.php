<?php 
	session_start();
	include $_SERVER['DOCUMENT_ROOT'].'/Message-Board/db.inc.html.php';
	try{
		$sql='SELECT message,author FROM messageinfo';
		$result = $pdo -> query($sql);
	}
	catch(PDOException $e){
		$error = '显示留言出错啦,错误原因：'.$e->getMessage();
			include '../error.html.php';
			exit();
	}
	//如果字段过长，可把结果存储到一个数组，利用fetch函数遍历每一行字段
	  while($row = $result ->fetch()){
	  	$messages[] = array('message' => $row['message'],'author' => $row['author']);
	  }
    include 'index.php';