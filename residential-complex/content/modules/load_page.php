<?
$loadpage = new run;
$result = $loadpage->db->query("SELECT * FROM loadpage WHERE `date` = '" . date("Y-m-d") . "'");

$updata = 0;

if($result){
    $updata = $result[0][count] + 1;
    $loadpage->db->execute("UPDATE loadpage SET count = $updata WHERE `date` = '" . date("Y-m-d") . "'");
}else{
    $loadpage->db->execute("INSERT INTO loadpage SET `count` = 1, `date` = '" . date("Y-m-d") . "'");
}

?>