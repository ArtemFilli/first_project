<?
require_once __DIR__ . "/../../../engine/run.php";

if(isset($_POST[table]) && isset($_POST[data])){

    $add = new run();
    $arrayData = $_POST['data'];
    $table = $_POST['table'];
    $strAdd = "";

    foreach($arrayData as $val){
        $strAdd = $strAdd . "`" . $val[key]. "`" . " = '" . $val[val] . "', ";
    }
    $sql = "INSERT INTO `$table` SET $strAdd `date` = '". date("Y-m-d") . "', `time` = '" . date('H:i:s') . "', `active` = 'false'";
    $add->db->execute($sql);
    echo $sql;
}
?>