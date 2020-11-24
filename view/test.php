
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form method="post" id="insert_form" action="" class="login100-form validate-form" id="insert_form">
					<span class="login100-form-title p-b-55" >
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100" type="text" name="username" placeholder="username" required>
						<span class="focus-input100"></span>
						
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password"  placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100" type="text" name="name" placeholder="name" required>
						<span class="focus-input100"></span>
						
					</div>

					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100" type="text" name="lastname"  placeholder="lastname" required>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 error">
							
						</span>
					
					<div class="container-login100-form-btn p-t-25">
						<input type="submit" value="register" name="add" class="login100-form-btn">
						
					</div>


					<div class="text-center w-full p-t-115">
						<span class="txt1">
							have a member?
						</span>

						<a class="txt1 bo1 hov1" href="./">
							Sign in							
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
		var error = 0;
		$('.username').change();
		$('.username').on('change', function(event){
			$('#user-validate').html("");
			var username = $(".username").val();
			
			$.ajax({
				url:"./?action=user-validate",
				method:"POST",
				data: {username:username},
				success:function(response)
				{
					console.log(response);
						if (response!="") {
							$('.error').html(response);
							error = 1;
						}
				}
			});
		});
		
			$('#insert_form').on('submit', function(event){
			if (error == 0) {
			event.preventDefault();
			var form_data = $(this).serialize();
			console.log("response "+form_data);
			//-------------------------------------insert-------------------------------------			
				$.ajax({
					url:"./?action=new-user",
					method:"POST",
					data: form_data,
					success:function(response)
					{
						console.log("response "+response);
						
						if (response!="") {
							$('#error').html(response);
						}
						
					}
				});
			}
		});
				
});
</script>
</body>
</html>