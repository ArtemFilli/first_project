<?
session_start();
if($_SESSION["loginAdmin"] == true){
?>

<?
require_once __DIR__ . "/../../engine/run.php";
$title = "MyCMS";
require $dir . "/content/layout/cms/header.php";
$query = new run();
?>

<section class="main">
    <div class="search wrapper-border-bottom">
        <div class="castom-container search-wrapper">
            <div class="search-panel">
                <button>
                    <img src="<?=$Resources?>/img/svg/search.svg" alt="">
                </button>
                <input id="search" name="search" placeholder="Поиск..." type="text" data-toggle="hideseek" data-list=".list">
            </div>
        </div>
    </div>
    <div class="workplace castom-container">
        <div class="col-12">
            <div class="recent-entries">
                <div class="navigation_elements">
                    <button name="btnAdd" action_add=""><img src="/content/layout/resources/img/svg/plus-circle.svg" alt=""></button>
                    <button name="btnEd" action_ed=""><img src="/content/layout/resources/img/svg/pencil-square.svg" alt=""></button>
                    <button name="btnDel" action_del=""><img src="/content/layout/resources/img/svg/trash.svg" alt=""></button>
                </div>
                <div class="nav-ed-menu">
                    <h2 class="title-1"><?=$translate = $query->translate->translation($_GET['table'])?></h2>
                </div>

                <div class="list">

                    <?
                        $table = $_GET['table'];
                        $results = $query->db->query("SELECT * FROM $table");
                        foreach($results as $result){
                    ?> 
                            <div class="changing_table changing_table_data employee-blc">
                                <div class="col id id_employee">
                                    <?= $result['id']?>
                                </div>
                                <div class="employee-info">
                                    <div class="img-blc employee-img">
                                        <div class="img-data">
                                            <?$imgMas = explode(',' ,$result['pic']);
                                                if($imgMas[0] == "nophoto.jpg" || $imgMas[0] == "" || $imgMas == ""){
                                                    ?>
                                                        <img src="/content/layout/resources/img/<?=$imgMas[0]?>" alt="">
                                                    <?
                                                }else{
                                                    ?>
                                                        <img src="/content/layout/resources/img/<?=$table?>/<?=$imgMas[0]?>" alt="">
                                                    <?
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="_text-clipping title-2">
                                            <?= $result['FIO']?>
                                        </div>
                                        <div class="_text-clipping">
                                            <?= $result['email']?>
                                        </div>
                                    </div>
                                </div>
                                <div class="title-2 _text-clipping employee-role">
                                    <?=$query->translate->translation($result['role']);?> 
                                </div>
                        </div>
                    <?  
                        }
                    ?>
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