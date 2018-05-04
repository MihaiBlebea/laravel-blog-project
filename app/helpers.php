<?php

if(!function_exists('public_upload_path'))
{
    function public_upload_path($file) {
        return env('APP_URL') . '/uploads/' . $file;
    }
}
