<?php

namespace trivial\bd;

class Connexion
{

    private static $db;

    private static $tab;

    public static function makeConnection()
    {
        try {
            
            $dsn = 'mysql:host='.self::$tab['host'] . ';dbname='.self::$tab['dbname'];
            self::$db = new \PDO($dsn, self::$tab['username'], self::$tab['password'], array(
                \PDO::ATTR_PERSISTENT => true,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_STRINGIFY_FETCHES => false
            ));
            self::$db->prepare('SET NAMES \'UTF8\'')->execute();
        
        } catch (\PDOException $e) {
            throw new \PDOException("connection: $dsn " . $e->getMessage());
        }
        return self::$db;
    }

    public static function setConfig($file)
    {
        self::$tab = parse_ini_file($file);
    }
}
