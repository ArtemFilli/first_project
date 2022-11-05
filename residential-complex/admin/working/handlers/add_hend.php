<?
require_once __DIR__ . "/../../../engine/run.php";

if(isset($_POST['table']) && isset($_POST['data'])){

    $arrayData = $_POST['data'];
    $table = $_POST['table'];

        $headers = "NIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html: charset=iso-8859-1\r\n";

    if($table == "employee"){

        $Email = "$arrayData[3]";
        $Login = "Доступ к сайту!";
        $pass = "<h2>Ваш логин: $arrayData[1]</h2><h2>Ваш пароль: $arrayData[4]</h2>";

        mail($Email, $Login, $pass, $headers);
    }

    if($table == "users"){
      
        $Email = "$arrayData[4]";
        $Login = "Доступ к клиентской части!";
        $pass = "<h2>Ваш логин: $arrayData[1]</h2><h2>Ваш пароль: $arrayData[5]</h2>";

        mail($Email, $Login, $pass, $headers);
    }

    $add = new run();

    $results = $add->db->query("SHOW columns FROM $table");
    $i = 0;
    $edStr = "";
    $d = "";
    $t = "";

    foreach($results as $result){
        if($result[Field] == "id"){
    
        }
        elseif($result[Field] == "password"){
            if($i >= count($arrayData) - 1){
                $edStr = $edStr . "`$result[Field]` = ". "'" . md5($arrayData[$i]) . "'";
            }
            else{
                $edStr = $edStr . "`$result[Field]` = ". "'" . md5($arrayData[$i]). "'" .", ";
            }
            $i++;
        }
        elseif($result[Field] == "date"){
            if($i >= count($arrayData) - 1){
                $edStr = $edStr . "`$result[Field]` = ". "'" . $arrayData[$i] . "'";
            }
            else{
                $edStr = $edStr . "`$result[Field]` = ". "'" . $arrayData[$i]. "'" .", ";
            }
            $d = $arrayData[$i];
            $i++;
        }
        elseif($result[Field] == "time"){
            if($i >= count($arrayData) - 1){
                $edStr = $edStr . "`$result[Field]` = ". "'" . $arrayData[$i] . "'";
            }
            else{
                $edStr = $edStr . "`$result[Field]` = ". "'" . $arrayData[$i]. "'" .", ";
            }
            $t = $arrayData[$i];
            $i++;
        }
        else{
            if($i >= count($arrayData) - 1){
                $edStr = $edStr . "`$result[Field]` = ". "'" ."$arrayData[$i]". "'";
            }
            else{
                $edStr = $edStr . "`$result[Field]` = ". "'" ."$arrayData[$i]". "'" .", ";
            }
            $i++;
        }
    }

    $sql = "INSERT INTO `$table` SET $edStr";
    $add->db->execute($sql);

    echo $sql;

    if($d != "" && $t != ""){
        $res = $add->db->query("SELECT id FROM `$table` ORDER BY id DESC LIMIT 1");
        $id = $res[0][id];
        $sqlT = "INSERT INTO `temp` SET `table_temp` = '".$table."', `id_record` = '".$id."', `date` = '".$d."', `time` = '".$t."' ";
        $add->db->execute($sqlT);
    }
}

?>