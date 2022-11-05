<?
session_start();
if($_SESSION["loginAdmin"] == true){
?>
<?
require_once __DIR__ . "/../../engine/run.php";

$table = $_GET['table'];
$query = new run();
$results = $query->db->query("SELECT * FROM $table ORDER BY date DESC");
$countAppl = count($results);
setcookie("countAppl", $countAppl);

$title = "MyCMS";
require $dir . "/content/layout/cms/header.php";
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
                    <button name="btnDel" action_del=""><img src="/content/layout/resources/img/svg/trash.svg" alt=""></button>
                </div>

                <div class="nav-ed-menu">
                    <h2 class="title-1"><?=$translate = $query->translate->translation($_GET['table'])?></h2>
                </div>

                <div id="data-table">

                    <div class="changing_table headings row">
                        <div class="col-3">
                            Вид заявки <button class="sort sort-btn" data-sort="view">⇅</button>
                        </div>
                        <div class="col-3">
                            ФИО <button class="sort sort-btn" data-sort="fio">⇅</button>
                        </div>
                        <div class="col-3">
                            Моб. телефон <button class="sort sort-btn" data-sort="fio">⇅</button>
                        </div>
                        <div class="col-2">
                            Дата <button class="sort sort-btn" data-sort="date">⇅</button>
                        </div>
                    </div>

                    <div class="list">

                    <?
                        foreach($results as $result){
                    ?> 
                            <div class="changing_table changing_table_data meeting row">
                                <div class="col-1 id _text-clipping id-modiv">
                                    <?= $result['id']?>
                                </div>
                                <div class="col-3 _text-clipping view">
                                    <?= $result['action'] == "reception" ? "Консультация" : "Вопрос"?>
                                </div>
                                <div class="col-3 _text-clipping fio">
                                    <?= $result['FIO']?>
                                </div>
                                <div class="col-3 _text-clipping">
                                    <?= $result['mobile_phone']?>
                                </div>
                                <div class="col-2 _text-clipping date">
                                    <?= $result['date']?>
                                </div>
                                <div class="col-1 _text-clipping">
                                    <?= $result['check_out'] == null ? "<button name='$result[id]' class='check_out_btn'><img src='/content/layout/resources/img/svg/check-lg.svg' alt=''></button>" : "<button name='$result[id]' class='check_out_btn check_out_btn_active'><img src='/content/layout/resources/img/svg/check-lg.svg' alt=''></button>"?>
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
    <p class="successfully-del">Запись удалена!</p>
</div>

<?require $dir . "/content/layout/cms/footer.php";?>

<?}
else{
    ?><script>location.href = "/"</script><?
}
?>