<?
require_once __DIR__ . "/../../../engine/run.php";
    if($_POST){
        $id = $_POST[id]; 
        $check = new run();
        $result = $check->db->query("SELECT check_out FROM applications WHERE id =" . $id);

        $check_out = null;

        if($result[0][check_out] == ""){
            $check_out = 1;
        }

        $check->db->execute("UPDATE `applications` SET `check_out` = '" . $check_out . "' WHERE `id` = '" . $id . "'");
    }
?>