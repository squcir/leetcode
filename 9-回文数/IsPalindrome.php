<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/palindrome-number/
 * @me
 * @part
 */
class IsPalindrome extends Solution
{

    /**
     * @param integer $x
     * @return boolean
     */
    public function invoke($x)
    {
        //转string
//        $x = (string) $x;
//        $c = strlen($x);
//
//        for ($i=0,$j=$c-1; $i<=$j; $i++,$j--) {
//            if ($x[$i]!=$x[$j]) {
//                return false;
//            }
//        }
//        return true;

        //反转所有数字(可能会超过int最大值，不对)
        if ($x < 0) {
            return false;
        }

        $ix = $x; $t = 0;
        do {
            $a = $x % 10;
            $x = ($x - $a) / 10;
            $t = $t * 10 + $a;
        } while($x != 0);

        return $t == $ix;

        // 反转一半
    }

}

var_dump((new IsPalindrome())->invoke(121));
var_dump((new IsPalindrome())->invoke(-121));
var_dump((new IsPalindrome())->invoke(10));