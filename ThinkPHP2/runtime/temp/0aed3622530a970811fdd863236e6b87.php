<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpStudy\PHPTutorial\WWW\ThinkPHP2/application/index\view\index\index.html";i:1544056102;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/thinkphp2//css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/thinkphp2//css/default.css">
	<link rel="stylesheet" type="text/css" href="/thinkphp2//css/styles.css">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>
	<div class="htmleaf-container">
		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">登录</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">注册</label>
				<div class="login-form">
					<form action="dolo.php" method="post">
						<div class="sign-in-htm">
							<div class="group">
								<label for="user" class="label">用户名</label>
								<input id="user" type="text"  name="text" class="input txt">
							</div>
							<div class="group">
								<label for="pass" class="label">密码</label>
								<input id="pass" type="password" name="password" class="input paw" data-type="password">
							</div>
							<div class="group">
								<input id="check" type="checkbox" class="check" checked>
								<label for="check"><span class="icon"></span> 点我记住</label>
							</div>
							<div class="group">
								<input type="button" class="button dolo" value="登录   >>>">
							</div>
							<div class="hr"></div>
							<div class="foot-lnk">
								<a href="#forgot">忘记了密码?</a>
							</div>
						</div>
					</form>

<!-- 					注册 -->

				<form action="login.php" method="post" >
					<div class="sign-up-htm">
						<div class="group">
							<label for="user" class="label">用户名</label>
							<input id="user" type="text"  name="name" class="input yh">
						</div>
						<div class="group">
							<label for="pass" class="label">密码</label>
							<input id="pass" type="password" name="password_txt" class="input password_txt" data-type="password">
						</div>
						<div class="group">
							<label for="pass" class="label">重复密码 </label>
							<input id="pass" type="password" name="password_txt2" class="input password_txt2" data-type="password">
						</div>
						<div class="group">
							<label for="pass" class="label">电子邮箱</label>
							<input id="pass" type="text" name="email" class="input email">
						</div>
						<div class="group">
							<input type="button" class="button logo" value="点击注册   >>>">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<label for="tab-1">已有账号?</a>
						</div>
					</div>
				</form>					
				</div>
			</div>
		</div>
	</div>	
</body>
</html>

<script type="text/javascript">
	//注册的-------------------------------------------------------------------------
	$(".logo").click(function(){ 
		var name = $(".yh").val();
		var password_txt = $(".password_txt").val();
		var password_txt2 = $(".password_txt2").val();
		var email = $(".email").val();
		

		if (name=="" || password_txt=="" || email=="") {
		        //判断是否为空
				alert("用户名/密码/邮箱/都不能为空")
		}else{
				if (password_txt!=password_txt2) {
				//判断两次密码是否一致
					alert("两次密码不一样,请重新输入")
				}	
			};

	    $.ajax({
	      type:"post",
	      url:"<?php echo url('index/ajax_logoin'); ?>",
	      data:"name="+name+"&password_txt="+password_txt+"&password_txt2="+password_txt2+"&email="+email,
	      success:function(data){
	    	if (data=='ok') {
	    		alert("注册成功");
	    	}else{
	    			if (data=='no') {
	    				alert('注册失败');
	    			}
	    		}	        
	      	}
	    });
  	});	

	//登录的---------------------------------------------------------------------

	$(".dolo").click(function(){
	var	txt = $(".txt").val();
	var paw = $(".paw").val();
		if (txt=="") {
			alert("笨蛋:你要输入用户名呢!");
		}else if (paw=="") {
			alert("傻子:你以为输入了用户名,就不用输入密码了嘛");
		}else{
			 $.ajax({
		      type:"post",
		      url:"<?php echo url('index/ajax_index'); ?>",
		      data:"txt="+txt+"&paw="+paw,
		      success:function(abc){
		    	if (abc=='logo') {
		    		location.href="<?php echo url('index/personal'); ?>";
		    	}else if(abc=='b'){
		    		alert("没有此账号");        
		      	}else if(abc=='c'){
		    		alert("密码不正确");        
		      	}
		      } 	
		    });
		}

		
  	});					   
</script>