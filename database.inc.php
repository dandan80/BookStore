<?php

/*
 Sets up the PDO database connection
*/

  //For EasyPHP Local Webserver 
  $connString = "mysql:host=localhost;
  dbname=dbfxp8y5hobg4z";
  $user = "u1erlqqgky9gv"; 
  $password = "book@rep20";

  //You need to modify dbname and username($user) for SiteGround Web Server  
	 
  $pdo = new PDO($connString,$user,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   



?>
