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
                <div id="data-table">
                    <div class="changing_table headings row">
                        <div class="col-1">
                            ID <button class="sort sort-btn" data-sort="id">⇅</button>
                        </div>
                        <div class="col-3">
                            Логин <button class="sort sort-btn" data-sort="login">⇅</button>
                        </div>
                        <div class="col-3">
                            ID квартиры <button class="sort sort-btn" data-sort="apatrament">⇅</button>
                        </div>
                        <div class="col-3">
                            ФИО <button class="sort sort-btn" data-sort="fio">⇅</button>
                        </div>
                        <div class="col-2">
                            Права
                        </div>
                    </div>

                    <div class="list">

                        <?
                            $table = $_GET['table'];
                            $query = new run();
                            $results = $query->db->query("SELECT * FROM $table");
                            foreach($results as $result){
                        ?> 
                                <div class="changing_table changing_table_data row">
                                    <div class="col-1 id _text-clipping">
                                        <?= $result['id']?>
                                    </div>
                                    <div class="col-3 _text-clipping login">
                                        <?= $result['login']?>
                                    </div>
                                    <div class="col-3 _text-clipping apatrament">
                                        <?= $result['apartment_number']?>
                                    </div>
                                    <div class="col-3 _text-clipping fio">
                                        <?= $result['FIO']?>
                                    </div>
                                    <div class="col-2 _text-clipping">
                                        <?= $result['root']?>
                                    </div>
                            </div>
                        <?  
                            }
                        ?>
                    </div>
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