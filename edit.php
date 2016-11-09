<?php
	require('config.php'); // Подключение файла настроек
  include_once( './bd/bd_func.php' );
	// Авторизация
	session_start();
	if (!(isset($_SESSION['autorized']) &&
		$_SESSION['autorized'] != '')) {
		header("Location: login.php");
	}
	$db = openBaza( $baza['baza'] );
	// Обработка получения данных
	if(isset($_GET['user']))
	  {
	  	$userid = $_GET['user']; // Получаем id контакта для удаления
	  	// Получение информации из базы данных в переменные

      $resultat = readUserAtContacts( $db, $userid );
      $array = $resultat->fetch(PDO::FETCH_ASSOC);
	  }
	//header('Location: index.php');
	// Обработка изменеия контакта
	if (!empty($_POST))
	  {
	  	// Получение переменных от новых значений
	  	$addcontactname = $_POST['name'];
	  	$addcontacttel = $_POST['tel'];
	  	$addcontactemail = $_POST['email'];
	  	$addcontactorg = $_POST['org'];
	  	$addcontacturl = $_POST['url'];
	  	$addcontactlocal = $_POST['local'];
	  	$addcontactnote = $_POST['note'];
	  	// Запись переменных в базу данных
	  	$editresult = updateUserAtContacts( $db, $addcontactname, $addcontacttel, $addcontactemail, $addcontactorg, $addcontacturl,  $addcontactlocal, $addcontactnote, $userid );
	  	if ($editresult) echo "<script type='text/javascript'>window.close();</script>";
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
	<title>Изменить контакт</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
<div>
	<main class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>Изменение контакта</h3></div>
					<form role="form" action="" method="post">
						<div class="panel-body">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Фамилия Имя Отчество</label>
						    <input type="text" class="form-control" name="name" value="<?php echo $array['name']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Телефон(ы)</label>
						    <input type="text" class="form-control" name="tel" value="<?php echo $array['tel']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">E-mail</label>
						    <input type="text" class="form-control" name="email" value="<?php echo $array['email']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Организация</label>
						    <input type="text" class="form-control" name="org" value="<?php echo $array['org']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Адрес в интернете</label>
						    <input type="text" class="form-control" name="url" value="<?php echo $array['url']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Местонахождение</label>
						    <input type="text" class="form-control" name="local" value="<?php echo $array['local']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Заметка</label>
						    <input type="text" class="form-control" name="note" value="<?php echo $array['note']; ?>">
						  </div>
						</div>
						<div class="panel-footer"><button type="submit"  class="btn btn-success">Сохранить</button></div>
					</form>
				</div>
	        </div>
	    </div>
	</main>
</div>

</body>
</html>