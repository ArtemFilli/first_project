<?
session_start();
if($_SESSION["loginAdmin"] == true){
?>

<?
require_once __DIR__ . "/../../engine/run.php";
$title = "MyCMS";
require $dir . "/content/layout/cms/header.php";
$table = $_GET['table'];
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
                        <div class="col-2">
                            Заголовок <button class="sort sort-btn" data-sort="title">⇅</button>
                        </div>
                        <div class="col-3">
                            Описание <button class="sort sort-btn" data-sort="desc">⇅</button>
                        </div>
                        <div class="col-2">
                            Изображение
                        </div>
                        <div class="col-2">
                            Дата <button class="sort sort-btn" data-sort="date">⇅</button>
                        </div>
                        <div class="col-2">
                            Статус <button class="sort sort-btn" data-sort="active">⇅</button>
                        </div>
                    </div>
                   
                    <div class="list">
                        
                    <?
                        $results = $query->db->query("SELECT * FROM $table");
                        foreach($results as $result){
                    ?> 
                        <div class="changing_table changing_table_data row">
                            <div class="col-1 id _text-clipping">
                                <?= $result['id']?>
                            </div>
                            <div class="col-2 _text-clipping title">
                                <?= $result['title']?>
                            </div>
                            <div class="col-3 _text-clipping description desc">
                                <?= $result['description']?>
                            </div>
                            <div class="col-2 _text-clipping img-blc">
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
                            <div class="col-2 _text-clipping date">
                                <?= $result['date']?>
                            </div>
                            <div class="col-2 _text-clipping active">
                                <?= $result['active'] == "true" ? "Активно" : "Скрыто"?>
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
    <p class="successfully-add">Изменения сохранены!</p>
    <p class="successfully-del">Запись удалена!</p>
</div>


<?require $dir . "/content/layout/cms/footer.php";?>
<?}
else{
    ?><script>location.href = "/"</script><?
}
?>