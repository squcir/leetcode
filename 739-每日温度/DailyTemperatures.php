<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/daily-temperatures/
 * @me
 */
class DailyTemperatures extends Solution
{

    protected static $stack = [];

    /**
     * @param integer[] $T
     * @return integer[]
     */
    public function invoke($T)
    {
        $result = [];

        $head = 0;
        foreach ($T as $k => $v) {
            $result[$k] = 0;
            if (empty(self::$stack)) {
                self::$stack[$head++] = $k;
            } elseif ($T[self::$stack[$head-1]]>=$v) {
                self::$stack[$head++] = $k;
            } else {
                do {
                    $result[self::$stack[$head-1]] = $k - self::$stack[$head-1];
                    $head--;
                } while ($head > 0 && $T[self::$stack[$head-1]] < $v);
                self::$stack[$head++] = $k;
            }
        }

        if (!empty(self::$stack)) {
            for ($i=0; $i<$head; $i++) {
                $result[self::$stack[$i]] = 0;
            }
        }

        return $result;
    }

}


//var_dump(implode( (new DailyTemperatures())->invoke([73, 74, 75, 71, 69, 72, 76, 73]) ,','));
var_dump(implode( (new DailyTemperatures())->invoke([89,62,70,58,47,47,46,76,100,70]) ,','));