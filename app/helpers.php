<?php

if(!function_exists('public_upload_path'))
{
    function public_upload_path($file = null)
    {
        if($file == null)
        {
            return 'https://s3.amazonaws.com/FringeBucket/default-user.png';
        }
        return env('APP_URL') . '/uploads/' . $file;
    }
}

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
