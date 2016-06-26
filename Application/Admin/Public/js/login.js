// JavaScript Document
//支持Enter键登录
		document.onkeydown = function(e){
			if($(".bac").length==0)
			{
				if(!e) e = window.event;
				if((e.keyCode || e.which) == 13){
					var obtnLogin=document.getElementById("submit_btn")
					obtnLogin.focus();
				}
			}
		}

    	$(function(){
			//提交表单
			$('#submit_btn').click(function(){
				show_loading();
				var myReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/; //邮件正则
				if($('#email').val() == ''){
					show_err_msg('邮箱还没填呢！');	
					$('#email').focus();
				}else if(!myReg.test($('#email').val())){
					show_err_msg('您的邮箱格式错咯！');
					$('#email').focus();
				}else if($('#password').val() == ''){
					show_err_msg('密码还没填呢！');
					$('#password').focus();
				}else if($('#captcha').val() == ''){
					show_err_msg('验证码还没填呢！');
					$('#captcha').focus();
				}else{
					var email=$('#email').val();
					var password=$('#password').val();
					var captcha=$('#captcha').val();
					//console.log(email);
//					console.log(password);
//					console.log(captcha);
					var url="/Admin/Login/ajaxlogin";
					$.post(url,{email:email,password:password,captcha:captcha},function(msg){
					if(msg){
						
							if(msg==3){
								$('#yzm').attr('src','/Admin/Login/verifyImg/'+Math.random());
								show_err_msg('验证码错误！');
								$('#captcha').focus();
							}
							else if(msg==2){
								$('#yzm').attr('src','/Admin/Login/verifyImg/'+Math.random());
								show_err_msg('邮箱或密码错误！');
								$('#email').focus();
								}
							else if(msg==1){
								show_msg('登录成功！正在为您跳转...','/Admin/');	
							}
							
					    }
					});
		
				}
			});
		});