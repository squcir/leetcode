<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/ba-shu-zi-fan-yi-cheng-zi-fu-chuan-lcof/
 * @me Y
 */
class TranslateNum extends Solution
{

    /**
     * @param integer $num
     * @return integer
     */
    public function invoke($num)
    {
        $num = (string)$num;
        $c = strlen($num);

        $x = 1; $y = 1;
        if ($c == 1) {
            return $y;
        }

        for ($i=1; $i<$c; $i++) {
            if ((int)($num[$i-1].$num[$i]) <= 25 && $num[$i-1]!=0) {
                $t = $y + $x;
            } else {
                $t = $y;
            }
            $x = $y;
            $y = $t;
        }
        return $t;
    }

}

echo (new TranslateNum())->invoke(12258);