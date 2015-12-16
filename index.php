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
    $bd['игрушка детская велосипед']['diskont'] = 'diskont3';
}
$itog_cena=array();
$itog_tovar=0;
$total_price=0;


function unit($ostatok, $zakaz, $cena){
    global $tovar, $itog_tovar;
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
    $itog_tovar = $itog_tovar + $tovar;
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
                    echo 'Скидка на товар составляет 30 %'. "\n";
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
        $total_price = $total_price + $itog_cena;    
}

echo "\n", 'Итого :', "\n";
echo 'Общее кол-во товара к выдаче = ', $itog_tovar, "\n" ;
echo 'На сумму = ', $total_price , "\n";
?>