 <meta charset="utf8" />
<?php
$ini_string='
[игрушка мягкая мишка белый]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[одежда детская куртка синяя синтепон]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[игрушка детская велосипед]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
';
$bd = parse_ini_string($ini_string, true);
//print_r($bd);

echo "<br>";
echo "<b>Корзина:</b>","<br>";

if($bd['игрушка детская велосипед']['количество заказано']>=3) {
    $bd['игрушка детская велосипед']['diskont'] = 'diskont3';
    echo "<body><p> Внимание, акция! Вы заказил товар 'игрушка детская велосипед' в кол-ве 3 шт. или более<br>
            Вам предоставляется скидка 30% на этот товар.</p> ";
}
$itog_cena=array();
$itog_tovar=0;
$itog_zakaz_total=0;
$total_price=0;
$n=1;


function unit($ostatok, $zakaz){
    global $tovar, $itog_zakaz;
    if ($ostatok==0){
            //echo 'Уведомление: К сожалению данного товара сейчас нет на складе',"<br>";
            $tovar=0;
        }elseif ($ostatok < $zakaz){
            //echo 'Уведомление: Товар доступен в кол-ве: ', $ostatok,' шт., ', 'по цене: ',$cena, ' руб. за шт.',"<br>";
            $tovar=$ostatok;
        }elseif ($ostatok >= $zakaz){
            //echo 'Товар доступен в кол-ве: ', $zakaz, ' шт., ', 'по цене: ',$cena, ' руб. за шт.',"<br>";
            $tovar=$zakaz;
        }else {
            echo 'Ошибка расчета товара';
        }
    $itog_zakaz=$zakaz; 
    
}

function diskont($diskont){
    global $price, $skidka;
    $skidka = substr($diskont, 7, 2);
        switch ($skidka){
                case 1:
                    $price=0.9;
                    //echo 'Скидка на товар составляет 10 %',"<br>";
                    break;
                case 2:
                    $price=0.8;
                    //echo 'Скидка на товар составляет 20 %',"<br>";
                    break;
                case 3:
                    $price=0.7;
                    //echo 'Скидка на товар составляет 30 %',"<br>";
                    break;
                default:
                    $price=1;
                    //echo 'Скидка на товар отсутствует',"<br>";
                    break;
                }
}

echo "<table border=1>
        <tbody>
            <tr align=center>
                <td>№</td>
                <td>Наименование<br>товара</td>
                <td>Цена<br>товара</td>
                <td>Скидка</td>
                <td>Цена<br>со скидкой</td>
                <td>Кол-во<br>заказано</td>
                <td>Наличие<br>на складе</td>
                <td>Сумма<br>фактич.</td></tr>";
  


foreach ($bd as $keys => $param){
        unit($param['осталось на складе'], $param['количество заказано'], $param['цена']);
        diskont($param['diskont']);
        $itog_cena = $tovar*$param['цена']*$price;
         echo"<tr align=center>
              <td>$n</td>
                <td>$keys</td>
                <td>",$param['цена'],"</td>
                <td>",$skidka,"0%</td>
                <td>",$param['цена']*$price,"</td>
                <td>",$param['количество заказано'],"</td>
                <td>",$param['осталось на складе'],"</td>
                <td>",$itog_cena,"</td></tr>";
        $n=$n+1;
        $total_price = $total_price + $itog_cena;
        $itog_tovar = $itog_tovar + $tovar;
        $itog_zakaz_total += $itog_zakaz ;
        
        
}
echo "<table><tbody>
        <tr><td>ИТОГО по заказу:</td><td>- наименований: ",$n-1," </td></tr>
        <tr><td></td><td>- всего единиц товара заказано: $itog_zakaz_total шт. </td></tr>
        <tr><td></td><td>- всего единиц товара к выдаче: $itog_tovar шт. </td></tr>
        <tr><td></td><td>- СУММА к оплате: $total_price руб.</td></tr>
        </tbody></table>";

//echo "<h2><b>Итого :</b><h2>","<br>";
//echo 'Общее кол-во товара к выдаче = ', $itog_tovar, "\n" ;
//echo 'На сумму = ', $total_price , "\n";
?>