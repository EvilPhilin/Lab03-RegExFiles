<DOCTYPE! html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <p>
            1. Регулярные выражения<br/>

            a. Напишите регулярку, которая найдет строки 'abba', 'adca',
            'abea' по шаблону: буква 'a', два любых символа, буква 'b'.
            Пример строки: $str = 'ahb acb aeb aeeb adcb axeb';<br/>

            b. Дана строка с целыми числами 'a1b2c3'. С помощью
            регулярки преобразуйте строку так, чтобы вместо этих
            чисел стояли их кубы.<br/>

            Судя по "найдет строки 'abba', 'adca','abea'",
            шаблон подразумевает, что между 'а' и 'b'
            символов может не оказаться
        </p>
        <p>
            <?php
                $str = 'ahb acb aeb aeeb adcb axeb proverka aprboverka';
                $matches = [];
                preg_match_all('/a.?.?b/', $str, $matches);
                echo nl2br("From '{$str}' by pattern '/a.?.?b/' we've got\n");
                print_r($matches);
            ?>
        </p>
        <p>
            <?php
                $str = 'a1b2c3dz26';
                $modded = preg_replace_callback('/\d+/', function ($matches) {return pow($matches[0], 3);}, $str);
                echo nl2br("From {$str} pow(3) we've got\n{$modded}");
            ?>
        </p>
        <form action="index.php" method="post">
            <input type="submit" value="Back">
        </form>
    </body>
</html>
