<?php
 /**
 * Подключение к базе данных
 * Site: http://transportny_operator
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
      $contactname, $contacttel,
      $contactemail, $contactorg, $contacturl,
      $contactlocal, $contactnote,
      $userId ){
  $query = "
  UPDATE `contacts`
  SET
    `name` = :contactname,
    `tel` = :contacttel,
    `email` = :contactemail,
    `org` = :contactorg,
    `url` = :contacturl,
    `local` = :contactlocal,
    `note` = :contactnote
  WHERE `id` = :userid;
  ";
  $stmt = $db->prepare( $query );
  $stmt->bindValue( "contactname", $contactname, PDO::PARAM_STR );
  $stmt->bindValue( "contacttel", $contacttel, PDO::PARAM_STR );
  $stmt->bindValue( "contactemail", $contactemail, PDO::PARAM_STR );
  $stmt->bindValue( "contactorg", $contactorg, PDO::PARAM_STR );
  $stmt->bindValue( "contacturl", $contacturl, PDO::PARAM_STR );
  $stmt->bindValue( "contactlocal", $contactlocal, PDO::PARAM_STR );
  $stmt->bindValue( "contactnote", $contactnote, PDO::PARAM_STR );
  $stmt->bindValue( "userid", $userId, PDO::PARAM_INT );
  $stmt->execute();
  // Заглушка для совместимости со старым кодом
  return true;
}

function insertUserAtContacts( $db,
      $contactname, $contacttel,
      $contactemail, $contactorg, $contacturl,
      $contactlocal, $contactnote){
  $query = "
  INSERT INTO `contacts`
    (`name`, `tel`, `email`, `org`, `url`, `local`, `note`)
    VALUES (:contactname, :contacttel, :contactemail, :contactorg, :contacturl, :contactlocal, :contactnote);
  ";
  $stmt = $db->prepare( $query );
  $stmt->bindValue( "contactname", $contactname, PDO::PARAM_STR );
  $stmt->bindValue( "contacttel", $contacttel, PDO::PARAM_STR );
  $stmt->bindValue( "contactemail", $contactemail, PDO::PARAM_STR );
  $stmt->bindValue( "contactorg", $contactorg, PDO::PARAM_STR );
  $stmt->bindValue( "contacturl", $contacturl, PDO::PARAM_STR );
  $stmt->bindValue( "contactlocal", $contactlocal, PDO::PARAM_STR );
  $stmt->bindValue( "contactnote", $contactnote, PDO::PARAM_STR );
  $stmt->execute();
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
