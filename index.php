<?php 
	session_start();
	include $_SERVER['DOCUMENT_ROOT'].'/Message-Board/db.inc.html.php';
	include $_SERVER['DOCUMENT_ROOT'].'/Message-Board/model.html.php';
	

	if(isset($_GET['register'])){
		$registerArray=array(
			'user_name'=>$_POST['user_name'],
			'user_password'=>$_POST['user_password'],
			'user_email'=>$_POST['user_email'],
		);
		$Model=new Model();
		$Model->register($registerArray);
	}

	if(isset($_GET['login'])){
		$user_name=$_POST['user_name'];
		$user_password=$_POST['user_password'];
		$Model=new Model();
		$login=$Model->checkLogin($user_name,$user_password);
		if (isset($login)){//判断登录的用户名和密码是否正确
			//放用户信息
			if($_POST['user_name']!="administrator"){
				$_SESSION['user_name']=$_POST['user_name'];
				header('Location: main/get.php');
				exit();
			}
			else{
				header('Location: administrator/get.php');
				exit();
			}
			
		}else {
			$error = '用户名和密码出错';
			include 'error.html.php';
			exit();	
		}
	}

	if(isset($_GET['addMessage'])){
		$messageArray=array(
			'message'=>$_POST['message'],
			'author'=>$_SESSION['user_name'],
		);
		$Model=new Model();
		$Model->addMessage($messageArray);
	}

	if (isset($_GET['editMessage'])) {
    	try{
    		$sql = 'update messageinfo set message = :message where id=:id';
    		$s = $pdo->prepare($sql);
    		$s ->bindValue(':id', $_POST['id']);
    		$s ->bindValue(':message', $_POST['message']);
    		$s ->execute();
    	}
    	catch(PDOException $e){
    		$error = '编辑出错，请重新尝试，错误原因：'.$e ->getMessage();
    		include 'error.html.php';
    		exit();
    	}
    	header('Location: administrator/get.php');
		exit();
    }

	if (isset($_GET['deleteMessage'])) {
    	try{
    		$sql = 'DELETE FROM messageinfo WHERE id = :id';
    		$s = $pdo->prepare($sql);
    		$s ->bindValue(':id', $_POST['id']);
    		$s ->execute();
    	}
    	catch(PDOException $e){
    		$error = '不能删除，请重新尝试，错误原因：'.$e ->getMessage();
    		include 'error.html.php';
    		exit();
    	}
    	header('Location: administrator/get.php');
		exit();
    }







	include $_SERVER['DOCUMENT_ROOT'].'/Message-Board/login.php';
 ?>