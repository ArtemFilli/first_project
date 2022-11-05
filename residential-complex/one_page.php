<?
require_once __DIR__ . "/engine/run.php";
$title = "Residential-complex";

require $dir . "/content/layout/main/header.php";

$table = $_GET[table];
$id = $_GET[id];
$query = new run();
$res = $query->db->query("SELECT * FROM $table WHERE id = '". $id ."'");
?>
    <section class="record-form" id="record-form">
        <div class="line-bottom-fix"></div>
        <div class="line-top-fix"></div>
        <div class="container-xl">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" data-proportion-h="0.4"> 
                    <?
                        foreach($res as $val){
                            $imgMas = explode(',' ,$val['pic']);
                            if($imgMas[0] == "nophoto.jpg" || $imgMas[0] == "" || $imgMas == ""){
                                ?>
                                    <div class="carousel-item active">
                                        <img src="/content/layout/resources/img/nophoto.jpg" alt="">
                                    </div>
                                <?
                            }else{
                                $i=0;
                                do{
                                    if($i == 0){
                                        ?>
                                            <div class="carousel-item active">
                                                <img src="/content/layout/resources/img/<?=$table?>/<?=$imgMas[$i]?>" alt="">
                                            </div>
                                        <?
                                    }else{
                                        ?>
                                            <div class="carousel-item">
                                                <img src="/content/layout/resources/img/<?=$table?>/<?=$imgMas[$i]?>" alt="">
                                            </div>
                                        <?
                                    }
                                    $i++;
                                }while($i < count($imgMas));
                            } 
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

    <section class="description_entry">
        <div class="container-xl">
            <?
                foreach($res as $val){
                    ?>
                        <h2 class="title2"><?=$val[title]?></h2>
                        <div class="blc-data-ap">
                            <p>Дата публикации: <span class='text-decor'><?=$val[date]?></span></p>
                            <?=$table == "apartments"? "<p>Комнат — <span class='text-decor'>$val[rooms]</span></p>" : ''?>
                            <?=$table == "apartments"? "<p>Этаж  — <span class='text-decor'>$val[floors]</span></p>" : ''?>
                        </div>
                        <div class="blc-description-wrapper">
                            <?=$val[description]?>
                        </div>
                        <div class="link-back">
                            <a href="/list_elements.php?table=<?=$table?>">Назад</a>
                        </div>  
                    <?
                }
            ?>
        </div>
    </section>

    <?
    if($table == "apartments"){
        ?>
             <section class="record-form" id="record-form">
                <div class="line-bottom-fix"></div>
                <div class="line-top-fix"></div>
                <div class="container-xl">
                    <h3 class="title3">Хотите посмотреть?</h3>
                    <div class="record-form-blocks row">
                        <div class="record-form-blocks-description col-md-6 col-12">
                            <p>«Гармония» — это принципиально новый во всех отношениях закрытый жилой комплекс.</p>
                            <p>На территории располагаются три линии сблокированных коттеджей, несколько 9-этажных
                                малоквартирных жилых дома. Запланировано строительство 5-, 15- и 19-этажных многоквартирных
                                домов.</p>
                            <p>В жилых домах и в коттеджах предусмотрено автономное газовое теплоснабжение, центральное
                                водоснабжение и канализация, электричество. К каждому объекту предусмотрено подведение
                                оптоволоконного кабеля для подключения к высококачественным средствам связи: спутниковый
                                интернет, кабельное ТВ.</p>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="record-form-blocks-form row">
                                    <input reception name="action" value="reception" class="local-input" type="hidden" placeholder="Ваше имя">
                                <div class="form-element-wrapper col-6">
                                    <input reception name="FIO" class="local-input" type="text" placeholder="Ваше имя">
                                </div>
                                <div class="form-element-wrapper col-6">
                                    <input reception name="mobile_phone" class="local-input col-6 phone-mask" type="text" placeholder="Ваш телефон">
                                </div>
                                <div class="form-element-wrapper col-6">
                                    <p>Мы никому не передаем ваши данные. </p>
                                </div>
                                <div class="form-element-wrapper col-6"><button id="reception-add" class="local-btn">Оставить заявку</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?
    }
    else{
        ?>
             <section class="ask-form">
                <div class="container-xl">
                    <h3 class="title3">Возникли вопросы?</h3>
                    <div class="record-form-blocks record-form-blocks-ask row">
                        <div class="col-md-6 col-12">
                            <div class="record-form-blocks-description-ask">
                                <p>Наша служба поддержки состоит из восьми человек, которые каждый день отвечают на вопросы
                                    пользователей.</p>
                                <p>Главная задача этой службы – максимально быстро разрешать возникающие у пользователей сложные
                                    ситуации. Кроме того, есть и другое, не всегда очевидное предназначение.</p>
                                <p>При правильном построении рабочего процесса служба поддержки принимает «боль» клиентов,
                                    анализирует ее и приходит с четко сформулированными требованиями к разработчикам, чтобы эта
                                    боль исчезла навсегда.</p>
                            </div>
                            <div class="gold-blc">
                                <p class="text-gold"> Горячая линия</p>
                                <p class="text-gold-number"> 8 (812) 123-45-67</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="record-form-blocks-form row">
                                <input ask name="action" value="ask" class="local-input" type="hidden" placeholder="Ваше имя">
                                <div class="form-element-wrapper col-6">
                                    <input ask class="local-input" name="FIO" type="text" placeholder="Ваше имя">
                                </div>
                                <div class="form-element-wrapper col-6">
                                    <input ask class="local-input col-6 phone-mask" name="mobile_phone" type="text" placeholder="Ваш телефон">
                                </div>
                                <div class="form-element-wrapper col-6">
                                    <p>Мы никому не передаем ваши данные. </p>
                                </div>
                                <div class="form-element-wrapper col-6"><button id="ask-add" class="local-btn">Оставить заявку</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?
    }
    ?>

    <div class="successfully-email">
        <p>Ваше обращение сохранено!</p>
        <p>Скоро мы с вами свяжемся.</p>
    </div>
    <div class="successfully-err">
        <p>Некоректные данные.</p>
    </div>

<?
require $dir . "/content/layout/main/footer.php";
require_once $dir . "/content/modules/load_page.php";
?>