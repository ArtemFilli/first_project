<?
require_once __DIR__ . "/../../../engine/run.php";
$table = $_POST['table'];

$dir = "D:/OpenServer/domains/residential-complex/content/layout/resources/img/" . $table;
$up_exp = array('png', 'jpg', 'gif','webp');

if (isset($_FILES['file']) && $_FILES['file']['tmp_name'] != ''){
    if($_POST[pic] == 'nophoto.jpg' || $_POST[pic] == ''){
        $arrayStrPic = [];
    }
    else{
        $arrayStrPic = explode(",", $_POST[pic]);;
    }
    
    $file = $_FILES['file'];
    $name = $file['name'];

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

    $arrayStrPic[count($arrayStrPic)] = $filename;
    $str = implode(',', $arrayStrPic);

?>
<script>location.href = "/content/modules/add-news-users.php?table=<?=$table?>&pic=<?=$str?>"</script>