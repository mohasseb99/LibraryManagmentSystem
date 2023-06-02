<?php

class Encrypt{
    public static function Encrypt($word , $key){

        $enc="";
        for($i=0; $i<strlen($word); $i++){
           
            $enc=$enc.chr((ord($word[$i]) +$key));
        }

        return $enc;
    }

    public static function Decrypt($word , $key){

        $enc="";
        for($i=0; $i<strlen($word); $i++){
           
            $enc=$enc.chr((ord($word[$i]) - $key));
        }

        return $enc;
    

    }
}

$sentence="I love egypt";
$enc=Encrypt::Encrypt($sentence,5);
echo $enc;
$dec=Encrypt::Decrypt($enc,5);
echo $dec;
?>