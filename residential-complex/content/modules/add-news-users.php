<?
session_start();
require_once __DIR__ . "/../../engine/run.php";

$table=$_GET[table];
$query = new run();
$nameCols = $query->db->query("SHOW columns FROM $table");
$title = 'Добавление записи';
require $dir . "/content/layout/main/header.php";


if($_SESSION["loginUser"] == true){
?>
    <section class="record-form slider" id="record-form">
        <div class="container-xl">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" data-proportion-h="0.4"> 
                        <?
                            $imgMas = explode(",", $_GET[pic]);
                            ?>
                            <div class="carousel-item active">
                                <img src="<?=$Resources?>/img/<?=$_GET[pic] && $_GET[pic] != "nophoto.jpg" ? "$table"."/"."$imgMas[0]" : "nophoto.jpg" ?>" alt="">
                            </div>
                            <?
                            if(count($imgMas) > 1){
                                $i = 1;
                                do{
                                    ?>
                                        <div class="carousel-item">
                                            <img src="<?=$Resources?>/img/<?=$table?>/<?=$imgMas[$i]?>" alt="">
                                        </div>
                                    <?
                                    $i++;
                                }
                                while ($i < count($imgMas));
                            }
                        ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section class="description_entry add_news_user">
        <div class="container-xl">
            <?foreach($nameCols as $nameCol){
                if($nameCol[Field] == "pic"){
                    ?>
                        <div class="wrapper-form-add">
                            <form class="photo_add" action="./hend-add-news/add-pic.php" enctype="multipart/form-data" method="POST">
                                <input dont-clear="true" save-data name="<?=$nameCol[Field]?>" type="hidden" value="<?=$_GET["pic"] ? $_GET["pic"] : 'nophoto.jpg' ?>">
                                <input dont-clear="true" name="table" type="hidden" value="<?=$table?>">
                                <input dont-clear="true" name="file" type="file">
                                <button class="save-btn">Загрузить фото</button>
                            </form> 
                        </div>
                    <?
                }elseif($nameCol[Field] == "description"){
                    ?>
                        <div>
                            <div class="text">
                                <textarea save-data name="<?=$nameCol[Field]?>" transformations="true" id="mytextarea"></textarea>
                            </div>
                        </div>
                    <?
                }
                elseif($nameCol[Field]== "title"){
                    ?>  
                        <div class="title-add-blc">
                            <h2 class="title2 _text-clipping"><?=$translate = $query->translate->translation($nameCol[Field])?></h2>
                            <input save-data class="local-input" name="<?=$nameCol[Field]?>" type="text">
                        </div>
                    <?
                }else{

                }
            }?>

            <div class="btn-add-user-news row">
                <div class="col-sm-6 col-xl-4">
                    <button id="addDataUser" class="local-btn">Добавить</button>
                </div>
            </div>  
    
        </div>
    </section>

    <div class="successfully-email">
        <p>Запись отправлена в обработку.</p>
        <p>Мы опубликуем ее в ближайшее время.</p>
    </div>
    <div class="successfully-err">
        <p>Некоректные данные.</p>
    </div>
<?
require $dir . "/content/layout/main/footer.php";
require_once $dir . "/content/modules/load_page.php";
}else{
    ?><script>location.href="/"</script><?
}
?>