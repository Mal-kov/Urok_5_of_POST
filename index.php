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

$news=  explode("\n", $x);
//print_r($news);


one_news($news);




//switch ($_GET){
//    case ($news [$_GET['id']] = 0 || $news [$_GET['id']]<8): 
//    {
//        one_news($news);
//    }
//    break;
//    case ($news [$_GET['id']]>8):
//    {
//        all_news($news);
//    }
//    break;
//    case ($_GET['id'] == FALSE):
//    {
//        echo 'Тут должна быть ошибка 404';
//    }
//}
     


//all_news($news);
//if ($_GET['id'] == TRUE){
    
//}
//$id= ($news[$_GET['id']);

//echo $news [$_GET['id']];


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
  
 
    

    function one_news($news){
        $n = $_GET['id'];
        echo "<table border=1>
                <tbody>
                <tr align=center>
                <td>№</td>
                <td>Новость</td></tr>";
        echo"<tr align=center>
                <td>",$n,"</td>
                <td>",($news [$_GET['id']]),"</td></tr>";
    
    }






//foreach ($bd as $keys => $param){
       // unit($param['осталось на складе'], $param['количество заказано'], $param['цена']);
       // diskont($param['diskont']);
        //$itog_cena = $tovar*$param['цена']*$price;
         //echo"<tr align=center>
          //    <td>$n</td>
           //     <td>$keys</td>
           //     <td>",$param['цена'],"</td>
           //     <td>",$skidka,"0%</td>
           //     <td>",$param['цена']*$price,"</td>
           //     <td>",$param['количество заказано'],"</td>
           //     <td>",$param['осталось на складе'],"</td>
           //     <td>",$itog_cena,"</td></tr>";
        //$n=$n+1;
        //$total_price = $total_price + $itog_cena;
        //$itog_tovar = $itog_tovar + $tovar;
        //$itog_zakaz_total += $itog_zakaz ;
        
        
//}
//echo "<table><tbody>
//        <tr><td>ИТОГО по заказу:</td><td>- наименований: ",$n-1," </td></tr>
//        <tr><td></td><td>- всего единиц товара заказано: $itog_zakaz_total шт. </td></tr>
 //       <tr><td></td><td>- всего единиц товара к выдаче: $itog_tovar шт. </td></tr>
 //       <tr><td></td><td>- СУММА к оплате: $total_price руб.</td></tr>
 //       </tbody></table>";

//echo "<h2><b>Итого :</b><h2>","<br>";
//echo 'Общее кол-во товара к выдаче = ', $itog_tovar, "\n" ;
//echo 'На сумму = ', $total_price , "\n";
?>