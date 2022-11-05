<?
session_start();
if($_SESSION["loginAdmin"] != false){
    ?><script>location.href = "./working/"</script><?
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в админскую часть</title>

    <link rel="stylesheet" href="/content/layout/resources/css/reset.min.css">
    <link rel="stylesheet" href="/content/layout/resources/css/main_cms.min.css">

</head>
<body>
    <div class="container-form">
        <form class="form" action="./check-login.php" method="POST">
            <h2 class="title-1">Административный раздел</h2>
            <input placeholder="Логин" type="text" name="login">
            <input placeholder="Пароль" type="password" name="pass">
            <?=$_GET ? "<p class='error-form'>" . $_GET['e'] . "</p>" : false?>
            <button>Войти</button>
        </form>
    </div>
</body>
</html>