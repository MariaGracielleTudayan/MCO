<?php
ob_start();

// Set timezone to Philippine Time
date_default_timezone_set('Asia/Manila');

$db = new mysqli("localhost", "root", "");
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$db->query("CREATE DATABASE IF NOT EXISTS `phpchart`");

mysqli_select_db($db, "phpchart");

$stable56 = "CREATE TABLE IF NOT EXISTS Users (id int(11) NOT NULL auto_increment,
                  Firstname varchar(300) NOT NULL, 
                  Sirname varchar(300) NOT NULL,
                  Mtitle Varchar(30) NOT NULL,                                 
                  Phone varchar(30) NOT NULL,                                 
                  Institution varchar(300) NOT NULL,
                  Email varchar(300) NOT NULL,
                  Password varchar(300) NOT NULL,
                  Online varchar(300) NOT NULL,
                  Time bigint(30) NOT NULL,                         
                  PRIMARY KEY(id) )";
$db->query($stable56);

$stableZ = "CREATE TABLE IF NOT EXISTS Profilepictures (id int(11) NOT NULL auto_increment,
             ids varchar(30) NOT NULL, Category varchar(30) NOT NULL, name varchar(1000) NOT NULL, type varchar(30) NOT NULL,
             Size decimal(10) NOT NULL, content longblob NOT NULL,
             PRIMARY KEY(id) )";
$db->query($stableZ);

$forum = "CREATE TABLE IF NOT EXISTS Chart (id int(11) NOT NULL auto_increment,
              Userid varchar(30) NOT NULL, Name varchar(30) NOT NULL, Message text(1000) NOT NULL,
              Date varchar(15) NOT NULL, Time Time, Group_Name varchar(30) NOT NULL,
              PRIMARY KEY(id) )";
$db->query($forum);

$sql = "SELECT * FROM Users ";
$result = mysqli_query($db, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) {
    $time = time();
    $enter = "INSERT INTO Users (Password, Email, Firstname, Sirname, Institution, Phone, Time) VALUES('1234554321', 'john@gmail.com', 'John', 'Doe', 'BSCS', '+639817127819', '$time')";
    $db->query($enter);

    $queryz = "INSERT INTO Profilepictures (name, size, type, content, Category, ids) " .
        "VALUES ('IMG_0458.JPG', '194348', 'image/jpeg', 'IMG_0458.JPG', 'User', '1')";
    $db->query($queryz) or die('Error, query failed to upload');

    $date = date("d/m/y");
    $today = date("g:i a");
    $dbFormat = date('H:i:s');

    $query1zk = "INSERT INTO Chart (Message, Name, Userid, Time, Date) " .
        "VALUES ('HI!', 'John', '1234554321', '$dbFormat', '$date')";
    $db->query($query1zk) or die('Error, query failed');

    $querydy = "INSERT INTO Profilepictures (name, size, type, content, Category, ids) " .
        "VALUES ('339264-Berserker.jpg', '110920', 'image/jpeg', '339264-Berserker.jpg', 'Group', '1')";
    $db->query($querydy) or die('Error, query failed to upload');
}

?>