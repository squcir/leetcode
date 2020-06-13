<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/climbing-stairs/
 * @me
 */
class ClimbStairs extends Solution
{

    /**
     * f(n) = f(n-1) + f(n-2)
     *
     * @param integer $n
     * @return integer
     */
    public function invoke($n)
    {
        if ($n <= 2) {
            return $n;
        }

        $a = 1;
        $b = 2;

        while ($n-- > 2) {
            $t = $a + $b;
            $a = $b;
            $b = $t;
        }

        return $t;
    }
}