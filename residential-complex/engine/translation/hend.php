<?
namespace engine\translation;

class translation{
    public function translation($r){
        $langRu = require __DIR__ . '/translation.php';
        $key = array_search($r, $langRu);
        echo $key; 
        
        // foreach($langRu as $key => $val){
        //     if($key == $r){
        //         echo $val;
        //     }
        // }
    }
}
?>