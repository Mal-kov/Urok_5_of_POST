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
        $n = $_GET['id'];
        echo "<table border=1>
                <tbody>
                <tr align=center>
                <td>№</td>
                <td>Новость</td></tr>";
        echo"<tr align=center>
                <td>",$n,"</td>
                <td>",($news [$_GET['id']-1]),"</td></tr>";
    
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

    
if (isset($_GET['id']) == TRUE){
    $n= (int)$_GET['id'];
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
}elseif (isset($_GET['id']) == FALSE){
    header("HTTP/1.0 404 Not Found"); 
    header("HTTP/1.1 404 Not Found"); 
    header("Status: 404 Not Found"); 
    die();                   // echo header("HTTP/1.0 404 Not Found");
}else {
    all_news($news); 
}

?>