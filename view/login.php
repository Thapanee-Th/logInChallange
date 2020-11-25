
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" id="insert_form">
					<span class="login100-form-title p-b-55" >
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="username" required>
						<span class="focus-input100"></span>
						
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password"  placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>
					<a id="error" style="color: red"></a>
					
					<div class="container-login100-form-btn p-t-25">
						
						<input type="submit" value="login" name="add" class="login100-form-btn">
					</div>				
					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>
						<a class="txt1 bo1 hov1" href="./?action=register">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
if (typeof jQuery == 'undefined') {
	console.log('undefined');
    document.write(unescape("%3Cscript src='view/js/jquery-3.4.1.min.js' type='text/javascript'%3E%3C/script%3E")); //Load the Local file (if google is down for some reason) 
}
</script>	
	

	

<script type="text/javascript">
	$(document).ready(function(){
		$('#insert_form').on('submit', function(event){
			event.preventDefault();
			var form_data = $(this).serialize();
			//-------------------------------------insert-------------------------------------			
				$.ajax({
					url:"./?action=login-validate",
					method:"POST",
					data: form_data,
					success:function(response)
					{
						console.log('response');
						if (response!="") {
							$('#error').html('Username or password is incorrect.');
						}else{
							$(location).attr('href', './');
						}
						
					}
				});
		});
		
});
</script>
</body>
</html>