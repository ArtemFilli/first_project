<?
if($_POST){
    require_once __DIR__ . "/../../engine/run.php";
    
    $action = $_POST[action];
    $FIO = $_POST[FIO];
    $mob = $_POST[mobile_phone];
    $date = date("Y-m-d");

    $addData = new run();
  
    $addData->db->execute("INSERT INTO applications SET `action`= '". $action . "', `FIO`= '". $FIO ."', `mobile_phone`= '". $mob ."', `date`= '". $date ."'");

}
?>