<?php require 'includes/header.php';?>

<?
$log_admin = 'adminer';
$pas_admin = '123456';

if($_GET['page']=='login'){
if($_COOKIE['login']) header("location: /test4/arcticles/user.php?page=admin");?>
    <form action="/test4/arcticles/user.php?page=login" method="post">
        <?
        if($_POST['do_register']) {
            if($_POST[login]==$log_admin && $_POST[password]==$pas_admin)
            {
             setcookie("login", $_POST['login'], time()+60*30);
             setcookie("password", $_POST['password'], time()+60*30);
                header("location:/test4/arcticles/user.php?page=admin");
            }
        }
        ?>
            <input type="text" name="login" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" name="do_register" value="Войти">
    </form>

    <?
}
else if($_GET['page']=='admin')
{ 
    if(!$_COOKIE['login']) header("location: /test4/arcticles/user.php?page=login");
 else {
    $query = mysqli_query($db_connect, "SELECT * FROM `articles` ORDER BY `id` desc");
$row_count = mysqli_num_rows($query);
if(!$row_count) echo "No articles";
else{?>
        <table id="admin-table">
            <tr>
                <th>id</th>
                <th>title</th>
                <th>text</th>
                <th>date</th>
                <th>display</th>
            </tr>
            <?
    while($art = mysqli_fetch_assoc($query) ){
?>
                <tr>
                    <td>
                        <?=$art['id']?>
                    </td>
                    <td>
                        <?=$art['title']?>
                    </td>
                    <td>
                        <?=$art['text']?>
                    </td>
                    <td>
                        <?=$art['date']?>
                    </td>
                    <td>
                        <?=$art['display']?>
                    </td>
                    <td>
                        <a href="/test4/arcticles/admin.php?action=edit&id=<?=$art['id'];?>">edit</a>
                    </td>
			<td>
                        <a href="/test4/arcticles/admin.php?action=remove&id=<?=$art['id'];?>">del</a>
                    </td>
                </tr>
                <?
}
    ?>
        </table>
        <?
}
}
}
 else if($_GET['page']=='logout')
{
            setcookie("login", $_POST['login'], time()-60*30);
            setcookie("password", $_POST['password'], time()-60*30);
    header("location: /test4/arcticles/user.php?page=login");
}
?>
            <?php require 'includes/footer.php';?>
