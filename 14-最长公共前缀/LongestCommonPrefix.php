<?php

require '../Solution.php';

/**
 * @link https://leetcode-cn.com/problems/longest-common-prefix/
 * @me
 */
class LongestCommonPrefix extends Solution
{

    /**
     * @param string[] $strs
     * @return string
     */
    public function invoke($strs)
    {
        if (empty($strs)) {
            return '';
        }

        if (($c = count($strs)) == 1) {
            return $strs[0];
        }

        $min = PHP_INT_MAX;
        foreach ($strs as $str) {
            $min = min(strlen($str), $min);
        }

        if ($min == 0) {
            return '';
        }

        $prefix = '';
        for ($i=0; $i<$min; $i++) {
            $l = $strs[0][$i];
            for ($j=1; $j<$c; $j++) {
                if ($strs[$j][$i] != $l) {
                    break 2;
                }
            }
            $prefix .= $l;
        }
        return $prefix;
    }

}

var_dump((new LongestCommonPrefix())->invoke(["flower","flow","flight"]));
var_dump((new LongestCommonPrefix())->invoke(["dog","racecar","car"]));