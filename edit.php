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
        echo '<pre>'.print_r($_POST,true).'</pre>';
          // Получение переменных от новых значений
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
        $addresult = updateUserAtContacts( $db, $addcontactname, $addbirthday, $addcontacttel, $addcontactemail, $addtel, $addmailru,
             $addgmail, $addmicrosoft, $addyahoo, $addskype, $addicq, $addfb, $addgplus, $addok, $addvk,
             $addtwitter, $addyoutube, $addinstagram, $addlj, $addcontactorg, $addcontacturl,  $addcontactlocal, $addcontactnote, $userid );
         //if ($editresult) echo "<script type='text/javascript'>window.close();</script>";
		//exit();
	  }
?>
<!-- =====================================================

$$$$$   $$$$$$  $$  $$   $$$$   $$  $$  $$$$$$
$$  $$    $$    $$$ $$  $$      $$  $$    $$
$$$$$     $$    $$ $$$  $$ $$$  $$  $$    $$
$$        $$    $$  $$  $$  $$   $$$$     $$
$$      $$$$$$  $$  $$   $$$$     $$    $$$$$$

Разработчик и дизайнер Сысолятин Артём
http://yudenis.ucoz.ru/
https://github.com/yudenisov
E-mail: yudenisov@mail.ru

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
                                <label for="exampleInputEmail1">Дата рождения</label>
                                <input type="date" class="form-control" name="birtday" value="<?php echo $array['birthday']; ?>">
                            </div>
                            <div class="form-group">
						        <label for="exampleInputPassword1">Мобильный телефон</label>
						        <input type="tel" class="form-control" name="mobtel" value="<?php echo $array['mobtel']; ?>">
						    </div>
                            <div class="form-group">
						        <label for="exampleInputPassword1">E-mail</label>
						        <input type="email" class="form-control" name="email" value="<?php echo $array['email']; ?>">
						    </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Телефон(ы)</label>
                                <input type="text" class="form-control" name="hometel" value="<?php echo $array['hometel']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mail.Ru Account</label>
                                <input type="email" class="form-control" name="mailru" value="<?php echo $array['mailru']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Google Account</label>
                                <input type="email" class="form-control" name="gmail" value="<?php echo $array['gmail']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Microsoft Account</label>
                                <input type="email" class="form-control" name="microsoft" value="<?php echo $array['microsoft']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Yahoo Account</label>
                                <input type="email" class="form-control" name="yahoo" value="<?php echo $array['yahoo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Skype</label>
                                <input type="text" class="form-control" name="skype" value="<?php echo $array['skype']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ICQ</label>
                                <input type="number" class="form-control" name="icq" value="<?php echo $array['icq']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Facebook</label>
                                <input type="text" class="form-control" name="fb" value="<?php echo $array['fb']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Google Plus</label>
                                <input type="url" class="form-control" name="gplus" value="<?php echo $array['gplus']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Одноклассники</label>
                                <input type="text" class="form-control" name="ok" value="<?php echo $array['ok']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ВКонтакте</label>
                                <input type="text" class="form-control" name="vk" value="<?php echo $array['vk']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="<?php echo $array['twitter']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Youtube</label>
                                <input type="url" class="form-control" name="youtube" value="<?php echo $array['youtube']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="<?php echo $array['instagram']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Live Journal</label>
                                <input type="text" class="form-control" name="lj" value="<?php echo $array['lj']; ?>">
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