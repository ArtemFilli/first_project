<?
require_once __DIR__ . "/../../../engine/run.php";

if(isset($_POST['table']) && isset($_POST['data'])){

    $arrayData = $_POST['data'];
    $table = $_POST['table'];
    
    $edit = new run();
      
    $results = $edit->db->query("SHOW columns FROM $table");
    $i = 1;
    $edStr = "";
    foreach($results as $result){
        if($result[Field] == "id"){
    
        }
        else{
            if($i >= count($arrayData)-1){
                $edStr = $edStr . "`$result[Field]` = ". "'" ."$arrayData[$i]". "'";
            }
            else{
                $edStr = $edStr . "`$result[Field]` = ". "'" ."$arrayData[$i]". "'" .", ";
            }
            $i++;
        }
    }
    
    $sql = "UPDATE `$table` SET " . $edStr . " WHERE id = $arrayData[0]";
    $edit->db->execute($sql);
    echo $sql;
}

?>