<?
require_once __DIR__ . "/../../../engine/run.php";

if(isset($_POST['table']) && isset($_POST['id'])){
    $tb = $_POST['table'];
    $id = $_POST['id'];
    $del = new run();
    $del->db->execute("DELETE FROM $tb WHERE id = $id");
}


?>