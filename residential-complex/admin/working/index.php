<?
session_start();
if($_SESSION["loginAdmin"] == true){
?>

<?
require_once __DIR__ . "/../../engine/run.php";
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
            <div class="notification">
                <a href="/admin/working/meeting_requests.php?table=applications">
                    <img src="<?=$Resources?>/img/svg/Vector.svg" alt="">
                    <?
                        $appl = new run();
                        $resultsAppl = $appl->db->query("SELECT id FROM applications ORDER BY date DESC");
                        $countAppl = count($resultsAppl);
                        if($_COOKIE[countAppl] < $countAppl){
                            ?> 
                                <div class="notification-new">
                                    
                                </div>
                            <?
                        }
                         
                    ?>
                </a>
            </div>
        </div>
    </div>
    <div class="workplace castom-container list">
        <div class="row row-modif">
            <div class="col-6">
                <div class="recent-entries" data-proportion-h="2">
                    <h2 class="title-2 _text-clipping">Добро пожаловать!</h2>
                    <div class="calendar wrapper-border-bottom">
                        <div class="line-indicator-blc">
                            <div class="line-indicator"></div>
                        </div>
                        <p class="time" id="time">Дата и время</p>
                        <div class="weekday" id="weekday">
                            <div class="weekday-name row"><span class="col">пн</span><span
                                    class="col">вт</span><span class="col">ср</span><span class="col">чт</span><span
                                    class="col">пт</span><span class="col">сб</span><span class="col">вс</span>
                            </div>
                            <div class="weekday-day row"></div>
                        </div>
                    </div>
                    <h2 class="title-2 _text-clipping">Заметки (To Do list)</h2>
                    <div class="notes">
                        <div class="notes-one notes-add">
                            <div class="notes-one-text">
                                <input id="title-to-do" class="title-2" type="text" placeholder="Заголовок...">
                                <textarea id="description-to-do" placeholder="Текст..."></textarea>
                            </div>
                            <div id="to-do-add" class="notes-one-flag">
                                <div class="notes-one-flag-img"><img src="<?=$Resources?>/img/svg/pin-angle-fill.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="show-more">
                        <p class="show">Показать больше</p>
                        <p class="hide">Скрыть</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                    <div class="other-actions">
                        <div class="statistics-wrapper" data-proportion-h="1">
                            <div class="statistics">
                                <h2 class="title-2">График нагрузки на сайт (последние 7 дней)<div class="canvas-wrapper"><canvas
                                            class="main-chart" id="line-chart" height="100%" width="100%"></canvas>
                                    </div>
                                </h2>
                            </div>
                        </div>
                        <?
                            $loadPage = new run();
                            for($i = 0; $i <= 6; $i++){
                                $date = new DateTime('-'. $i .' days');
                                $resLoadPage = $loadPage->db->query("SELECT * FROM loadpage WHERE `date` = '". $date->format('Y-m-d') ."'");
                                if($resLoadPage){
                                    ?><input name = "data-statistics" type="hidden" value="<?=$resLoadPage[0][count]?>"><?
                                }else{
                                    ?><input name = "data-statistics" type="hidden" value="0"><?
                                }
                            }
                        ?>
                        <div class="recent-changes-blc" data-proportion-h="1">
                            <div class="statistics recent-changes-wrapper">
                                <h2 class="title-2">Новые записи за сегодня</h2>
                                <div class="recent-changes">
                                    <?
                                        $recent = new run();
                                        $delTemp = $recent->db->execute("DELETE FROM `temp` WHERE `date` <>'" . date("Y-m-d") ."'"); 
                                        $resultRecent = $recent->db->query("SELECT * FROM `temp` WHERE `date` = '" . date("Y-m-d") ."'  ORDER BY `time` DESC" );
                                        foreach ($resultRecent as $value) {
                                            $tb = $value[table_temp];
                                            $id = $value[id_record];
                                            $resOther = $recent->db->query("SELECT * FROM `".$tb."` WHERE `id` = '". $id ."'");
                                            foreach($resOther as $val){  
                                                $time = explode(":",$value[time]);
                                            ?>
                                                <div class="recent-changes-one">
                                                    <div class="top-panel">
                                                        <p class="title-2 _text-clipping"><?=$val[title]?></p>
                                                    </div>
                                                    <p>Время добавления: <span class="time"><?=$time[0] . ":" . $time[1]?></span></p>
                                                    <div class="recent-changes-one-other">
                                                        <p>Область изменения: <span class="time"><?=$translate = $recent->translate->translation($tb)?></span></p>
                                                        <div class="wrapper-img"><img src="./img/svg/trash.svg" alt=""></div>
                                                    </div>
                                                </div>     
                                            <?
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<?require $dir . "/content/layout/cms/footer.php";?>

<?}
else{
    ?><script>location.href = "/"</script><?
}
?>