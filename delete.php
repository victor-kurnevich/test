<?php
if (isset($_POST['delete'])){
    $delInd=$_POST['deleteRow'];
    if (file_exists('user.txt'))
    {
        $strdel=  file('user.txt');
        foreach ($strdel as $key => $value) { 
       unset($strdel[$delInd]);
        }     
        //запись элементов массива в файл
        file_put_contents('user.txt', $strdel);
        }
}
 ?>

