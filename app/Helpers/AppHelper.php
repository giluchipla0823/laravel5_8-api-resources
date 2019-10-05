<?php

namespace App\Helpers;


class AppHelper
{

    public static function getIncludesFromQueryParams(){
        $includes = request()->query->get('includes');

        if(!$includes){
            return [];
        }

        return explode(',', $includes);
    }
}
