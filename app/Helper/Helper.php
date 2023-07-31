<?php

if(!function_exists('checkPermission')){
    function checkPermission($permission){
        return auth()->guard('admin')->user()->can($permission);
    }
}