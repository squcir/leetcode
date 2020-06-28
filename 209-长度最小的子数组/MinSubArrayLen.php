<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/minimum-size-subarray-sum/
 */
class MinSubArrayLen extends Solution
{

    /**
     * @param integer $s
     * @param integer[] $nums
     * @return integer
     */
    public function invoke($s, $nums)
    {
        $count = count($nums);
        if ($count == 0) {
            return 0;
        }

        $ans = PHP_INT_MAX;
        $sum = 0;
        $i = $j = 0;

        while ($j < $count) {
            $sum += $nums[$j];
            while ($sum >= $s) {
                $ans = min($ans, $j-$i+1);
                $sum -= $nums[$i];
                $i++;
            }
            $j++;
        }

        return $ans == PHP_INT_MAX ? 0 : $ans;
    }

}