<?php session_start(); ?>
<DOCTYPE! html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <p>
            <?php
                if (!empty($_SESSION['dataB']))
                {
                    echo nl2br
                    ("
                        {$_SESSION['dataB']['nameInputB']}\n
                        {$_SESSION['dataB']['surnameInputB']}\n
                        {$_SESSION['dataB']['ageInputB']}
                    ");
                }
            ?>
        </p>
        <form action="Lab03-2.php" method="post">
            <input type="submit" value="Back">
        </form>
    </body>
</html>