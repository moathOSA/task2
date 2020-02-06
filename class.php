
<?php

class Hamming
{
    //to check if the string a and b have the same length
    private static function checkString($a, $b)
    {
        return strlen($a) == strlen($b);
    }

    // hamming code
    public static function checkHamming($a, $b)
    {
        $i = 0;
        $count = 0;
        // to check  if there is value in the field
        if (!(self::checkString($a, $b))) throw new ErrorException('both string must be the same length');
        while (isset($a[$i]) != '') {
            if ($a[$i] != $b[$i])
                $count++;
            $i++;
        }
        return $count;

    }
}

class Levenshtein
{


//    //to check if the string a and b have the same length
//private  static function CheckString($a,$b){
//    return strlen($a)==strlen($b);
//
//
//}
    // levenshtein code
    public static function checkLevenshtein($a, $b)
    {

        $arr = array();

        for ($i = 0; $i < strlen($a); $i++) {
            $s = array();
            for ($j = 0; $j < strlen($b); $j++) {
                $s[$j] = 0;
            }
            $arr[$i] = $s;
        }
        for ($i = 0; $i < strlen($a); $i++) {
            for ($j = 0; $j < strlen($b); $j++) {
                if ($i == 0 || $j == 0) {
                    if ($i == 0) $arr[$i][$j] = $j;
                    else if ($j == 0) $arr[$i][$j] = $i;
                    continue;
                }
                if ($a[$i] == $b[$j]) $arr[$i][$j] = $arr[$i - 1][$j - 1];
                else $arr[$i][$j] = min($arr[$i - 1][$j], $arr[$i][$j - 1], $arr[$i - 1][$j - 1]) + 1;

            }

        }
        //return the number of steps
        return $arr[strlen($a) - 1][strlen($b) - 1];


    }

}
