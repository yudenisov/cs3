<?php
	require('config.php'); // Подключение файла настроек
	// Авторизация
	if (isset($_POST['login']) && $_POST['login'] == $login &&
		isset($_POST['pass']) && md5($_POST['pass']) == md5($pass)) {
		session_start();
		$_SESSION['autorized'] = "ok";
		header("Location: index.php");
		exit();
	}
?>
<!-- =====================================================

$$$$$   $$$$$$  $$  $$   $$$$   $$  $$  $$$$$$
$$  $$    $$    $$$ $$  $$      $$  $$    $$
$$$$$     $$    $$ $$$  $$ $$$  $$  $$    $$
$$        $$    $$  $$  $$  $$   $$$$     $$
$$      $$$$$$  $$  $$   $$$$     $$    $$$$$$

Разработчик и дизайнер Сысолятин Артём
http://sysolyatin.com http://pingvi.org
https://github.com/temapingvi
E-mail: me@pingvi.org

Перед использованием, читайте файл лицензии.
===================================================== -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>Вход в систему</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<style type="text/css">
		.login-page-form {
			margin: 0 auto;
			width: 300px;
			padding-top: 200px;
		}
		body {
			background: url(img/loginbg.jpg) center no-repeat;
			-moz-background-size: 100%; /* Firefox 3.6+ */
		    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
		    -o-background-size: 100%; /* Opera 9.6+ */
		    background-size: 100%; /* Современные браузеры */
		}
	</style>
</head>

<body>
<div class="wrapper">
	<main class="content">
		<div class="login-page-form">
			<div class="panel panel-default">
			  <div class="panel-body">
			    <form action="" method="post">
			    	<input type="text" class="form-control" name="login" placeholder="Логин"><br>
			    	<input type="password" class="form-control" name="pass" placeholder="Пароль"><br>
			    	<button type="submit" class="btn btn-default btn-lg btn-block">Войти</button>
			    </form>
			  </div>
			</div>

		</div>
	</main>
</div>
</body>
</html>