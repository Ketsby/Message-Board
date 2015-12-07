<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
  	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script> 
	<style>
	*{
		padding:0;
		margin: 0;
	}
	body{
		background-color: #f1f4f5;
		font-family: "Microsoft Yahei",sans-serif;
		font-size: 15px;
	}
	a{
		text-decoration: none;
		color: #FFF;
	}
	.head{
		position: fixed;
		width: 100%;
		height: 80px;
		background-color: #CC3300;
		float: left;
	}
	.logo span{
		font-size: 32px;
		font-weight: bold;
		font-style: italic;
		line-height: 80px;
		margin-left: 325px;
	}
	.content{
		width: 100%;
	}
	.register{
		position: absolute;
		border: 1px solid #ccc;
		height: 480px;
		width: 584px;
		left: 35%;
		top: 20%;
	}
	.form-group,.btn{
		margin-top: 40px;
		padding-right: 40px;
	}
	.btn{
		margin-left: 150px;
		width: 300px;
	}
</style>
<script>
	$(document).ready(function () {
		function valudateForm(){
			var form = document.getElementById("registerFrom");
			if(form.user_password.value !=form.validate_password.value){
		   		alert("两次密码输入不一致,请重新输入");
				return false;
			}
		}
		$("#submit").click(function(){
			return valudateForm();
		});	
	});
</script>
</head>

<body>
	<header>
		<div class="head">
			<div class="logo">
				<span><a href="#" style="text-decoration: none;">Messageboard</a></span>
			</div>
		</div>
	</header>
	<div class="content">
		<div class="register">
			<form action="index.php?register" class="form-horizontal" id="registerFrom" role="form" method="post">
				<div class="form-group">
      				<label for="firstname" class="col-sm-2 control-label">用户名</label>
      				<div class="col-sm-10">
         				<input type="text" class="form-control" required name="user_name" id="user_name">
      				</div>
   				</div>
   				<div class="form-group">
      				<label for="firstname" class="col-sm-2 control-label">密码</label>
      				<div class="col-sm-10">
         				<input type="password" class="form-control" required name="user_password" id="user_password">
      				</div>
   				</div>
   				<div class="form-group">
      				<label for="firstname" class="col-sm-2 control-label">重复密码</label>
      				<div class="col-sm-10">
         				<input type="password" class="form-control" required name="validate_password" id="validate_password">
      				</div>
   				</div>
   				<div class="form-group">
      				<label for="firstname" class="col-sm-2 control-label">邮箱</label>
      				<div class="col-sm-10">
         				<input type="email" class="form-control" required name="user_email" id="user_email">
      				</div>
   				</div>
   				<button type="submit" class="btn btn-success" id="submit">完成注册</button>
   				<button type="button" class="btn btn-warning" onClick="javascript:location='login.php'">返回登陆</button>
			</form>
		</div>
	</div>
</body>
</html>