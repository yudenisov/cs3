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
		echo '<pre>'.print_r($_POST,true).'</pre>';
	  	// Получение переменных
		if( !empty($_POST['name'])){
            $addcontactname = $_POST['name'];
        } else $addcontactname = 'anonymous';
		if(!empty($_POST['birthday'])){
            $addbirthday = $_POST['birthday'];
        }  else $addbirthday = '1900-01-01';
		if(!empty($_POST['mobtel'])){
            $addcontacttel = $_POST['mobtel'];
        }  else $addcontacttel = '';
		if(!empty($_POST['email'])){
            $addcontactemail = $_POST['email'];
        } else $addcontactemail = '';
        if(!empty($_POST['hometel'])){
            $addtel = $_POST['hometel'];
        } else $addtel = '';
        if(!empty($_POST['mailru'])){
            $addmailru = $_POST['mailru'];
        } else $addmailru = '';
        if(!empty($_POST['gmail'])){
            $addgmail = $_POST['gmail'];
        }  else $addgmail = '';
        if(!empty($_POST['microsoft'])){
            $addmicrosoft = $_POST['microsoft'];
        }  else $addmicrosoft = '';
        if(!empty($_POST['yahoo'])){
            $addyahoo = $_POST['yahoo'];
        }  else $addyahoo = '';
        if(!empty($_POST['skype'])){
            $addskype = $_POST['skype'];
        }  else $addskype = '';
        if(!empty($_POST['icq'])){
            $addicq = $_POST['icq'];
        } else $addicq = '';
        if(!empty($_POST['fb'])){
            $addfb = $_POST['fb'];
        } else $addfb = '';
        if(!empty($_POST['gplus'])){
            $addgplus = $_POST['gplus'];
        } else $addgplus = '';
        if(!empty($_POST['ok'])){
            $addok = $_POST['ok'];
        } else $addok = '';
        if(!empty($_POST['vk'])){
            $addvk = $_POST['vk'];
        } else $addvk = '';
        if(!empty($_POST['twitter'])){
            $addtwitter = $_POST['twitter'];
        }  else $addtwitter = '';
        if(!empty($_POST['youtube'])){
            $addyoutube = $_POST['youtube'];
        } else $addyoutube = '';
        if(!empty($_POST['instagram'])){
            $addinstagram = $_POST['instagram'];
        } else $addinstagram = '';
        if(!empty($_POST['lj'])){
            $addlj = $_POST['lj'];
        } else $addlj = '';
        if(!empty($_POST['org'])){
            $addcontactorg = $_POST['org'];
        } else $addcontactorg = '';
		if(!empty($_POST['url'])){
            $addcontacturl = $_POST['url'];
        } else $addcontacturl = '';
		if(!empty($_POST['local'])){
            $addcontactlocal = $_POST['local'];
        } else $addcontactlocal = '';
		if(!empty($_POST['note'])){
            $addcontactnote = $_POST['note'];
        }  else $addcontactnote = '';
	  	// Запись переменных в базу данных
          	$addresult = insertUserAtContacts( $db, $addcontactname, $addbirthday, $addcontacttel, $addcontactemail, $addtel, $addmailru,
                $addgmail, $addmicrosoft, $addyahoo, $addskype, $addicq, $addfb, $addgplus, $addok, $addvk,
                $addtwitter, $addyoutube, $addinstagram, $addlj, $addcontactorg, $addcontacturl,  $addcontactlocal, $addcontactnote );
  		//if ($addresult) header('Location: index.php?status=add ');
	  	//exit();
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

