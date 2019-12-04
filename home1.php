<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" >
<title>Журналы</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="shortcut icon" type="x-icon">
</head>
 
<body style="background-image:url(images/fon.jpg)" width="100%" >

	<div id="header">
	   <h1>Современные журналы</h1>
	</div>
		 
	<div id="mainmenu">
	    <ul>
		  <li><a href="home.php" >Главная</a></li>
          <li><a href="home1.php" >Добавить информацию</a></li>
	      <li><a href="home2.php">Просмотр сведений</a></li>
	    </ul>
	</div>	
	
	<div class="ar">
	  <form name="vvod" action="home1.php" method="post" class="railway">
		<div class="form-group">
		<p>Жанр:
			<?
			$mysqli = mysqli_connect("localhost", "root", "", "db_jurnali");
			$sql = mysqli_query($mysqli, "SELECT * FROM janr");?>
			<select name="id_genre" id="genre">
			<?while($row = mysqli_fetch_assoc($sql)) {?>
				<option value="<?=$row['id']?>"><?=$row['genre']?></option>
<?}
?>
</select>
</p>
		
		<p>
			Название журнала: <input type="text" name="name" required>
		</p>
		<p>
			Номер журнала: <input type="number" name="number" required>
		</p>
		<p>
			Количество страниц: <input type="number" name="stranic" required>
		</p>
		<p>
			Издательство: <input type="text" name="izdatelstvo" required>
		</p>
		<p>
			Год издания: <input type="number" min="1800" max="2019" name="god" required/>
		</p>
		</div>
    <div class="submit-button">
      <i class="fa fa-train" aria-hidden="true"></i><br>
      <input type="submit" name="vvod" value ="Отправить" />
    </div>
</form>
</div>
	
	
	<?php
	if (isset($_POST['vvod'])){
	
    // Переменные с формы
	$id_genre = $_POST['id_genre'];
    $name = $_POST['name'];
	$number = $_POST['number'];
    $stranic = $_POST['stranic'];
	$izdatelstvo = $_POST['izdatelstvo'];
    $god = $_POST['god'];
	
	// Подключение к базе данных
    $mysqli = mysqli_connect("localhost", "root", "", "db_jurnali");

    // Если есть ошибка соединения, выводим её и убираем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	// Проверка на совпадения, имеется ли журнал с такими данными из формы или нет
	$res = mysqli_query($mysqli,"SELECT * FROM `tb_jurnal` WHERE `id_genre` LIKE '%" . $id_genre .  "%' AND `name` LIKE '%" . $name .  "%' AND `number` LIKE '%" . $number .  "%' AND `stranic` LIKE '%" . $stranic .  "%' AND `izdatelstvo` LIKE '%" . $izdatelstvo .  "%' AND `god` LIKE '%" . $god .  "%'");
	if( mysqli_num_rows( $res ) == 1 ){
		echo "Данные о журнале уже есть!";
	}
	
	// Добавление данных в базу
			else {
			$result = mysqli_query($mysqli, "INSERT INTO `tb_jurnal` (`id_genre`,`name`, `number`, `stranic`, `izdatelstvo`, `god`) VALUES ('$id_genre','$name', '$number', '$stranic', '$izdatelstvo', '$god')");
				if ($result == true){
					echo "Информация занесена в базу данных";
				}else{
					echo "Информация не занесена в базу данных";
				}
				// закрываем соединение с сервером  базы данных
				$mysqli -> close();
			}
	}
	
?>
</body>
</html>

