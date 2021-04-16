<?php

// способ доставки
$sposob_dostavki = array("почтой", "курьером", "самовывоз");


// география доставки
$geografia_dostavki = array("Минск","Минский район","Минская область","Вся Беларусь");

// весовые пороги товара
$vesovie_porogi = array("1", "5", "15", "20");

?>

<html>
<head>
<title>Тестовое задание</title>
<style>

body {
    background: #f7f7f7;
    color: #b990da;
}

h1 {
    border-bottom: 1px solid #debef7;
}

.mydiv {
    justify-content: center;
    align-items: center;
    display: flex;    
}

.myform {
	display: inline-grid;
    border: 1px solid #eae7fb;
    padding: 15px;
    background: #fff;
    box-shadow: 0 1px 3px rgb(0 0 0 / 25%);
    border-radius: 9px;
    box-sizing: border-box;
}

.myfont {
    font-size: 20px;
    margin: 18px 26px 9px 0px;
}

.myselect {
    padding: 5px;
    color: #7c747d;
}

.mysend {
    width: 127px;
    padding: 8px;
    font-size: 15px;
    font-weight: 700;
    color: #6f889a;
    margin-top: 35px;
    cursor: Pointer;
}

.mybutton {
    text-align: center;
}

.red_error {
   border: 1px solid #e60f0f;
}

.red_access {
    border: 1px solid #dcb1b1;
}

</style>
<script type="text/javascript" language="javascript" src="jquery.js"></script>
<script type="text/javascript" language="javascript">

// Библиотека jquery

//--------------------------------------------


// валидация данных (функции)
function myvalid(id1, id2, id3) {
	
    var status = false;
    
    // получаем индефикатор элементов
    var i1 = document.getElementById(id1);
    var i2 = document.getElementById(id2);
    var i3 = document.getElementById(id3);
    
    // если поле пустое то подсвечиваем его
    if(i1.value === '') {
        i1.classList.add("red_error");
        status = false;
        alert("Выберите поле доставки!");
    }else{
        i1.classList.remove("red_error");
        i1.classList.add("red_access");
        status = true;
    }

    // если поле пустое то подсвечиваем его
    if(i2.value === '') {
        i2.classList.add("red_error");
        status = false;
        alert("Выберите поле географии!");
    }else{
        i2.classList.remove("red_error");
        i2.classList.add("red_access");
        status = true;
    }
    
    // если поле пустое то подсвечиваем его
    if(i3.value === '') {
        i3.classList.add("red_error");
        status = false;
        alert("Выберите поле тип веса!");
    }else{
        i3.classList.remove("red_error");
        i3.classList.add("red_access");
        status = true;
    }
    
	// если ошибок нет, то отправляем POST
	if(status === true)
	{
		myAjax(i1.value, i2.value, i3.value);
	}
	
    return status;
}

// отправка POST данных в файл 
function myAjax(data1, data2, data3){
	
    $.ajax({
        type: "POST",
        url: "details.php",
        data: {
			select1:data1, select2:data2, select3:data3
		},
      success: function(data) {
        console.log(data);
      },
      error: function() {
        alert('error my');
      }		   
    });
	
}

</script>
</head>
<body>

<!-- Интерфейс -->
<div class="mydiv">
<div class="myform"> 
<h1>Тестовое задание</h1>
	<label class="myfont">Выбор доставки</label>
	<select id="sposob_dostavki" class="myselect">
	    <option value="">Выберите тип доставки</option>
		<?php for($i = 0; $i < count($sposob_dostavki); $i++){ ?>
			<option value="<?php echo $sposob_dostavki[$i]; ?>"><?php echo $sposob_dostavki[$i]; ?></option>
		<?php } ?>
	</select>

	<label class="myfont">География доставки</label>
	<select id="geografia_dostavki" class="myselect">
	    <option value="">Выберите регион доставки</option>
	   <?php for($j = 0; $j < count($geografia_dostavki); $j++){?>
			<option value="<?php echo $geografia_dostavki[$j]; ?>"><?php echo $geografia_dostavki[$j]; ?></option>
	   <?php } ?>
	</select>

	<label class="myfont">Весовые пороги товара (кг)</label>
	<select id="vesovie_porogi" class="myselect">
	    <option value="">Выберите тип веса</option>
	   <?php for($k = 0; $k < count($vesovie_porogi); $k++){?>
			<option value="<?php echo $vesovie_porogi[$k]; ?>"><?php echo $vesovie_porogi[$k]; ?></option>
	   <?php } ?>
	</select>
	<div class="mybutton">
	    <button class="mysend" onclick="return myvalid('sposob_dostavki', 'geografia_dostavki', 'vesovie_porogi');">Отправить</button>
	</div>
</div>
</div>

</body>
</html>