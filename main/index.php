<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的留言板</title>
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
		width: 784px;
		left: 30%;
		top: 10%;
		overflow-y:scroll;
	}
	.nav{
		font-size: 16px;
		background-color: #f1f4f5;
	}
	ul{
		list-style: none;
	}
	.messagebtn{
		position: absolute;
		bottom: 20%;
		left: 30%;
	}
	.btn1{
		width: 150px;
		height: 60px;
		background-color: #CC3300;
		font-size: 18px;
		color: #FFF;
		border-radius: 10px;	
	}
	.all,.my{
		font-size: 18px;
	}
	#message{
		font-size: 18px;
		resize:none;
	}
	.lili{
		margin-bottom: 10px;
	}
	.leave{
		text-decoration: none;
		float: right;
		display: inline-block;
		color: #FFF;
	}
</style>
<script>
	$(document).ready(function () {
		var all = $("#allmessage");
		var mymessage  = $("#mymessage");
		$(".my").hide();
		
	});
	window.onload = function foo(){
		alert("<?php echo "Welcome,".$_SESSION['user_name']; ?>");
	}
	function myclick(){
			$(".all").hide();
			$(".my").show();
	}
	function allclick(){
			$(".my").hide();
			$(".all").show();
	}
</script>
</head>

<body>
	<!-- 头部 -->
	<header>
		<div class="head">
			<div class="logo">
				<span><a href="../login.php" style="text-decoration: none;">Messageboard</a></span>
			</div>
			<a href="#" class="leave">注销</a>
		</div>
	</header>
	<div class="content">
		<div class="login">
   			<ul class="nav nav-tabs">
   				<li><a href="javascript:allclick();" style="background-color: #CBE888;" id="allmessage">所有留言</a></li>
   				<li><a href="javascript:myclick();" style="background-color:  #ccc;" id="mymessage">我的留言</a></li>
			</ul>
			<div class="all">
				<ul>
					<?php foreach ($messages as $info): ?>
					<li class="lili"><?php echo $info['author'].":".$info['message']; ?></li>
					<?php endforeach; ?>	
				</ul>
			</div>
			<div class="my">
				<ul>
					<li>功能还在改进中，敬请期待！！</li>	
				</ul>
			</div>
		</div>
		<div class="messagebtn">
			<button type="button" data-toggle="modal" data-target="#myModal" class="btn1">添加留言</button>
		</div>
	</div>
	<form action="../index.php?addMessage" role="form" method="POST">
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   		aria-labelledby="myModalLabel" aria-hidden="true">
   	<div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               留言内容<span><small>(字数不能超过十五字哦!)</small></span>
            </h4>
         </div>
         <div class="modal-body">
         	<textarea name="message" required maxlength="15" id="message" cols="60" rows="5"></textarea>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
            <button type="sumbit" class="btn btn-primary">
               提交
            </button>
         </div>
      </div>
	</div>
	</div>
	</form>
</body>
</html>