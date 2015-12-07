<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/Message-Board/db.inc.html.php';
	class Model{
		function register($registerArray){
			include $_SERVER['DOCUMENT_ROOT'].'/Message-Board/db.inc.html.php';
			try{
				$sql='insert into user (user_name,user_password,user_email) values (:user_name,:user_password,:user_email)';
				//预处理语句
				$s = $pdo -> prepare($sql);
				$s -> bindValue(':user_name', $_POST['user_name']);
				$s -> bindValue(':user_password', $_POST['user_password']);
				$s -> bindValue(':user_email', $_POST['user_email']);
				$s -> execute();
			}
			catch(PDOException $e){
				$error = '注册用户出错ORZ,错误原因：'.$e->getMessage();
				include 'error.html.php';
				exit();
			}
			//浏览器重定向
			header('Location: login.php');
			exit();	      
	 	}
	 	function checkLogin($user_name,$user_password){
			include $_SERVER['DOCUMENT_ROOT'].'/Message-Board/db.inc.html.php';
			try{
				$sql='select * from user where user_name=:user_name and user_password=:user_password';
				//预处理语句
				$s = $pdo -> prepare($sql);
				$s->bindValue(':user_name',$_POST['user_name']);
				$s->bindValue(':user_password',$_POST['user_password']);
				$s -> execute();
			}
			catch(PDOException $e){
				$error = '登陆出错ORZ,错误原因：'.$e->getMessage();
				include 'error.html.php';
				exit();
			}
			while ($s->fetch()) {
				$userList=array(
				'user_id'=>$user_id,
				'user_name'=>$user_name,
				'user_password'=>$user_password,
				'user_email'=>$user_email,
				);	//将结果集放入数组中	
			}	
			return $userList; 
		}

		function addMessage($messageArray){
			include $_SERVER['DOCUMENT_ROOT'].'/Message-Board/db.inc.html.php';
			try{
				$sql='insert into messageinfo (message,author) values (:message,:author)';
				//预处理语句
				$s = $pdo -> prepare($sql);
				$s -> bindValue(':message', $_POST['message']);
				$s -> bindValue(':author', $_SESSION['user_name']);
				$s -> execute();
			}
			catch(PDOException $e){
				$error = '添加留言出错ORZ,错误原因：'.$e->getMessage();
				include 'error.html.php';
				exit();
			}
			//浏览器重定向
			header('Location:main/get.php');
			exit();

		}
	}	
?>