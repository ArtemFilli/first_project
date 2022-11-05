<?
session_start();
if($_SESSION[loginUser] == true){
require_once __DIR__ . "/engine/run.php";

$title = "Personal-page";
require $dir . "/content/layout/main/header.php";
$query = new run();
$id = $_SESSION[id_user];
?>
    <section class="profile-user">
        <div class="container-xl">
            <div class="profile-user-blc">
                <?
                    $res = $query->db->query("SELECT * FROM users WHERE id =" . $id);
                    foreach($res as $val){
                        ?>
                            <div class="blc-pic-add">
                                <div class="profile-user-img-wrapper">
                                    <img src="<?=$Resources?>/img/<?= $val[pic] == "nophoto.jpg" ? "nophoto.jpg" : "users/$val[pic]"?>" alt="">
                                </div>
                                <p class="edit-photo">Изменить фото</p>
                                <form class="photo_add" action="/content/modules/add-pic-user.php" enctype="multipart/form-data" method="POST">
                                    <input dont-clear="true" name="id" value="<?=$_SESSION[id_user]?>" type="hidden">
                                    <input dont-clear="true" name="file" type="file">
                                    <button class="save-btn">Сохранить</button>
                                </form>
                            </div>

                            <div class="other-info">
                                <p>Логин: <?=$val[login]?></p>
                                <p><?=$val[FIO]?></p>
                                <p>Персональный номер жилья: <?=$val[apartment_number]?></p>
                                <p>Электронная почта: <?=$val[email]?></p>
                                <p><?=$val[root]=="r"? "Права: чтение": "Права: добавление новостей"?></p>
                            </div>

                            <div class="logout-user-blc">
                                <a class="logout-user" href="/">На главную</a>
                            </div>
                            <div class="logout-user-blc">
                                <a class="logout-user" href="/content/modules/logout.php">Выйти</a>
                            </div>
                            
                            
                        <?
                    }
                ?>
            </div>
        </div>
    </section>


<?
require $dir . "/content/layout/main/footer.php";
}else{
    ?><script>location.href="/"</script><?
}
?>