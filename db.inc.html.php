<?php 
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=message','root','5685');
		$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo ->exec('SET NAMES "utf8"');
	}
	//捕捉异常，使用异常函数getMessage
	catch(PDOException $e){
		$error = '连接数据库出错，出错原因为：'.$e->getMessage();
		include 'error.html.php';
		exit();
	} 