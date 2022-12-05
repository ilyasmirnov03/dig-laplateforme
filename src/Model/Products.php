<?php

namespace App\Model;

class Products extends Model
{
    protected $tableName = 'produits';
    protected static $instance;
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
