<?php
require_once 'config.php';
class connect {
    
    private static $db = null;    
    public static function getconnect() {
        if($db == null){
            try { 
                $db = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_CASE, PDO::ERRMODE_EXCEPTION);
                $db->exec('SET NAMES utf8');
            } catch(PDOException $e) {
                die("ERROR Informations non envoyés" . $e->getMessage());
            }
        }
        
        return $db;
    }
}
$db = connect::getconnect();