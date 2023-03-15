<?php

/**
 * @category     Php-SQL
 * @package      Php
 * @author       Ali Eltahan <info@alieltahan.com>
 */

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF): bool
    {
        $value  = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

}