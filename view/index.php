
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class=" p-l-50 p-r-50 p-t-77 p-b-30" >
				<span class="login100-form-title p-b-55" style="color: white;font-size:300%;">
				welcome ! <?=$username?>
</span>
<div class="text-center w-full p-t-115">
						<a class="txt1 bo1 hov1" style="color: white;" href="./?action=logout">
							log out						
						</a>
				</div>
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
</body>
</html>