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
print_r($bd);

if($bd['игрушка детская велосипед']['количество заказано']>=3) {
    $bd['игрушка детская велосипед']['diskont'] = 3;
}
$itog_cena=array();
$itog_tovar=array();


function unit($ostatok, $zakaz, $cena){
    global $tovar;
    if ($ostatok==0){
            echo 'Уведомление: К сожалению данного товара сейчас нет на складе',"\n";
            $tovar=0;
        }elseif ($ostatok < $zakaz){
            echo 'Уведомление: Товар доступен в кол-ве: ', $ostatok,' шт., ', 'по цене: ',$cena, ' руб. за шт.', "\n";
            $tovar=$ostatok;
        }elseif ($ostatok >= $zakaz){
            echo 'Товар доступен в кол-ве: ', $zakaz, ' шт., ', 'по цене: ',$cena, ' руб. за шт.', "\n";
            $tovar=$zakaz;
        }else {
            echo 'Ошибка расчета товара';
        }
}

function diskont($diskont){
    global $price;
    $skidka = substr($diskont, 7, 2);
        switch ($skidka){
                case 1:
                    $price=0.9;
                    echo 'Скидка на товар составляет 10 %'. "\n";
                    break;
                case 2:
                    $price=0.8;
                    echo 'Скидка на товар составляет 20 %'. "\n";
                    break;
                case 3:
                    $price=0.7;
                    echo 'Скидка на товар составляет 20 %'. "\n";
                    break;
                default:
                    $price=1;
                    echo 'Скидка на товар отсутствует'. "\n";
                    break;
                }
}



foreach ($bd as $keys => $param){
            echo  $keys. "\n";
            unit($param['осталось на складе'], $param['количество заказано'], $param['цена']);
            diskont($param['diskont']);
            echo 'стоимость товара составит = ', $itog_cena = $tovar*$param['цена']*$price, "\n", "\n";
            $itog_tovar += $tovar;
           
}

echo "\n", 'Итого :', "\n";
echo 'Общее кол-во товара к выдаче = ', $itog_tovar ;




function basket($bd){
    global $tovar, $skidka;
        foreach ($bd as $keys => $param){
            $diskount= diskount($param['цена'], $param['количество заказано'], $param['discont']);
            echo  $keys;
            echo 'Стоимость за единицу товара', $param['цена'],"\n",
                 'Ваша скидка составила' ,$diskount['skidka']*10,
                 ' ' ,$diskount['price']*$skidka, " </td>
                <td>" ,$param['количество заказано'], " </td>
                <td>" ,$param['осталось на складе'], " </td>
                <td>" ,$tovar, "</td></tr>";
        }
    if ($param['осталось на складе'] >= $param['количество заказано'] ){
                $tovar = $param['количество заказано'];
            }else {
                //$cena = $param['цена']*$param['осталось на складе'];
                $tovar = $param['осталось на складе'];
            }
        //return $cena; 
    
}

function diskount ($price, $zakaz, $diskont){
    $skidka = substr($diskont, 7, 2);
    $price_with_discont= $price - ($price*($skidka*10)/100);
    $total_prise_all= $zakaz * $price_with_discont;
    
    return array('skidka' => $skidka, "0%",
                'price' => $price_with_discont,
                'price_total' => $total_prise_all);
    
}

?>