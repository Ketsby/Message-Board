<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登陆</title>
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
	.login{
		position: absolute;
		border: 1px solid #ccc;
		height: 510px;
		width: 384px;
		left: 40%;
		top: 20%;
	}
	#user_name,#user_password{
		height: 50px;
		margin-top:60px;
	}
	#auto{
		margin-top:60px;
		margin-left: 15px;
	}
	.btn{
		width: 90%;
		height: 50px;
		margin-top:30px;
		margin-left: 20px;

	}
</style>
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
		<div class="login">
			<form action="index.php?login" class="form-horizontal" role="form" method="POST">
				<div class="col-sm-12">
					<input type="text" required name="user_name" id="user_name" class="form-control"
					placeholder="用户名">
				</div>
				<div class="col-sm-12">
					<input type="password" required name="user_password" id="user_password" class="form-control"
					placeholder="密码">
				</div>
				<label>
      				<input type="checkbox" id="auto"> 下次自动登陆
      			</label>
      			<button type="submit" class="btn btn-primary">登陆</button>
      			<button type="button" class="btn btn-success" onClick="javascript:location='register.php'">注册</button>
			</form>
		</div>
	</div>
</body>
</html>