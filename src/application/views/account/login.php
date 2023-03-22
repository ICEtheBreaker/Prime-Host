
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
		 
		 
		 
 
			<form class="form-signin" id="loginForm" action="#" method="POST">
			<h4 class="heading-desc text-left"> 
                <a href="http://GamePH.RU" class="close pull-right" aria-hidden="true">×</a>
					<b>Вход в Личный Кабинет</b>
            </h4>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail">
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
			</div>
			<br>
			<div class="col-xs-6 col-md-6 pull-right">
                        <button id="login" type="submit" class="btn btn-lg btn-primary btn-block" data-loading-text="Пожалуйста подождите...">Войти</button>
                    </div>
			<div class="text-left"><a href="/account/register" class="loginForm__signupLink">Зарегистрироваться</a></div>
			 <div class="single-form-footer">
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <div class="heading-desc text-left" style="padding-top: 7px">
                            <a href="/account/restore">Забыли пароль?</a>
                        </div>
                    </div>
                </div>
            </div>
		</form>
		<script>
			$('#loginForm').ajaxForm({ 
				url: '/account/login/ajax',
				dataType: 'text',
				success: function(data) {
					// console.log(data);
					data = $.parseJSON(data);
					console.log( data )
					switch(data.status) {
						case 'error':
							showError(data.error);
							$('button[type=submit]').prop('disabled', false);
							break;
						case 'success':
							showSuccess(data.success);
							setTimeout("redirect('/')", 1500);
							break;
					}
				},
				beforeSubmit: function(arr, $form, options) {
					$('button[type=submit]').prop('disabled', true);
				}
			});
		</script>
	</div>
    <!-- /Powered by LitePanel -->
</body>
</html>
