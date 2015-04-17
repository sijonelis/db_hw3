<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/17/2015
 * Time: 12:40 PM
 */

namespace DB_ND3;


class RandomGenerator {
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}