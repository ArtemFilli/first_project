<?
session_start();
if($_SESSION["loginAdmin"] == true){
?>

<?
require_once __DIR__ . "/../../../engine/run.php";
$title = "MyCMS";

require $dir . "/content/layout/cms/header.php";
$ed = new run();

?>

<section class="main">
    <div class="workplace castom-container">
        <div class="col-12">
            <div class="recent-entries">
                <div class="ed-blc">
                    <div class="nav-ed-menu">
                        <h2 class="title-1"><?=$translate = $ed->translate->translation($_GET['table'])?></h2>
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
                        if(isset($_GET["table"]) && isset($_GET["id"])){
                            $tb = $_GET['table'];
                            $id = $_GET['id'];
                            $results = $ed->db->query("SELECT * FROM $tb WHERE id = $id");
                            
                            foreach($results as $result){
                                foreach($result as $key => $value){
                                    if($key == "id"){
                                        ?>
                                            <input data="save" name="<?=$key?>" value="<?=$value?>" type="hidden">
                                        <?
                                    }
                                    elseif($key == "pic"){
                                        ?>
                                        <div class="img-add-all-wrapper row">
                                            <div class="img-add-all">
                                        <?
                                        isset($_GET[pic]) ? $imgMas = explode(',' ,$_GET["pic"]) : $imgMas = explode(',' ,$value);

                                        if($imgMas[0] == "" || $imgMas == "" || $imgMas[0] == "nophoto.jpg"){
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
                                            <form class="photo_add" action="./ed-pic.php" enctype="multipart/form-data" method="POST">
                                                <input name="table" type="hidden" value="<?=$tb?>">
                                                <input name="id" type="hidden" value="<?=$id?>">
                                                <input type="hidden" data="save"  name="<?=$key?>" value="<?
                                                    if(isset($_GET[pic])){
                                                        echo $_GET[pic] ? $_GET[pic] : "nophoto.jpg";
                                                    }else{
                                                        echo $value;
                                                    }
                                                ?>"><br>
                                                <input name="file" class="test" type="file">
                                                <button  class="save-btn">Отправить</button>
                                            </form>
                                        </div>
                                    </div>
                                        <?
                                    }
                                    elseif($key == "description"){
                                        ?>
                                            <div class="one-blc-add row">
                                                <div class="text"><textarea data="save" name="<?=$key?>" transformations="true" id="mytextarea"><?=$value?></textarea></div>
                                            </div>
                                        <?
                                    }
                                    elseif($key == "pass"){
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $ed->translate->translation($key)?></p>
                                                <div class="col-6">
                                                    <div class="row modiv-row">
                                                        <input class="col-7" modif="pass" type="text" data="save" value="<?=$value?>" name="<?=$key?>">
                                                        <div class="col-5">
                                                            <button class="save-btn" name="generator">Генерация</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    }
                                    elseif($key == "password"){
                                        ?>
                                           <input type="hidden" data="save" name="<?=$key?>" value="<?=$value?>">
                                        <?
                                    }
                                    elseif($key == "root"){
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $ed->translate->translation($key)?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <select class="col-7" data="save" name="<?=$key?>">
                                                            <option <?= $value == 'r' ? 'selected' : ''?> value="r">r</option>
                                                            <option <?= $value == 'w' ? 'selected' : ''?> value="w">w</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    }
                                    elseif($key == "active"){
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $ed->translate->translation($key)?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <select class="col-7" data="save" name="<?=$key?>">
                                                            <option <?= $value == "true" ? 'selected' : ''?> value="true">Активно</option>
                                                            <option <?= $value != "true" ? 'selected' : ''?> value="false">Скрыто</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    }
                                    elseif($key == "role"){
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $ed->translate->translation($key)?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <select class="col-7" data="save" name="<?=$result[Field]?>">
                                                            <option <?= $value == 'content' ? 'selected' : ''?> value="content">Контент менеджер</option>
                                                            <option <?= $value == 'administrator' ? 'selected' : ''?> value="administrator">Администратор</option>
                                                            <option <?= $value == 'manager' ? 'selected' : ''?> value="manager">Менеджер</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                    }
                                    elseif($key == "time"){
                                        ?>
                                            <input class="col-7" data="save" name="<?=$key?>" value="<?=$value?>" type="hidden">
                                        <?
                                    }
                                    elseif($key == "date"){
                                        ?>
                                              <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $ed->translate->translation($key)?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <input class="col-7 date-mask" data="save" name="<?=$key?>" value="<?=$value?>" type="text">
                                                    </div> 
                                                </div>
                                            </div>
                                        <?
                                    }
                                    else{
                                        ?>
                                            <div class="one-blc-add row">
                                                <p class="col-4 modiv-col _text-clipping"><?=$translate = $ed->translate->translation($key)?></p>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <input class="col-7" data="save" name="<?=$key?>" value="<?=$value?>" type="text">
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
                        <button class="save-btn" name="save_edit">Сохранить изменения</button>
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