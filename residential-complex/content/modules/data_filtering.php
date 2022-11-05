<?
require_once __DIR__ . "/../../engine/run.php";
$searchData = new run();
$table = $_POST[table];
$itemOnPage = 6;
$pagesLoad = $_POST[pagesLoad];

$FirstloadItem = 0;
for($i = 1; $i < $pagesLoad; $i++){
    $FirstloadItem = $FirstloadItem + $itemOnPage;
}

if($_POST[query] == "SORT_DESC"){

    $res = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' ORDER BY date DESC, time DESC LIMIT $FirstloadItem, $itemOnPage");

    $resForCount = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' ORDER BY date DESC, time DESC");
    
    $count = count($resForCount);
    $countPage = ceil($count / $itemOnPage);
    
    ?><div class="appartments-blocks-grid row"><?
    foreach ($res as $val){
        ?>
            <div class="appartments-blocks-grid-blc blc col-sm-6 col-12">
                <a href="/one_page.php?table=<?=$table?>&id=<?=$val[id]?>">
                    <div class="for-img-wrapper">
                        <p><?= $val[title]?><?= $val[floors] ? " — $val[floors] этаж": ''?></p>
                        <?$imgMas = explode(',' ,$val['pic']);
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
                        <div class="line-bottom-fix"></div>
                        <div class="line-top-fix"> </div>
                    </div>
                </a>
            </div>
        <?        
    }
    ?></div><?

    ?><div class="btn-page"><?
    $i = 1;
    do{
        ?>
            <a href="#all-appartaments" class="local-btn <?=$i==$pagesLoad ? 'active-page' : ''?>" data-page="<?=$i?>" <?=$i==$pagesLoad ? 'active-page' : ''?>>
                <?=$i?>
            </a>
        <?
        $i++;
    }while ($i <= $countPage);
    ?></div><?
}
elseif($_POST[query] == "all"){

    $res = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' LIMIT $FirstloadItem, $itemOnPage");
    $resForCount = $searchData->db->query("SELECT * FROM $table WHERE active = 'true'");
    
    $count = count($resForCount);
    $countPage = ceil($count / $itemOnPage);

    ?><div class="appartments-blocks-grid row"><?
    foreach ($res as $val){
        ?>
            <div class="appartments-blocks-grid-blc blc col-sm-6 col-12">
                <a href="/one_page.php?table=<?=$table?>&id=<?=$val[id]?>">
                    <div class="for-img-wrapper">
                        <p><?= $val[title]?><?= $val[floors] ? " — $val[floors] этаж": ''?></p>
                        <?$imgMas = explode(',' ,$val['pic']);
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
                        <div class="line-bottom-fix"></div>
                        <div class="line-top-fix"> </div>
                    </div>
                </a>
            </div>
        <?        
    }
    ?></div><?

    ?><div class="btn-page"><?
    $i = 1;
    do{
        ?>
            <a href="#all-appartaments" class="local-btn <?=$i==$pagesLoad ? 'active-page' : ''?>" data-page="<?=$i?>" <?=$i==$pagesLoad ? 'active-page' : ''?>>
                <?=$i?>
            </a>
        <?
        $i++;
    }while ($i <= $countPage);
    ?></div><?
}
elseif($_POST[query] == "SORT_ASC"){

    $res = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' ORDER BY date, time LIMIT $FirstloadItem, $itemOnPage");
    
    $resForCount = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' ORDER BY date, time");
    
    $count = count($resForCount);
    $countPage = ceil($count / $itemOnPage);


    ?><div class="appartments-blocks-grid row"><?
    foreach ($res as $val){
        ?>
            <div class="appartments-blocks-grid-blc blc col-sm-6 col-12">
                <a href="/one_page.php?table=<?=$table?>&id=<?=$val[id]?>">
                    <div class="for-img-wrapper">
                        <p><?= $val[title]?><?= $val[floors] ? " — $val[floors] этаж": ''?></p>
                        <?$imgMas = explode(',' ,$val['pic']);
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
                        <div class="line-bottom-fix"></div>
                        <div class="line-top-fix"> </div>
                    </div>
                </a>
            </div>
        <?        
    }
    ?></div><?

    ?><div class="btn-page"><?
    $i = 1;
    do{
        ?>
            <a href="#all-appartaments" class="local-btn <?=$i==$pagesLoad ? 'active-page' : ''?>" data-page="<?=$i?>" <?=$i==$pagesLoad ? 'active-page' : ''?>>
                <?=$i?>
            </a>
        <?
        $i++;
    }while ($i <= $countPage);
    ?></div><?
}
elseif($_POST[query] == "search"){

    $val = $_POST[val];
    $res = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' AND concat(title, description, date) like '%" . $val . "%' LIMIT $FirstloadItem, $itemOnPage");
    $resForCount = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' AND concat(title, description, date) like '%" . $val . "%'");
    $count = count($resForCount);

    $countPage = ceil($count / $itemOnPage);

    ?><div class="appartments-blocks-grid row"><?
    foreach ($res as $val){
        ?>
            <div class="appartments-blocks-grid-blc blc col-sm-6 col-12">
                <a href="/one_page.php?table=<?=$table?>&id=<?=$val[id]?>">
                    <div class="for-img-wrapper">
                        <p><?= $val[title]?><?= $val[floors] ? " — $val[floors] этаж": ''?></p>
                        <?$imgMas = explode(',' ,$val['pic']);
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
                        <div class="line-bottom-fix"></div>
                        <div class="line-top-fix"> </div>
                    </div>
                </a>
            </div>
        <?        
    }
    ?></div><?

    ?><div class="btn-page"><?
    $i = 1;
    do{
        ?>
            <a href="#all-appartaments" class="local-btn <?=$i==$pagesLoad ? 'active-page' : ''?>" data-page="<?=$i?>" <?=$i==$pagesLoad ? 'active-page' : ''?>>
                <?=$i?>
            </a>
        <?
        $i++;
    }while ($i <= $countPage);
    ?></div><?
 
}
elseif($_POST[query] == "search-rooms"){

    $val = $_POST[val];
    $res = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' AND concat(rooms) like '%" . $val . "%' LIMIT $FirstloadItem, $itemOnPage");
    $resForCount = $searchData->db->query("SELECT * FROM $table WHERE active = 'true' AND concat(rooms) like '%" . $val . "%'");
    $count = count($resForCount);

    $countPage = ceil($count / $itemOnPage);

    ?><div class="appartments-blocks-grid row"><?
    foreach ($res as $val){
        ?>
            <div class="appartments-blocks-grid-blc blc col-sm-6 col-12">
                <a href="/one_page.php?table=<?=$table?>&id=<?=$val[id]?>">
                    <div class="for-img-wrapper">
                        <p><?= $val[title]?><?= $val[floors] ? " — $val[floors] этаж": ''?></p>
                        <?$imgMas = explode(',' ,$val['pic']);
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
                        <div class="line-bottom-fix"></div>
                        <div class="line-top-fix"> </div>
                    </div>
                </a>
            </div>
        <?        
    }
    ?></div><?

    ?><div class="btn-page"><?
    $i = 1;
    do{
        ?>
            <a href="#all-appartaments" class="local-btn <?=$i==$pagesLoad ? 'active-page' : ''?>" data-page="<?=$i?>" <?=$i==$pagesLoad ? 'active-page' : ''?>>
                <?=$i?>
            </a>
        <?
        $i++;
    }while ($i <= $countPage);
    ?></div><?
 
}
else{

}
?>