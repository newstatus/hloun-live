<?php
############################
## CopyRight For Hloun.in ##
## Dev By Baha'a Odeh     ##
## 18/11/2012 - 1:13AM    ##
## Hloun Live             ##
## 2.0.0                  ##
############################
########################
# اكتب اسم السيرفر

	$DB_HOST = "localhost";

# اكتب اسم القاعدة

	$DB_NAME = "chatnew";

# اكتب اسم مستخدم القاعدة

	$DB_USER = "root";

# اكتب اسم كلمة مرور القاعدة

	$DB_PASS = "baha";

 @mysql_connect($DB_HOST,$DB_USER,$DB_PASS) or die("Not Connect");
 @mysql_select_db($DB_NAME) or die ("Not Selected data base");
 




?>