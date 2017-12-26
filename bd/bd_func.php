<?php
 /**
 * Подключение к базе данных
 * Site: http://contacts.forex-brand.su/
 * Регистрация пользователя письмом
 */

function openBaza( $param )
{
global $baza;
//Подключение к базе данных mySQL с помощью PDO
try {
    $db = new PDO('mysql:host='.$baza['server'].';dbname='.$param, $baza['login'], $baza['pass'], array(
    	PDO::ATTR_PERSISTENT => true
    	));

} catch (PDOException $e) {
    print "Ошибка соединеия!: " . $e->getMessage() . "<br/>";
    die();
}
return $db;
}

function deleteUserAtContacts( $db, $userId ){
  $query = "
    DELETE
    FROM `contacts`
    WHERE `id`= :userId;
  ";
  $stmt = $db->prepare( $query );
  $stmt->bindValue( "userId", $userId, PDO::PARAM_INT );
  
  return $stmt->execute();
}

function updateUserAtContacts( $db,
	$contactname, $contactbirthday, $contacttel, $contactemail, $contacthometel, 
	$contactmailru, $contactgmail, $contactmicrosoft, $contactyahoo, $contactskype, $contacticq, 
	$contactfb, $contactgplus, $contactok, $contactvk, $contacttwitter, $contactyoutube, 
	$contactinstagram, $contactlj, $contactorg, $contacturl, $contactlocal, $contactnote,
      $userId ){
echo $contactname." , ".$contactbirthday." , ".$contacttel." , ".$contactemail." , ".$contacthometel." , ".$contactmailru." , ".$contactgmail." , ".$contactmicrosoft." , ".$contactyahoo." , ".$contactskype." , ".$contacticq." , ".$contactfb." , ".$contactgplus." , ".$contactok." , ".$contactvk." , ".$contacttwitter." , ".$contactyoutube." , ".$contactinstagram." , ".$contactlj." , ".$contactorg." , ".$contacturl." , ".$contactlocal." , ".$contactnote;

  $query = "
	  UPDATE `contacts`
  SET
	`name` = :contactname,
	`birthday` = :contactbirthday,
	`mobtel` = :contacttel,
	`email` = :contactemail,
	`hometel` = :contacthometel,
	`mailru` = :contactmailru,
	`gmail` = :contactgmail,
	`microsoft` = :contactmicrosoft,
	`yahoo` = :contactyahoo,
	`skype` = :contactskype,
	`icq` = :contacticq,
	`fb` = :contactfb,
	`gplus` = :contactgplus,
	`ok` = :contactok,
	`vk` = :contactvk,
	`twitter` = :contacttwitter,
	`youtube` = :contactyoutube,
	`instagram` = :contactinstagram,
	`lj`= :contactlj,
	`org` = :contactorg,
	`url` = :contacturl,
	`local` = :contactlocal,
	`note` = :contactnote
  WHERE `id` = :userid;
  ";
  $stmt = $db->prepare( $query );
  $stmt->bindValue( ":contactname", $contactname, PDO::PARAM_STR );
  $stmt->bindValue( ":contactbirthday", $contactbirthday, PDO::PARAM_INT );
  $stmt->bindValue( ":contacttel", $contacttel, PDO::PARAM_STR );
  $stmt->bindValue( ":contactemail", $contactemail, PDO::PARAM_STR );
  $stmt->bindValue( ":contacthometel", $contacthometel, PDO::PARAM_STR );
  $stmt->bindValue( ":contactmailru", $contactmailru, PDO::PARAM_STR );
  $stmt->bindValue( ":contactgmail", $contactgmail, PDO::PARAM_STR );
  $stmt->bindValue( ":contactmicrosoft", $contactmicrosoft, PDO::PARAM_STR );
  $stmt->bindValue( ":contactyahoo", $contactyahoo, PDO::PARAM_STR );
  $stmt->bindValue( ":contactskype", $contactskype, PDO::PARAM_STR );
  $stmt->bindValue( ":contacticq", $contacticq, PDO::PARAM_STR );
  $stmt->bindValue( ":contactfb", $contactfb, PDO::PARAM_STR );
  $stmt->bindValue( ":contactgplus", $contactgplus, PDO::PARAM_STR );
  $stmt->bindValue( ":contactok", $contactok, PDO::PARAM_STR );
  $stmt->bindValue( ":contactvk", $contactvk, PDO::PARAM_STR );
  $stmt->bindValue( ":contacttwitter", $contacttwitter, PDO::PARAM_STR );
  $stmt->bindValue( ":contactyoutube", $contactyoutube, PDO::PARAM_STR );
  $stmt->bindValue( ":contactinstagram", $contactinstagram, PDO::PARAM_STR );
  $stmt->bindValue( ":contactlj", $contactlj, PDO::PARAM_STR );
  $stmt->bindValue( ":contactorg", $contactorg, PDO::PARAM_STR );
  $stmt->bindValue( ":contacturl", $contacturl, PDO::PARAM_STR );
  $stmt->bindValue( ":contactlocal", $contactlocal, PDO::PARAM_STR );
  $stmt->bindValue( ":contactnote", $contactnote, PDO::PARAM_STR );
  $stmt->bindValue( "userid", $userId, PDO::PARAM_INT );
  $stmt->execute();
  // Заглушка для совместимости со старым кодом
  return true;
}

