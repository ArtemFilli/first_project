<?
require_once __DIR__ . "/../engine/run.php";

if($_POST[login] != null && $_POST[pass] != null){
    $loginEm = $_POST['login'];
    $login = new run();
    $result = $login->db->query("SELECT id,password,role FROM employee WHERE login ='" . $loginEm . "'");
    if($result){
        foreach($result as $val){
            if($val[password] == md5($_POST['pass'])){
                session_start();
                $_SESSION["loginAdmin"] = true;
                $_SESSION["id"] = $val[id];
                $_SESSION["role"] = $val[role];
                ?>
                    <script>location.href="./working/"</script>
                <?
            }
            else{
                ?>
                <script>location.href="./index.php?e=Неверный пароль"</script>
                <?
            }
        }  
    }
    ?>
    <script>location.href="./index.php?e=Неверный логин"</script>
    <?
}else{
    ?>
    <script>location.href="./index.php?e=Данные некоректны"</script>
    <?
}
?>