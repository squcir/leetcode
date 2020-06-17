<?php

require '../Solution.php';

class MaxProfit extends Solution
{

    /**
     * 对于第j天卖出，买入的时机一定是历史最低
     *
     * @param integer[] $prices
     * @return integer
     */
    public function invoke($prices)
    {
        $count = count($prices);
        if ($count < 2) {
            return 0;
        }

        $historyMin = $prices[0];
        $maxProfit = 0;
        for ($i=1; $i<$count; $i++) {
            $historyMin = min($historyMin, $prices[$i-1]);
            if ($historyMin < $prices[$i]) {
                $maxProfit = max($maxProfit, $prices[$i]-$historyMin);
            }
        }
        return $maxProfit;
    }

}

var_dump((new MaxProfit())->invoke([7,1,5,3,6,4]));
var_dump((new MaxProfit())->invoke([7,6,4,3,1]));