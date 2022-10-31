<?php session_start(); ?>
<DOCTYPE! html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <ul>
            <?php
                if (!empty($_SESSION['dataC']))
                {
                    foreach($_SESSION['dataC'] as $el)
                        echo "<li>{$el}</li>";
                }
            ?>
        </ul>
        <form action="Lab03-2.php" method="post">
            <input type="submit" value="Back">
        </form>
    </body>
</html>