<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="view/style.css" rel="stylesheet" />
</head>
<body>
		<div class="bg-image"></div>
		<div class="bg-text">
			<div class="login_form">
				<div class="form">
					<div class="row">
						<div class="col-75">
							<div>
								<form  method="post" id="insert_form" class="form-inline login" action="">
									<div class="row" id="row">
										<div class="col-25">
											<h3>Login</h3>
											<label for="name">username </label>
											<input type="text" name="username" class="username" placeholder="" required autofocus />
											<label for="password"> password </label>
											<input type="password" name="password" placeholder="" required />							
											<div style='color: red' id="error"></div>
											<div class="col-50"><input type="submit" value="login" name="add" class="button loginbutton"></div>
											
										</div>
									</div>
								</form>
								<a href="./?action=register">Create Account</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
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
											if (response!="") {
							$('#error').html(response);
						}else{
							$(location).attr('href', './');
						}
						
					}
				});
		});
		
});
</script>
</html>