<?php

namespace Lib;

use Config\config;

/**
 * Description of Conexao
 *
 * @author branc
 */
class Conexao {
    private static $local = 'localhost';
    private static $bdname = 'bd_mahina_slim';
    private static $user = 'root'  ;
    private static $pass = 'root';
    
    private static $instance_ = null;
    
    private static function conectar(){       
        try{            
            if(self::$instance_ == null):
                $dsn = "mysql:host=". self::$local .";dbname=". self::$bdname ;           
              
                self::$instance_ = new \PDO($dsn, self::$user, self::$pass);
                self::$instance_->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            endif;
        } catch (\PDOException $ex) {
           // echo "Erro: ".$ex->getMessage();
           header("location: /");
        }
        return self::$instance_;
    }
    
    protected static function getDB(){        
        return self::conectar();
    }
}
