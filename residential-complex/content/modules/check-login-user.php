<?
require_once __DIR__ . "/../../engine/run.php";

if($_POST[login] != null && $_POST[pass] != null && $_POST[email] != null && $_POST[pass2] != null){
    $loginUser = $_POST['login'];
    $email = $_POST['email'];
    $login = new run();
    $result = $login->db->query("SELECT id,pass,root FROM users WHERE login ='" . $loginUser . "' AND email = '". $email ."'");
    if($result){
        foreach($result as $val){
            if($_POST[pass] == $_POST[pass2]){
                if($val[pass] == $_POST[pass]){
                    session_start();
                    $_SESSION["loginUser"] = true;
                    $_SESSION["id_user"] = $val[id];
                    // $_SESSION["user_root"] = $val[root];
                    ?>
                        <script>location.href="/personal-page.php"</script>
                    <?
                }
                else{
                    ?>
                        <script>location.href="/form-login.php?e=Неверный пароль"</script>
                    <?
                }
            }
        }  
    }
    ?>
        <script>location.href="/form-login.php?e=Неверный логин"</script>
    <?
}else{
    ?>
        <script>location.href="/form-login.php?e=Данные некоректны"</script>
    <?
}
?>