<?php

require_once "../Solution.php";

/**
 * @link https://leetcode-cn.com/problems/product-of-array-except-self/
 */
class ProductExceptSelf extends Solution {

    /**
     * @param array $nums
     * @return array
     */
    public function invoke($nums) {
        /**
         * 空间复杂度 O(n)
         */
//        $count = count($nums);
//
//        $L = $R = [];
//        $L[0] = 1;
//        for ($i=1;$i<$count;$i++) {
//            $L[$i] = $L[$i-1] * $nums[$i-1];
//        }
//        $R[0] = 1;
//        for ($i=1;$i<$count;$i++) {
//            $R[$i] = $R[$i-1] * $nums[$count-$i];
//        }
//
//        $result = [];
//        for ($i=0;$i<$count;$i++) {
//            $result[$i] = $L[$i] * $R[$count-1-$i];
//        }
//
//        return $result;

        /**
         * 空间复杂度 O(1)
         */
        $count = count($nums);

        $result = [0 => 1];
        for ($i=1;$i<$count;$i++) {
            $result[$i] = $result[$i-1] * $nums[$i-1];
        }

        $multi = 1;
        for ($i=$count-1;$i>=0;$i--) {
            $result[$i] *= $multi;
            $multi *= $nums[$i];
        }

        return $result;
    }

}

var_dump((new ProductExceptSelf())->invoke([1,2,3,4]));