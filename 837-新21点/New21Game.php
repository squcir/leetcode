<?php

require_once "../Solution.php";

/**
 * @link https://leetcode-cn.com/problems/new-21-game/
 */
class New21Game extends Solution {

    /**
     * @param integer $N
     * @param integer $K
     * @param integer $W
     * @return float
     */
    public function invoke($N, $K, $W) {
        $dp = [];
        $bound = min($N, $K+$W-1);

        /**
         * K <= x <= min(N, K+W-1) dp(x)=1
         * x > min(N,K+W-1) dp(x)=0
         */
        for($i=$K; $i<=$bound; $i++) {
            $dp[$i] = 1;
        }
        for ($i=$bound+1; $i<$K+$W; $i++) {
            $dp[$i] = 0;
        }

        /**
         * dp(x)=(dp(x+1)+dp(x+2)+...+dp(x+w))/w
         */
        $sum = $bound-$K+1;
        $dp[$K-1] = round($sum/$W, 5);

        $i = $K-2;
        while ($i >= 0) {
            $sum = $sum - $dp[$i+$W+1] + $dp[$i+1];
            $dp[$i] = round($sum/$W, 5);
            $i--;
        }

        /** dp[0] */
        return $dp[0];
    }

}


//echo (new New21Game())->invoke(10, 1, 10);
//echo (new New21Game())->invoke(6, 1, 10);
//echo (new New21Game())->invoke(21, 17, 10);