Разработчик и дизайнер Юрий Денисов
http://sysolyatin.com http://yudenis.ucoz.ru/
https://github.com/yudenisov
E-mail: yudenisov@mail.ru

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
					<th>Дата рождения</th>
					<th>Мобильный телефон</th>
					<th>E-mail</th>
					<th>Телефон(ы)</th>
					<th>Mail.Ru</th>
					<th>Google</th>
					<th>Microsoft</th>
					<th>Yahoo</th>
					<th>Skype</th>
					<th>ICQ</th>
					<th>Facebook</th>
					<th>Google Plus</th>
					<th>Одноклассники</th>
					<th>ВКонтакте</th>
					<th>Twitter</th>
					<th>YouTube</th>
					<th>Instagram</th>
					<th>LiveJournal</th>
					<th>Организация</th>
					<th>Адрес в интернете</th>
					<th>Местонахождение</th>
					<th>Заметка</th>
					<th>Действие</th>
			        </tr>
			    </thead>
			    <tbody>
			    	<?php
						//@mysql_connect($baza['server'], $baza['login'], $baza['pass']);
						//@mysql_select_db($baza['baza']);
						//$result=mysql_query('SELECT * FROM `contacts`');
            $result = readAllContacts( $db );
            $row = $result -> fetchAll( PDO::FETCH_ASSOC );
            $rows = count( $row );
            for( $i = 0; $i < $rows; $i++ )
						{ echo '
						<tr>
				            <td>'.$row[$i]['name'].'</td>
				            <td>'.$row[$i]['birthday'].'</td>
				            <td>'.$row[$i]['mobtel'].'</td>
				            <td><a href="mailto:'.$row[$i]['email'].'">'.$row[$i]['email'].'</a></td>
				            <td>'.$row[$i]['hometel'].'</td>
				            <td>'.$row[$i]['mailru'].'</td>
				            <td>'.$row[$i]['gmail'].'</td>
				            <td>'.$row[$i]['microsoft'].'</td>
				            <td>'.$row[$i]['yahoo'].'</td>
				            <td>'.$row[$i]['skype'].'</td>
				            <td>'.$row[$i]['icq'].'</td>
				            <td>'.$row[$i]['fb'].'</td>
				            <td>'.$row[$i]['gplus'].'</td>
				            <td>'.$row[$i]['ok'].'</td>
				            <td>'.$row[$i]['vk'].'</td>
				            <td>'.$row[$i]['twitter'].'</td>
				            <td>'.$row[$i]['youtube'].'</td>
				            <td>'.$row[$i]['instagram'].'</td>
				            <td>'.$row[$i]['lj'].'</td>
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
			    <label for="exampleInputPassword1">Дата рождения</label>
			    <input type="date" class="form-control" name="birthday" placeholder="Дата рождения">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Мобильный телефон</label>
			    <input type="tel" class="form-control" name="mobtel" placeholder="Мобильный телефон">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">E-mail</label>
			    <input type="email" class="form-control" name="email" placeholder="E-mail">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Телефон(ы)</label>
			    <input type="text" class="form-control" name="hometel" placeholder="Телефон(ы)">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Mail.Ru</label>
			    <input type="email" class="form-control" name="mailru" placeholder="Адрес Mail.ru">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Google</label>
			    <input type="email" class="form-control" name="gmail" placeholder="Google ID">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Microsoft</label>
			    <input type="email" class="form-control" name="microsoft" placeholder="Microsoft ID">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Yahoo!</label>
			    <input type="email" class="form-control" name="yahoo" placeholder="Yahoo ID">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Skype</label>
			    <input type="text" class="form-control" name="skype" placeholder="Skype">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">ICQ</label>
			    <input type="number" class="form-control" name="icq" placeholder="ICQ UIN">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Facebook</label>
			    <input type="text" class="form-control" name="fb" placeholder="Facebook Name">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Google Plus</label>
				<input type="url" class="form-control" name="gplus" placeholder="Google Plus Name">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Одноклассники</label>
			    <input type="text" class="form-control" name="ok" placeholder="Одноклассники ID">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">ВКонтакте</label>
			    <input type="text" class="form-control" name="vk" placeholder="ВКонтакте ID">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Twitter</label>
			    <input type="text" class="form-control" name="twitter" placeholder="Twitter Name">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">YouTube</label>
			    <input type="url" class="form-control" name="youtube" placeholder="URL Ленты на YouTube">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Instagram</label>
			    <input type="text" class="form-control" name="instagram" placeholder="Instagram Name">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">LiveJournal</label>
			    <input type="text" class="form-control" name="lj" placeholder="Live Journal Name">
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
			    <input type="text" class="form-control" name="local" placeholder="Домашний адрес">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Заметка</label>
			    <input type="text" class="form-control" name="note" placeholder="Заметка">
			</div>
        	<div class="modal-footer">
	      	    <button type="submit" class="btn btn-success">Добавить</button>
	            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
	        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- / Дополнительные окна -->

<footer class="footer bs-docs-footer">
	Разработчик системы <a href="http://yudenis.ucoz.ru/" target="_blank">Юрий Денисов</a>
</footer>
</body>
</html>