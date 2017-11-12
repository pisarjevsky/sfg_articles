<? require 'includes/db_connect.php';?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>index</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="includes/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>


    <body>
        <div id="wrapper">
            <div id="header">
                <a href="/test4/arcticles/">main</a>
                <? if(!$_COOKIE['login']){ ?>
                    <a href="/test4/arcticles/user.php?page=login">login</a>
                    <?} else if($_COOKIE['login']) {?>
                <a href="/test4/arcticles/user.php?page=admin">admin</a>
                <a href="/test4/arcticles/admin.php?action=add">add</a>
                        <a href="/test4/arcticles/user.php?page=logout">logout</a>
                        <?}?>
            </div>
            <div id="content">
