
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Game Hosting">
	<meta name="keywords" content="game hosting, game servers">
	<meta name="generator" content="LitePanel">
	
	<title>GamePH.RU | Game Hosting</title>
    
    <link href="/application/public/css/main.css" rel="stylesheet">
	<link href="/application/public/css/bootstrap.min.css" rel="stylesheet">
	<!--link href="/application/public/css/bootstrap-theme.min.css" rel="stylesheet"-->
	
	<script src="/application/public/js/jquery.min.js"></script>
	<script src="/application/public/js/jquery.form.min.js"></script>
	<script src="/application/public/js/bootstrap.min.js"></script>
	<script src="/application/public/js/main.js"></script>
	
	<style>
		body {
			padding-top: 72px;
			padding-bottom: 40px;
			background-color: #FFF;
		}
	</style>
</head>
<body>
	<!-- Powered by LitePanel -->
	<div id="content" class="container">
		 
		 
		 
		<form class="form-signin" id="restoreForm" action="#" method="POST">
			<h2 class="form-signin-heading">Восставновление</h2>
			<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail">
			<div class="form-control captcha">
				<img src="/main/captcha">
			</div>
			<input type="text" class="form-control" id="captcha" name="captcha" placeholder="Проверочный код">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Восстановить</button>
			<div class="other-link"><a href="/account/login">Вернуться к Авторизации</a></div>
		</form>
		<script>
			$('#restoreForm').ajaxForm({ 
				url: '/account/restore/ajax',
				dataType: 'text',
				success: function(data) {
					console.log(data);
					data = $.parseJSON(data);
					switch(data.status) {
						case 'error':
							showError(data.error);
							reloadImage('#captchaimage');
							$('button[type=submit]').prop('disabled', false);
							break;
						case 'success':
							showSuccess(data.success);
							break;
					}
				},
				beforeSubmit: function(arr, $form, options) {
					$('button[type=submit]').prop('disabled', true);
				}
			});
			$('.captcha img').click(function() {
				reloadImage(this);
			});
		</script>
	</div>
    <!-- /Powered by LitePanel -->
</body>
</html>