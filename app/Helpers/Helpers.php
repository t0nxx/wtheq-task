<?php

// set of helpers , useful utils that could be used in the project
/**
 *  it should loaded when the app start , i add it in auto load config in composer.json
 *
 *   "autoload": {
 *       "files" : [
 *           "app/Helpers/helper.php"
 *      ],
 *       "psr-4": {
 *           "App\\": "app/",
 *          "Database\\Factories\\": "database/factories/",
 *          "Database\\Seeders\\": "database/seeders/"
 *       }
 *   },
 */


/**
 *  this function for indicated the request is for create or update ,its very helpfull for validation to not duplicated rules in create/update
 */
if (!function_exists('CreateOrUpdateRule')) {
    function CreateOrUpdateRule()
    {
        return request()->isMethod('POST') ? 'required' : 'sometimes';
    }
}
