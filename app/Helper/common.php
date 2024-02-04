<?php

function uploadImage($fileName, $width, $height, $imgFile, $upload_path = "uploads/common")
{
    $originalName = $fileName->getClientOriginalName();
    $modifiedName = time() . rand(1000, 9999) . $originalName;
    $destinationPath = public_path($upload_path);
    if (!file_exists($destinationPath)) {
        $fileName->move($destinationPath, $modifiedName);
    }
    $imgFile->resize($width, $height)->save($destinationPath . '/' . $modifiedName);
    return $upload_path . '/' . $modifiedName;
}

function fileUnlink($file = '')
{
    if (!empty($file)) {
        if (file_exists(public_path($file))) {
            unlink(public_path($file));
        }
    }
}

function random_strings($length_of_string)
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(
        str_shuffle($str_result),
        0,
        $length_of_string
    );
}

function verificationCode()
{
    return random_int(100000, 999999);
}

?>