<?php

$db_username = "root"; //数据库用户名
$db_password = "zts262019"; //数据库密码
$db_database = "test"; //数据库名称
$db_hostname = "127.0.0.1"; //数据库地址

@mysql_connect ( "$db_hostname", "$db_username", "$db_password" ) or die ( "Mysql connect failed" );
@mysql_select_db ( "$db_database" ) or die ( "Database connect failed" );
//@mysql_set_charset("utf8")or die("mysql_set_charset failed");
@mysql_query ( "set names 'utf8'" ) or die ( "mysql_set_charset failed" );



?>