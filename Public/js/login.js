var nicknamelock = false;
var passwordlock = false;
//var codelock = false;
//验证码重载函数
	function reFleshCode(){

		var timeStamp = new Date().getTime();
		var src = $('#codeImg').attr('src');
		
		//路径不能写成固定的，因为当访问不同的层次是，相对路径位置会改变
		$('#codeImg').attr('src',src+'/'+timeStamp);
	}
	
	//账号验证
	function namelock(){
		
		if ($('#mlsUser').val() == "" || $('#mlsUser').val() == null) {
		 	$('<span class="msg_err"></span>').insertAfter('#mlsUser');
		 	$('<span id="msgmlsUser" class="msg_error"><span></span>&nbsp;&nbsp;&nbsp;&nbsp;请输入您的用户名</span>').insertAfter('#mlsUser');
			nicknamelock = false;
		 }else{
		 	nicknamelock = true;
		 }
		
		}
	
	//密码验证
	function wordlock(){
		
		 if ($('#password').val() == "" || $('#password').val() == null) {
		 	
		 	$('<span class="msg_err"></span>').insertAfter('#password');
		 	$('<span id="msgmlsUser" class="msg_error"><span></span>&nbsp;&nbsp;&nbsp;&nbsp;请输入您的密码</span>').insertAfter('#password');
			passwordlock = false; 
		 }else if (!/^[\w]{6,23}$/.test($('#password').val())) {
		 	
		 	$('<span class="msg_err"></span>').insertAfter('#password');
		 	$('<span id="msgmlsUser" class="msg_error"><span></span>&nbsp;&nbsp;&nbsp;&nbsp;密码格式不正确</span>').insertAfter('#password');
			passwordlock = false; 
		 }else{

		 	passwordlock = true; 
		 }
		
		}	
	
	//验证码验证
//	function yzmlock(){
//		
//		 if ($('#checkcode').val() == "" || $('#checkcode').val() == null) {
//		 	$('<span class="msg_err"></span>').insertAfter('#checkcode');
//		 	$('<span id="msgmlsUser" class="msg_error"><span></span>&nbsp;&nbsp;&nbsp;&nbsp;请输入左侧验证码</span>').insertAfter('#checkcode');
//			codelock = false;
//		 }else{
//		 	var code = $('#checkcode').val();
//		 	$.post(url3,{code:code},function(msg){
//				if(msg){
//					codelock = true;	
//				}else{
//					$('<span class="msg_err"></span>').insertAfter('#checkcode');
// 					$('<span id="msgmlsUser" class="msg_error"><span>&nbsp;&nbsp;&nbsp;&nbsp;验证码错误！</span></span>').insertAfter('#checkcode');
//					codelock = false;
// 					reFleshCode();
//				}	
//			});
//		 }
//		
//		}	

$(function(){
	//表单效果

	$('#mlsUser').focus(function(){		
		 			 
		 $('#mlsUser').nextAll().not('.user_icon').remove();
	});

	$('#mlsUser').blur(function(){
		namelock();
		//console.log(nicknamelock);
	});	

	$('#password').focus(function(){		
		 			 
		 $('#password').nextAll().not('.pwd_icon').remove();
	});

	$('#password').blur(function(){
		wordlock();
		//console.log(passwordlock);
	});	

	$('#checkcode').focus(function(){
		 			 
		 $('#checkcode').nextAll().not('.code_icon').not('.checkImage').remove();
	});

	//$('#checkcode').blur(function(){
//		yzmlock();
//		//console.log(reFleshCode);
//	});

	//Ajax发送表单
	$('.login_btn').click(function(){
		namelock();
		wordlock();
		if (nicknamelock == true && passwordlock == true) {

			$('#registerForm').submit();
		}else{
			alert('请正确输入相关信息！');
			return false;
		}
		reFleshCode();
		//return false;
	});   
});