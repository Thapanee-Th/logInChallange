
<body>
		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
								<form  method="post" id="insert_form" class="login100-form validate-form register" action="">
										<span class="login100-form-title p-b-55" >Register</span>
																				<div class="wrap-input100 validate-input m-b-16" >
											<a id="user-validate" style="color: red"></a>
											<input type="text" name="username" class="username input100" placeholder="username" required autofocus />
										</div>
																						<div class="wrap-input100 validate-input m-b-16" >
											<input type="text" name="name" class="name input100" placeholder="name" required autofocus />
											</div>
											<div class="wrap-input100 validate-input m-b-16" >
											<input type="text" name="lastname" class="lastname input100" placeholder="lastname" required autofocus />
											</div>
											<div class="wrap-input100 validate-input m-b-16" >
											<input type="password" name="password" class="input100" placeholder="password" required />
											</div>							
											<div style='color: red' id="error"></div>

											<div class="container-login100-form-btn p-t-25">
						<input type="submit" value="register" name="add" class="login100-form-btn">
						
					</div>
								<div class="text-center w-full p-t-115">
						<span class="txt1">
							Had a member?
						</span>

						<a class="txt1 bo1 hov1" href="./?action=login">
							log in							
						</a>
					</div>			
								</form>
							</div>
						</div>
					</div>
				
	</body>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
/*
if (typeof jQuery == 'undefined') {
	console.log('undefined');
    document.write(unescape("%3Cscript src='view/js/jquery-3.4.1.min.js' type='text/javascript'%3E%3C/script%3E")); //Load the Local file (if google is down for some reason) 
}
*/
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
							$('#user-validate').html("this username already used");
							error = 1;
						}
				}
			});
		});
		
			$('#insert_form').on('submit', function(event){
			if (error == 0) {
			event.preventDefault();
			var form_data = $(this).serialize();
			//-------------------------------------insert-------------------------------------	
			console.log("response "+form_data);		
				$.ajax({
					url:"./?action=new-user",
					method:"POST",
					data: form_data,
					success:function(response)
					{
						console.log("response "+response);
						
						if (response!="") {
							$('#error').html(response);
						}else{
							$(location).attr('href', './');
						}
						
					}
				});
			}
		});
				
});
</script>
</html>