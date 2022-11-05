<?
session_start();
if($_SESSION["loginAdmin"] == true){
?>

<?
require_once __DIR__ . "/../../engine/run.php";
$title = "Personal account";
require $dir . "/content/layout/cms/header.php";
?>

<section class="main">
    <div class="workplace castom-container">
        <div class="col-12">
            <div class="recent-entries">
                <div class="profile profile-page">
                    <div class="profile-img-wrapper">
                        <img src="<?=$Resources?>/img/employee/<?=$pic[0]?>" alt="">
                    </div>
                    <h2 class="title-2"><?=$result[0][login]?></h2>
                    <p><?=$result[0][email]?></p>
                    <a href="./../logout.php">Выйти</a>
                </div>
            </div>
        </div>    
    </div>
</section>

<div class="modal_window">
    <p class="successfully-add">Запись добавлена!</p>
    <p class="successfully-ed">Изменения сохранены!</p>
    <p class="successfully-del">Запись удалена!</p>
</div>

<?require $dir . "/content/layout/cms/footer.php";?>

<?}
else{
    ?><script>location.href = "/"</script><?
}
?>