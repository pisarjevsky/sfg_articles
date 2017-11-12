<?

$db_connect = mysqli_connect('localhost', 'pisarjevsky', '123qwer', 'news');
mysqli_set_charset($db_connect,"utf8");
if(!$db_connect) exit('MySQL Err');

?>