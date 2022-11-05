<?
require_once __DIR__ . "/configuration/connection.php";
require_once __DIR__ . "/translation/hend.php";
use engine\configuration\connection as query;
use engine\translation as translate;

class run{
    public $db;
    public $translate;

    function __construct(){
        $this->db = new query\connection() ;
        $this->translate = new translate\translation(); 
    }
}

$dir = __DIR__.'/..';
$Resources = '/content/layout/resources';
?>