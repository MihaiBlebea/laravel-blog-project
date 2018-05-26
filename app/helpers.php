<?php


if(!function_exists('random'))
{
    function random($length = null)
    {
        if(!$length)
        {
            $length = 8;
        }
        return str_random($length);
    }
}

if(!function_exists('isOdd'))
{
    function isOdd(Int $number)
    {
        return (bool) $number % 2 !== 0;
    }
}

if(!function_exists('curl'))
{
    function curl($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        curl_setopt($ch, CURLOPT_URL, $url);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
