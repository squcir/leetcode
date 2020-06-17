<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/best-sightseeing-pair/
 */
class MaxScoreSightseeingPair extends Solution
{

    /**
     * score = (A[i] + i) + (A[j] - j)
     * 对于固定j, A[i]+i 取历史最大
     *
     * @param integer[] $A
     * @return integer
     */
    public function invoke($A)
    {
        $AI = 0;
        $count = count($A);
        $score = 0;

        for($i=1; $i<$count; $i++) {
            $AI = max($AI, $A[$i-1]+$i-1);
            $score = max($score, $AI + $A[$i]-$i);
        }
        return $score;
    }

}

var_dump((new MaxScoreSightseeingPair())->invoke([8,1,5,2,6]));