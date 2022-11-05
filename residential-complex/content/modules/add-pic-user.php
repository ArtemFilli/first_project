<?
require_once __DIR__ . "/../../engine/run.php";

$dir = "D:/OpenServer/domains/residential-complex/content/layout/resources/img/users";
$up_exp = array('png', 'jpg', 'gif');

$edit = new run();

if (isset($_FILES['file']) && $_FILES['file']['tmp_name'] != ''){
    $file = $_FILES['file'];
    $name = $file['name'];
    $id = $_POST[id];

    $type = strtolower(end(explode('.', $name)));
    if(in_array($type, $up_exp)){
        if (!file_exists($dir)) { 
            mkdir($dir, 0777, true);
            move_uploaded_file($_FILES['file']['tmp_name'], $dir. "/" . $_FILES['file']['name']);
            $filename = $_FILES['file']['name'];
        }
        else{
            move_uploaded_file($_FILES['file']['tmp_name'], $dir. "/" . $_FILES['file']['name']);
            $filename = $_FILES['file']['name'];
        }
    }
}else{
    $filename = 'nophoto.jpg';
}

$edit->db->execute("UPDATE users SET pic = '". $filename ."' WHERE id = '". $id ."'");

?>
<script>location.href = "/personal-page.php"</script>