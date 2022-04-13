<?php
session_start();
define("SITEURL", "http://localhost:63342/bookStore/bookStore/");

define("servername", "localhost");
define("username", "root");
define("password", "");
define("dbname", "bookstor");

$con = mysqli_connect(servername, username, password, dbname);

