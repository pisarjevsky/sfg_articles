<?php require 'includes/header.php';?>
<?
if(!$_COOKIE['login']) header("location: /test4/arcticles/user.php?page=login");
if($_GET['action'] == 'add') 
{?>
    <h1>addition</h1>
    <form action="/test4/arcticles/admin.php?action=add" method="post">

<?

if($_POST['add']){
    mysqli_query($db_connect, "insert into `articles` (`title`, `text`, `date`,`display`) values('$_POST[title]','$_POST[text]', NOW(), '$_POST[display]')");
    header("location: /test4/arcticles/");  
}                           
?>


<p><input type="text" name="title" placeholder="Title"></p>
<p><textarea name = "text" placeholder="text" ></textarea></p>
<p><select size="1" name="display">
    <option  value="1">Опубликовать</option>
    <option selected value="0">Скрыть</option>
        </select></p>
<p><input type="submit" name="add"></p>
</form>
<?}


else if($_GET['action']=='edit'&& $_GET['id'])
{?>
<form action="/test4/arcticles/admin.php?action=edit&id=<?=$_GET['id'];?>" method="post">

<?
    $art = mysqli_fetch_assoc(mysqli_query($db_connect, "select * from `articles` where `id` = $_GET[id]"));
    if($_POST['edit']){
        mysqli_query($db_connect, "update `articles` set `title` = '$_POST[title]', `text` = '$_POST[text]', `display` = '$_POST[display]' where `id`= $_GET[id]");
        header("location: /test4/arcticles/user.php?page=admin");
    }
?>

<p><input type="title" name="title" value="<?=$art['title']?>"  placeholder="Title"></p>
<p><textarea name = "text" placeholder="text" ><?=$art['text']?></textarea></p>
<!--<p><input type="text" name = "display" value="<?=$art['display']?>" placeholder="show or not 1/0" ></p>-->
    <? if($art['display']==1) {?>
    <p><select size="1" name="display">
    <option selected value="1">Опубликовать</option>
    <option value="0">Скрыть</option>
   </select></p>
    <?}
 else {?>
    <p><select size="1" name="display">
    <option  value="1">Опубликовать</option>
    <option selected value="0">Скрыть</option>
        </select></p>
    <?}?>
<p><input type="submit" name="edit"></p>

</form>
<?}




else if($_GET['action']=='remove'&& $_GET['id'])
{
    echo "h";
    $art = mysqli_fetch_assoc(mysqli_query($db_connect, "select from `articles` where `id` = $_GET[id]"));

        mysqli_query($db_connect, "delete from `articles` where `id` = $_GET[id]");
        header("location: /test4/arcticles/user.php?page=admin");
    
}?>


<? require 'includes/footer.php';?>