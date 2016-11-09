<?php
	require('config.php'); // Подключение файла настроек
	include_once( './bd/bd_func.php' );
	$db = openBaza( $baza['baza'] );
	// Авторизация
	session_start();
	if (!(isset($_SESSION['autorized']) &&
		$_SESSION['autorized'] != '')) {
		header("Location: login.php");
	}
	// Обработка добавления контакта
	if (!empty($_POST))
	  {
	  	// Получение переменных
	  	$addcontactname = $_POST['name'];
	  	$addcontacttel = $_POST['tel'];
	  	$addcontactemail = $_POST['email'];
	  	$addcontactorg = $_POST['org'];
	  	$addcontacturl = $_POST['url'];
	  	$addcontactlocal = $_POST['local'];
	  	$addcontactnote = $_POST['note'];
	  	// Запись переменных в базу данных
    		$addresult = insertUserAtContacts( $db, $addcontactname, $addcontacttel, $addcontactemail, $addcontactorg, $addcontacturl,  $addcontactlocal, $addcontactnote );

  		if ($addresult) header('Location: index.php?status=add ');
	  	exit();
	  }
	// Получение переменной статуса действия
	 if(isset($_GET['status'])) {
		$getstatus = $_GET['status'];
		if ($getstatus == "add") {
			$status = "<div class='alert alert-success alert-dismissable'><button type='button 'class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Контакт успешно добавлен!</div>";
		}
		elseif ($getstatus == "del") {
			$status = "<div class='alert alert-success alert-dismissable'><button type='button 'class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Контакт успешно удалён!</div>";
		}
		elseif ($getstatus == "edit") {
			$status = "<div class='alert alert-success alert-dismissable'><button type='button 'class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Контакт успешно изменён!</div>";
		}
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
	<title>Контакты</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
<div class="wrapper">
	<header class="header">
		<div class="pull-left"><h1>Контакты</h1></div>
		<div class="pull-right">
			<a href="#" class="btn btn-default" data-toggle="modal" data-target="#addcontact">Добавить контакт</a>
			<a href="logout.php" class="btn btn-default">Выход из системы</a>
		</div>
		<div class="clearfix"></div>
	</header>
	<?php echo $status; ?>
	<main class="content">
		<div class="row">
			<div class="col-md-12">
			<table class="table table-striped">
			    <thead>
			        <tr>
			            <th>Фамилия Имя Отчество</th>
			            <th>Телефон(ы)</th>
			            <th>E-mail</th>
			            <th>Организация</th>
			            <th>Адрес в интернете</th>
			            <th>Местонахождение</th>
			            <th>Заметка</th>
			            <th>Действие</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php
						@mysql_connect($baza['server'], $baza['login'], $baza['pass']);
						@mysql_select_db($baza['baza']);
						$result=mysql_query('SELECT * FROM `contacts`');
            $result = readAllContacts( $db );
            $row = $result -> fetchAll( PDO::FETCH_ASSOC );
            $rows = count( $row );
            for( $i = 0; $i < $rows; $i++ )
						{ echo '
						<tr>
				            <td>'.$row[$i]['name'].'</td>
				            <td>'.$row[$i]['tel'].'</td>
				            <td><a href="mailto:'.$row[$i]['email'].'">'.$row[$i]['email'].'</a></td>
				            <td>'.$row[$i]['org'].'</td>
				            <td><a href="'.$row[$i]['url'].'" target="_blank">'.$row[$i]['url'].'</a></td>
				            <td><a href="https://www.google.ru/maps/place/'.$row[$i]['local'].'" target="_blank">'.$row[$i]['local'].'</a></td>
				            <td>'.$row[$i]['note'].'</td>
				            <td>
				            	<a href="edit.php?user='.$row[$i]['id'].'" onclick="window.open(this.href, \'mywin\', \'left=20,top=20,width=500,height=665,toolbar=0,resizable=0\'); return false;" title="Редактировать"><i class="glyphicon glyphicon-edit"></i></a>
				            	<a href="#"  onclick="if(confirm(\'Вы действительно хотите удалить контакт?\'))location.href=\'delete.php?user='.$row[$i]['id'].'\';" title="Удалить"><i class="glyphicon glyphicon-trash"></i></a>
				            </td>
				        </tr>';
						}
					?>
			    </tbody>
			</table>
			</div>
		</div>
	</main>
</div>

<!-- ========================================================
	Дополнительные окна
========================================================= -->

<!-- Добавление контакта -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="addcontactLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="addcontactLabel">Добавить новый контакт</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Фамилия Имя Отчество</label>
				    <input type="text" class="form-control" name="name" placeholder="Фамилия Имя Отчество">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Телефон(ы)</label>
				    <input type="text" class="form-control" name="tel" placeholder="Телефон(ы)">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">E-mail</label>
				    <input type="text" class="form-control" name="email" placeholder="E-mail">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Организация</label>
				    <input type="text" class="form-control" name="org" placeholder="Организация">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Адрес в интернете</label>
				    <input type="text" class="form-control" name="url" placeholder="Адрес в интернете">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Местонахождение</label>
				    <input type="text" class="form-control" name="local" placeholder="Местонахождение">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Заметка</label>
				    <input type="text" class="form-control" name="note" placeholder="Заметка">
				  </div>
	      </div>
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-success">Добавить</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<!-- / Дополнительные окна -->

<footer class="footer bs-docs-footer">
	Разработчик системы <a href="http://pingvi.org" target="_blank">Артём Сысолятин</a>
</footer>
</body>
</html>