<?php
    if(!is_dir("./ads"))   mkdir("./ads");
    if(!is_dir("./ads/cat1"))  mkdir("./ads/cat1");
    if(!is_dir("./ads/cat2"))  mkdir("./ads/cat2");
?>

<DOCTYPE! html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <p>
            3. Файлы
            a. Написать доску объявлений. Пользователь указывает свой
            email, текст объявления, заголовок объявления (форма),
            категория. Для хранения объявлений использовать файлы.<br/>

            i. Создать несколько папок категорий.<br/>

            ii. Необходимо чтобы на странице была форма с полями
            (email, выбор категории(название выше созданных
            папок), заголовок объявления и текст объявления,
            кнопка Добавить).<br/>

            iii. После формы список уже загруженных объявлений в
            виде таблички.<br/>

            iv. После того, как пользователь нажал кнопку “добавить”,
            необходимо создать новый текстовый файл
            категория/заголовок_объявления.txt, содержимое
            файла - Текст объявления.<br/>
        </p>
        <form action="Lab03-3.php" method="post">
            <textarea name="mail">Enter your email here</textarea>
            <textarea name="title">Enter your title here</textarea>
            <textarea name="description">Enter your description here</textarea>
            <?php
                $cats = array_diff(scandir("./ads"), array('..', '.'));
                echo "<select name='category'>";
                foreach($cats as $el)
                {
                    echo "<option>{$el}</option>";
                }
                echo "</select>";
            ?>
            <input type="submit" value="Add your ad">
            <?php
                if (!empty($_POST['mail']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['category']))
                {
                    $mail = $_POST['mail'];
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $category = $_POST['category'];

                    if(!is_dir("./ads/{$category}/{$mail}")) mkdir("./ads/{$category}/{$mail}");

                    if(!is_file("./ads/{$category}/{$mail}/{$title}"))
                    {
                        file_put_contents("./ads/{$category}/{$mail}/{$title}", $description);
                        echo nl2br("\nAd added successfully!");
                    }
                    else
                        echo nl2br("\nAd with this title already exists. Delete function is not implemented due to low financing");
                }
            ?>
        </form>
        <div>
            <table>
                <tr>
                    <th>E-mail</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                </tr>
                <?php
                    $cats = array_diff(scandir("./ads"), array('..', '.'));
                    foreach($cats as $cat)
                    {
                        $mails = array_diff(scandir("./ads/{$cat}"), array('..', '.'));
                        foreach($mails as $mail)
                        {
                            $titles = array_diff(scandir("./ads/{$cat}/{$mail}"), array('..', '.'));
                            foreach($titles as $title)
                            {
                                echo "<tr>";
                                echo "<td>{$mail}</td>";
                                echo "<td>{$title}</td>";
                                echo "<td>{$cat}</td>";
                                $description = file_get_contents("./ads/{$cat}/{$mail}/{$title}");
                                echo "<td>{$description}</td>";
                                echo "</tr>";
                            }
                        }
                    }
                ?>
            </table>
        </div>
        <form action="index.php" method="post">
            <input type="submit" value="Back">
        </form>
    </body>
</html>