<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/3sum/
 */
class ThreeSum extends Solution
{

    /**
     * @param integer[] $nums
     * @return integer[][]
     */
    public function invoke($nums)
    {
        sort($nums);

        $c = count($nums);
        $result = [];

        foreach ($nums as $k => $num) {
            if (isset($first) && $num == $first) {
                continue;
            }

            if ($num>0) {
                break;
            }

            $first = $num;
            $j = $c-1;
            for ($i=$k+1; $i<$j; ) {
                $ps = $nums[$i];
                while (($sum=$nums[$i]+$nums[$j]+$first)>0 && $i<$j) {
                    $j--;
                }

                //错误点
                if ($i>=$j) {
                    break;
                }

                if ($sum == 0) {
                    $result[] = [$first, $nums[$i], $nums[$j]];
                    $pt = $nums[$j];
                    do {
                        $j--;
                    } while ($i<$j && $pt == $nums[$j]);

                }

                do {
                    $i++;
                } while($i<$j && $ps == $nums[$i]);
            }
        }
        return $result;
    }

}

//var_dump((new ThreeSum())->invoke([-1, 0, 1, 2, -1, -4]));

//错误样例
//var_dump((new ThreeSum())->invoke([0,0,0,0,0]));
//var_dump((new ThreeSum())->invoke([1,2,-2,-1]));
var_dump((new ThreeSum())->invoke([-2,0,1,1,2]));