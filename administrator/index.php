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
	}
	.nav{
		font-size: 16px;
		background-color: #f1f4f5;
	}
	ul{
		list-style: none;
	}
	.btn2{
		background-color: #fff;
		border-radius: 5px;
		border: 1px solid #ccc;
		width: 40px;
		height: 25px;
	}
	.lili{
		border-bottom: 1px solid #ccc;
	}
	#message{
		font-size: 18px;
		resize:none;
	}
</style>
<script>
function deletemessage(){
	var result = confirm("确认删除吗？");
	if(result){
		return true;
	}
	else{
		return false;
	}
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
		</div>
	</header>
	<!-- <form action="../index.php?deleteMessage" method="post"> -->
	<div class="content">
		<div class="login">

   			<ul class="nav nav-tabs">
   				<li><a href="#" style="background-color: #CBE888;" id="allmessage">所有留言</a></li>
			</ul>
			<div class="all">
				<ul>
					<?php foreach ($messages as $info): ?>
					<form action="../index.php?deleteMessage" method="post">
					<li class="lili">
						<input type="hidden"  name="id" value="<?php echo $info['id']; ?>">
						<?php echo $info['author'].":".$info['message']; ?><br>
						<button type="button" data-toggle="modal" data-target="<?php echo "#modal".$info['id']; ?>" class="btn2">编辑</button>
						<input  onclick="return deletemessage();" type="submit" value="删除" class="btn2">		
					</li>
					</form>
					<form action="../index.php?editMessage" method="post">
						<div class="modal fade" id="<?php echo "modal".$info['id']; ?>" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">
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
         							<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
         							<textarea name="message" id="message" cols="60" rows="5" required maxlength="15"><?php echo $info['message']; ?></textarea>
         							</div>
         							<div class="modal-footer">
            							<button type="button" class="btn btn-default" 
               							data-dismiss="modal">关闭
            							</button>
            							<button type="submit" class="btn btn-primary">
               							提交更改
           					 			</button>
         							</div>
      							</div>
							</div>
						</div>
					</form>
				<?php endforeach; ?>
				</ul> 
			</div>
		</div>
	</div>
</body>
</html>