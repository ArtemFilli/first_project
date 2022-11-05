<?
session_start();
if($_SESSION["loginAdmin"] == true){
?>

<?
require_once __DIR__ . "/../../../engine/run.php";
$title = "MyCMS";

require $dir . "/content/layout/cms/header.php";
$add = new run();
?>

<section class="main">
    <div class="workplace castom-container">
        <div class="col-12">
            <div class="recent-entries">
                <div class="ed-blc">
                    <div class="nav-ed-menu">
                        <h2 class="title-1"><?=$translate = $add->translate->translation($_GET['table'])?></h2>
                        <?
                        if($_GET['table'] == "users"){
                            ?><a href="./../users.php?table=<?=$_GET['table']?>">Назад</a><?
                        }
                        elseif($_GET['table'] == "employee"){
                            ?><a href="./../employee.php?table=<?=$_GET['table']?>">Назад</a><?
                        }
                        else{
                            ?><a href="./../changing_table.php?table=<?=$_GET['table']?>">Назад</a><?
                        }
                        ?>
                    </div>
                    <?
                        if(isset($_GET["table"])){
                            $tb = $_GET['table'];
                            $results = $add->db->query("SHOW columns FROM $tb");

                            foreach($results as $result){
                                if($result[Field] == "id"){
                                    
                                }
                                else{
                                    if($result[Field] == "description"){
                                        ?>
                                          <div class="one-blc-add row">
                                            <div class="text"><textarea data="save" name="<?=$result[Field]?>" transformations="true" id="mytextarea"></textarea></div>
                                            </div>
                                        <?
                                    }
                                    elseif($result[Field] == "pic"){
                                        ?>
                                            <div class="img-add-all-wrapper row">
                                            <div class="img-add-all">
                                                  
                                                <?$imgMas = explode(',' ,$_GET["pic"]);
                                                    if($imgMas[0] == "" || $imgMas == "" ||  $imgMas[0] == "nophoto.jpg"){
                                                        ?>
                                                            <div class="img-data"><img src="/content/layout/resources/img/nophoto.jpg" alt=""></div>
                                                        <?
                                                    }elseif(count($imgMas) != 0){
                                                        $img = 0;
                                                        ?><div class="blc-add-pic"><?
                                                        do{
                                                            if($img == 0){
                                                                ?>
                                                                    <div class="first-pic">
                                                                        <div class="img-data"><button class="del-pic-btn" pic="<?=$imgMas[$img]?>"><img src="/content/layout/resources/img/svg/x-circle.svg" alt=""></button><img src="/content/layout/resources/img/<?=$tb?>/<?=$imgMas[$img]?>" alt=""></div>
                                                                    </div>
                                                                <?
                                                                
                                                            }else{
                                                                ?> 
                                                                    <div class="img-data"><button class="del-pic-btn" pic="<?=$imgMas[$img]?>"><img src="/content/layout/resources/img/svg/x-circle.svg" alt=""></button><img src="/content/layout/resources/img/<?=$tb?>/<?=$imgMas[$img]?>" alt=""></div>
                                                                <?
                                                            }
                                                           
                                                            $img++;
                                                        } while ($img < count($imgMas));
                                                        ?></div><?
                                                    }  
                                                ?>
                                    
                                            <form class="photo_add" action="./add-pic.php" enctype="multipart/form-data" method="POST">
                                                <input dont-clear="true" type="hidden" value="<?=$_GET["pic"] ? $_GET["pic"] : 'nophoto.jpg' ?>" data="save" name="<?=$result[Field]?>" type="text">
                                                <input dont-clear="true" name="table" type="hidden" value="<?=$tb?>">
                                                <input dont-clear="true" class="test" name="file" class="test" type="file">
                                                <button class="save-btn">Загрузить</button>
                                            </form>
                                        </div>
                                    </div>
                                        <?
                                    }
                                    elseif($result[Field] == "pass" || $result[Field] == "password"){
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $add->translate->translation($result[Field]);?></p>
                                                <div class="col-6">
                                                    <div class="row modiv-row">
                                                        <input class="col-7" modif="pass" type="text" data="save" name="<?=$result[Field]?>">
                                                        <div class="col-5">
                                                            <button class="save-btn" name="generator">Генерация</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    }
                                    elseif($result[Field] == "root"){
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $add->translate->translation($result[Field]);?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <select dont-clear="true" class="col-7" data="save" name="<?=$result[Field]?>">
                                                            <option selected value="r">r</option>
                                                            <option value="w">w</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    }
                                    elseif($result[Field] == "role"){
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $add->translate->translation($result[Field]);?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                            <select dont-clear="true" class="col-7" data="save" name="<?=$result[Field]?>">
                                                                <option selected value="content">Контент менеджер</option>
                                                                <option value="administrator">Администратор</option>
                                                                <option value="manager">Менеджер</option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    } elseif($result[Field] == "date"){
                                        ?>
                                        <div class="one-blc-add row">
                                            <p class="col-4 modiv-col _text-clipping"><?=$translate = $add->translate->translation($result[Field]);?></p>
                                            <div class="col-6">
                                                <div class="row">
                                                    <input dont-clear="true" class="col-7 date-mask" value="<?=date("Y-m-d")?>" data="save" name="<?=$result[Field]?>" type="text">
                                                </div> 
                                            </div>
                                        </div>
                                        <?
                                    }
                                    elseif($result[Field] == "time"){
                                        ?>
                                            <input dont-clear="true" class="col-7" value="<?=date("H:i:s");?>" data="save" name="<?=$result[Field]?>" type="hidden">
                                        <?
                                    }
                                    elseif($result[Field] == "active"){
                                        ?>
                                          <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $add->translate->translation($result[Field]);?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                            <select dont-clear="true" class="col-7" data="save" name="<?=$result[Field]?>">
                                                                <option selected value="true">Активно</option>
                                                                <option value="false">Скрыть</option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    }
                                    else{
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $add->translate->translation($result[Field])?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <input class="col-7" data="save" name="<?=$result[Field]?>" type="text">
                                                    </div> 
                                                </div>
                                            </div>
                                        <?
                                    }
                                }
                               
                            }
                        }
                    ?>
                    <div class="wrapper-for-save-btn">
                        <button class="save-btn" name="add_data">Сохранить изменения</button>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</section>

<div class="modal_window">
    <p class="successfully-add">Запись добавлена!</p>
    <p class="error-type">Введиет корректные значения!</p>
    <p class="successfully-ed">Изменения сохранены!</p>
    <p class="successfully-del">Запись удалена!</p>
</div>

<?require $dir . "/content/layout/cms/footer.php";?>
<?}
else{
    ?><script>location.href = "/"</script><?
}
?>