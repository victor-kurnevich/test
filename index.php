<?php
//сессия на подсчет нажатой кпопки
session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    $_SESSION['count'] ++;
}
include 'delete.php';
//добавление элементов в таблицу
if (isset($_POST['save_user'])) {
    if (file_exists('user.txt')) {
        if ("{$_POST['usname']} {$_POST['uspass']}"){
        file_put_contents('user.txt', "{$_POST['usname']} {$_POST['uspass']}\n", FILE_APPEND);
    }
    }
}
//удаление элемента из массива 



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="post">
            user <input type="text" value name="usname" > 
            <p> password <input type="password" name="uspass" ></p>
            <input type='submit' value="Сохранить" name="save_user" >

        </form>
        <p>Кнопку сохранить нажали=<?php echo $_SESSION['count'] ?> </p> 
        <p>Таблица пользователей</p>
        <table border="2"  cellpading="5" width="400">
            <tr>
                <td>User</td>
                <td>Password </td>
                <td>Delete</td>
            </tr>
            <tr>           
                <?php
                // вывод данных в таблицу 
                if (file_exists('user.txt')) {
                    $str = file('user.txt');
                    foreach ($str as $key => $value) {
                        $dl = explode(' ', $value);
//кнопка удалить
                        echo "<tr><td>{$dl[0]}</td><td>{$dl[1]}</td><td>"
                        . "<form action='index.php' method='post'> "
                        . "<input type='hidden' name='deleteRow' value='$key'>"
                        . "<input type='submit' name='delete' value='удалить'>"
                        . "</form></td></tr>";
                    }
                }             
                ?>
            </tr>
        </table>    
    </body>
</html>
