<?php session_start(); ?>
<DOCTYPE! html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <p>
            2. Форма. Сессии и Куки<br/>

            a. Дан текстареа и кнопка. В текстареа вводится текст. По
            нажатию на кнопку выведите количество слов и количество
            символов в тексте.<br/>

            b. На одной странице с помощью формы спросите у
            пользователя фамилию, имя и возраст. Запишите эти данные
            в сессию. При заходе на другую страницу выведите эти
            данные на экран.<br/>

            c. На одной странице с помощью формы спросите у
            пользователя имя, возраст, зарплату и еще что-нибудь.
            Запишите эти данные в одну переменную сессии в виде
            массива. При заходе на другую страницу переберите
            сохраненные данные циклом и выведите каждый элемент
            массива в своем теге li тега ul.<br/>
        </p>
        <div>
            Пункт А.
            <form action="Lab03-2.php" method="post">
                <textarea name="textAreaA">
                    На краю дороги стоял дуб. Вероятно, в десять раз старше берез, составлявших лес, он был в десять раз толще, и в два раза выше каждой березы. Это был огромный, в два обхвата дуб, с обломанными, давно, видно, суками и с обломанной корой, заросшей старыми болячками. С огромными своими неуклюже, несимметрично растопыренными корявыми руками и пальцами, он старым, сердитым и презрительным уродом стоял между улыбающимися березами. Только он один не хотел подчиняться обаянию весны и не хотел видеть ни весны, ни солнца.
                </textarea>
                <input type="submit" value="Enter">
                <?php
                    if(!empty($_POST['textAreaA']))
                    {
                        $data = $_POST['textAreaA'];
                        $wCount = str_word_count($data, 0);
                        $sCount = strlen($data);
                        echo nl2br("\nСлов: " . $wCount . "\n" . "Символов: " . $sCount . "\n");
                    }
                ?>
            </form>
        </div>
        <div>
            Пункт B.
            <form action="Lab03-2.php" method="post">
                <textarea name="nameInputB">Enter your name here</textarea>
                <textarea name="surnameInputB">Enter your surname here</textarea>
                <textarea name="ageInputB">Enter your age here</textarea>
                <input type="submit" value="Enter">
                <?php
                    if (!empty($_POST['nameInputB']) && !empty($_POST['surnameInputB']) && !empty($_POST['ageInputB']))
                    {
                        $_SESSION['dataB'] = array
                        (
                            'nameInputB' => $_POST['nameInputB'],
                            'surnameInputB' => $_POST['surnameInputB'],
                            'ageInputB' => $_POST['ageInputB']
                        );
                        echo nl2br("\nGot it\n");
                    }
                ?>
            </form>
            <form action="Lab03-2(viewB).php" method="post">
                <input type="submit" value="See result">
            </form>
        </div>
        <div>
            Пункт C.
            <form action="Lab03-2.php" method="post">
                <textarea name="nameInputC">Enter your name here</textarea>
                <textarea name="surnameInputC">Enter your surname here</textarea>
                <textarea name="ageInputC">Enter your age here</textarea>
                <textarea name="salaryInputC">Enter your salary here</textarea>
                <textarea name="smtInputC">Enter something else here</textarea>
                <input type="submit" value="Enter">
                <?php
                    if (!empty($_POST['nameInputC']) && !empty($_POST['surnameInputC']) && !empty($_POST['ageInputC']) && !empty($_POST['salaryInputC']) && !empty($_POST['smtInputC']))
                    {
                        $_SESSION['dataC'] = array
                        (
                            'nameInputC' => $_POST['nameInputC'],
                            'surnameInputC' => $_POST['surnameInputC'],
                            'ageInputC' => $_POST['ageInputC'],
                            'salaryInputC' => $_POST['salaryInputC'],
                            'smtInputC' => $_POST['smtInputC']
                        );
                        echo nl2br("\nGot it\n");
                    }
                ?>
            </form>
            <form action="Lab03-2(viewC).php" method="post">
                <input type="submit" value="See result">
            </form>
        </div>
        <form action="index.php" method="post">
            <input type="submit" value="Back">
        </form>
    </body>
</html>