function insertUserAtContacts( $db,
	$contactname, $contactbirthday, $contacttel, $contactemail, $contacthometel, 
	$contactmailru, $contactgmail, $contactmicrosoft, $contactyahoo, $contactskype, $contacticq, 
	$contactfb, $contactgplus, $contactok, $contactvk, $contacttwitter, $contactyoutube, 
	$contactinstagram, $contactlj, $contactorg, $contacturl, $contactlocal, $contactnote)
{
echo $contactname." , ".$contactbirthday." , ".$contacttel." , ".$contactemail." , ".$contacthometel." , ".$contactmailru." , ".$contactgmail." , ".$contactmicrosoft." , ".$contactyahoo." , ".$contactskype." , ".$contacticq." , ".$contactfb." , ".$contactgplus." , ".$contactok." , ".$contactvk." , ".$contacttwitter." , ".$contactyoutube." , ".$contactinstagram." , ".$contactlj." , ".$contactorg." , ".$contacturl." , ".$contactlocal." , ".$contactnote;
  $query = "
  INSERT INTO `contacts`
    (`name`, `birthday`, `mobtel`, `email`, `hometel`, `mailru`, `gmail`, `microsoft`, `yahoo`, `skype`, `icq`, `fb`, `gplus`, `ok`, `vk`, `twitter`, `youtube`, `instagram`, `lj`, `org`, `url`, `local`, `note`)
    VALUES (:contactname, :contactbirthday, :contacttel, :contactemail, :contacthometel, :contactmailru, :contactgmail, :contactmicrosoft, :contactyahoo, :contactskype, :contacticq, :contactfb, :contactgplus, :contactok, :contactvk, :contacttwitter, :contactyoutube, :contactinstagram, :contactlj, :contactorg, :contacturl, :contactlocal, :contactnote);
  ";
  $stmt = $db->prepare( $query );
  $stmt->bindValue( ":contactname", $contactname, PDO::PARAM_STR );
  $stmt->bindValue( ":contactbirthday", $contactbirthday, PDO::PARAM_STR );
  $stmt->bindValue( ":contacttel", $contacttel, PDO::PARAM_STR );
  $stmt->bindValue( ":contactemail", $contactemail, PDO::PARAM_STR );
  $stmt->bindValue( ":contacthometel", $contacthometel, PDO::PARAM_STR );
  $stmt->bindValue( ":contactmailru", $contactmailru, PDO::PARAM_STR );
  $stmt->bindValue( ":contactgmail", $contactgmail, PDO::PARAM_STR );
  $stmt->bindValue( ":contactmicrosoft", $contactmicrosoft, PDO::PARAM_STR );
  $stmt->bindValue( ":contactyahoo", $contactyahoo, PDO::PARAM_STR );
  $stmt->bindValue( ":contactskype", $contactskype, PDO::PARAM_STR );
  $stmt->bindValue( ":contacticq", $contacticq, PDO::PARAM_STR );
  $stmt->bindValue( ":contactfb", $contactfb, PDO::PARAM_STR );
  $stmt->bindValue( ":contactgplus", $contactgplus, PDO::PARAM_STR );
  $stmt->bindValue( ":contactok", $contactok, PDO::PARAM_STR );
  $stmt->bindValue( ":contactvk", $contactvk, PDO::PARAM_STR );
  $stmt->bindValue( ":contacttwitter", $contacttwitter, PDO::PARAM_STR );
  $stmt->bindValue( ":contactyoutube", $contactyoutube, PDO::PARAM_STR );
  $stmt->bindValue( ":contactinstagram", $contactinstagram, PDO::PARAM_STR );
  $stmt->bindValue( ":contactlj", $contactlj, PDO::PARAM_STR );
  $stmt->bindValue( ":contactorg", $contactorg, PDO::PARAM_STR );
  $stmt->bindValue( ":contacturl", $contacturl, PDO::PARAM_STR );
  $stmt->bindValue( ":contactlocal", $contactlocal, PDO::PARAM_STR );
  $stmt->bindValue( ":contactnote", $contactnote, PDO::PARAM_STR );
try {
  $stmt->execute();
} catch (PDOException $e) {
    echo "<h3>Ошибка добавления!: " . $e->getMessage() . "</h3>";
    die();
}
  // Заглушка для совместимости со старым кодом
  return true;
}

function readAllContacts( $db ){
    $query = "
	SELECT * 
	FROM contacts;
  ";
    $stmt = $db->query( $query );
    return $stmt;
}

function readAllContactsbyName( $db ){
    $query = "
	SELECT * 
	FROM contacts
	ORDER BY `name`;
  ";
    $stmt = $db->query( $query );
    return $stmt;
}

function readUserAtContacts( $db, $userID ){
  $query = "
    SELECT *
    FROM `contacts`
    WHERE `id` = :userID;
  ";
  $stmt = $db->prepare( $query );
  $stmt->bindValue( "userID", $userID, PDO::PARAM_INT );
  $stmt -> execute();
  return $stmt;
}
