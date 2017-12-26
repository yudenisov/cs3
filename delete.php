<?php
/**
$$$$$   $$$$$$  $$  $$   $$$$   $$  $$  $$$$$$
$$  $$    $$    $$$ $$  $$      $$  $$    $$
$$$$$     $$    $$ $$$  $$ $$$  $$  $$    $$
$$        $$    $$  $$  $$  $$   $$$$     $$
$$      $$$$$$  $$  $$   $$$$     $$    $$$$$$

Разработчик и дизайнер Сысолятин Артём
http://yudenis.ucoz.ru
https://github.com/yudenisov
E-mail: yudenisov@mail.ru

Перед использованием, читайте файл лицензии.
**/
	require('config.php'); // Подключение файла настроек
	include_once( './bd/bd_func.php' );
	$db = openBaza( $baza['baza'] );
	// Авторизация
	session_start();
	if (!(isset($_SESSION['autorized']) &&
		$_SESSION['autorized'] != '')) {
		header("Location: login.php");
	}
	// Обработка удаления контакта
	if(isset($_GET['user']))
	  {
	  	$userid = $_GET['user']; // Получаем id контакта для удаления
	  	// Удаление строки из базы данных
		$deluserresult = deleteUserAtContacts( $db, $userid );
		header('Location: index.php?status=del');
		exit();
	  }
	header('Location: index.php');
?>
