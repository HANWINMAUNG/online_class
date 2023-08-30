<?php

if(!function_exists('checkPermission')){
    function checkPermission($permission){
        return auth()->guard('admin')->user()->can($permission);
    }
}

if(!function_exists('uploadFile')){
    function uploadFile($file, $path)
    {
        $file_name = uniqid() . '_' . date('Y-m-d-H-i-s') . '_' . $file->getClientOriginalName();

        $file->move($path, $file_name);//move(path,filename)

        return $file_name;
    }
}