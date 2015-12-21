<meta charset="utf8" />
<?php

$x='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';

$news= explode("\n", $x );

 function one_news($news){
        $n = $_POST['id'];
        echo "<table border=1>
                <tbody>
                <tr align=center>
                <td>№</td>
                <td>Новость</td></tr>";
        echo"<tr align=center>
                <td>",$n,"</td>
                <td>",($news [$_POST['id']-1]),"</td></tr>";
    
    }




    function all_news($news){
        echo "<table border=1>
                <tbody>
                <tr align=center>
                <td>№</td>
                <td>Новость</td></tr>";
    
    foreach ($news as $keys => $param){
        echo"<tr align=center>
                <td>",$keys+1,"</td>
                <td>",$param,"</td></tr>";
    }
    }

    
if (isset($_POST['id']) == TRUE){
    $n= (int)$_POST['id'];
    switch ($n){
        case ($n == 0): 
        {
            all_news_news($news);
        }
        break;
        case ($n >= 1 and $n <= 9): 
        {
            one_news($news);
        }
        break;
        default : 
        {
            all_news($news);
        }
        break;
    }
}elseif (isset($_POST['id']) == FALSE){
    print_r(header("HTTP/1.0 404 Not Found"));
}

?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>NEWS</title>
 </head>
 <body>

     <form method="POST">
  <p><b>Какая новость Вас интересует? &quot;ОС&quot;?</b></p>
  <p>
      <input type="text" name="id" value="">
  </p>
  <p><input type="submit"></p>
 </form>

 </body>
</html>
