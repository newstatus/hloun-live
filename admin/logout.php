<?php
if (!file_exists('installd.install')){
header('Location: ../install.php');
} 
include '../include/include.php';
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################
(empty($_SESSION['name'])) ? header("Location: index.php") : '';
(empty($_SESSION['adminid'])) ? header("Location: index.php") : '';
(empty($_SESSION['groups'])) ? header("Location: index.php") : '';
(empty($_SESSION['email'])) ? header("Location: index.php") : '';
if (!empty($_SESSION['name']) or !empty($_SESSION['adminid']) or  !empty($_SESSION['groups']) or  !empty($_SESSION['email'])){

unset($_SESSION['name']);
unset($_SESSION['adminid']);
unset($_SESSION['groups']);
unset($_SESSION['email']);
unset($_SESSION);
session_unset();
session_destroy();
(empty($_SESSION['name'])) ? header("Location: index.php") : '';
(empty($_SESSION['adminid'])) ? header("Location: index.php") : '';
(empty($_SESSION['groups'])) ? header("Location: index.php") : '';
(empty($_SESSION['email'])) ? header("Location: index.php") : '';

}
 ?>
 