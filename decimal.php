<?php
/**
 * Created by PhpStorm.
 * User: user_00
 * Date: 15-10-24
 * Time: 上午11:18
 */

 if(bcscale(8)){
    echo "decimal = 8 \r\rn";

 }

$dec1 = 13456.61200089;
$dec2 = 0.00000001;



echo "\r\n";
echo "dec1 typeof: ". gettype( $dec1);echo "\r\n";
echo "dec2 typeof: ". gettype( $dec2);echo "\r\n";


$dec3 = $dec1."";
$dec4 = $dec2."";

echo "\r\n";
echo "dec3 typeof: ". gettype( $dec3);echo "\r\n";
echo "dec4 typeof: ". gettype( $dec4);echo "\r\n";
echo "$dec3";echo "\r\n";
echo "$dec4";

$dec6 = bcadd($dec3 , $dec4);
echo "\r\n";
echo "dec6 : ". ( $dec6);echo "\r\n";
echo "$dec1";echo "\r\n";
echo "$dec2";
$dec5 = $dec1 + $dec2;
echo "\r\n";
echo "dec5 : ". ( $dec5);echo "\r\n";



























