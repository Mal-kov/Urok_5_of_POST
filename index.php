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


function diskont($bd){
    global $discont;
    static $skidka, $cena, $tovar;
    echo "<h1>Корзина: </h1> 
        <tables>
        <thead>
            <td> Наименование товара</td>
            <td> Цена </td>
            <td> Скидка</td>
            <td> Цена с учетом скидки</td>
            <td> Заказ</td>
            <td> Остаток на складе</td>
            <td> Кол-во товара к выдаче</td>
        </thead>";
    
        
    foreach ($bd as $keys => $param){
        echo "<tr><td>". $keys . "</td";
        
        $unit= diskont ($param['цена'], $param['количество заказано'], $param['discont']);
        
        if ($param['количество заказано']!==0){
            echo "<td>", $param['цена'], "</td>
                <td>" ,$unit['diskont']*10, " % </td>
                <td>" ,$unit['цена']*$skidka, " </td>
                <td>" ,$param['количество заказано'], " </td>
                <td>" ,$param['осталось на складе'], " </td>
                <td>" ,$tovar, " % </td>";
        }  else {
            echo "<td>", $param['цена'], "</td>
                <td>" , 0 , " </td>
                <td>" , 0 , " </td>
                <td>" , 0 , " </td>
                <td>" , 0 , " </td>
                <td>" , 0 , " </td>";
        }
    
        if ($param['осталось на складе'] >= $param['количество заказано'] ){
                $cena = $param['цена']*$param['количество заказано'];
                $tovar = $param['количество заказано'];
            }elseif ($param['осталось на складе'] < $param['количество заказано']) {
                $cena = $param['цена']*$param['осталось на складе'];
                $tovar = $param['осталось на складе'];
            }else{
                echo 'Ошибка определения кол-ва товара ';
            } 
       
        
            
        $discont= preg_replace("/[^0-3]", $param['discont']);
            switch ($discont){
                case 0:
                    $skidka=1;
                    break;
                case 1:
                    $skidka=0.9;
                    break;
                case 2:
                    $skidka=0.8;
                    break;
                case 3:
                    $skidka=0.7;
                    break;
                default :
                    echo 'Ошибка расчета дисконта';
            }
    
        $prise= $skidka*$cena;
    }
}    
    
 diskont($bd);   
echo "<h2>Итого:</h2>";








?>
