<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 1/7/2018
 * Time: 12:41 PM
 */

namespace App\classes;


class Database
{
    public function dbConnection(){
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "blog";
        $link = mysqli_connect($hostName,$userName,$password,$dbName);
        return$link;
    }

}