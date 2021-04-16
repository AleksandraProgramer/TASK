<?php 
//var_dump($_POST);

// присваеваем переменным данные
$sposob = $_POST['select1'];
$geografia = $_POST['select2'] ;
$ves = $_POST['select3'];

// умножающий коэфициент
$koificient = array("1", "1.2", "1.5", "2");

// умножаем коэфициент на вес
 for($i = 0; $i < count($koificient); $i++)
 {
	 // собираем в массив перемноженный вес
	$ves_tovara[$i] = $koificient[$i] * $ves;
 }


// хранение данных
$arr_bd = array($sposob, $geografia, $ves, $koificient, $ves_tovara);


// выводим отладку данных
var_dump($arr_bd);

?>