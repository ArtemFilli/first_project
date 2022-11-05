<?
require_once __DIR__ . "/engine/run.php";

$query = new run();
$title = 'Residential-complex';
require $dir . "/content/layout/main/header.php";

if($_GET[table]=="newstenants"){
    if($_SESSION["loginUser"] != true){
        ?><script>location.href="/"</script><?
    }
}

?>
    <section class="appartments appartments-list">
        <div class="container-xl">
            <div class="section-numbering appartments-section-numbering">
                <p>R</p>
            </div>
            <div class="appartments-blocks">
                <h3 class="title3" id="all-appartaments"><?=$translate = $query->translate->translation($_GET[table])?></h3>
                <div class="row">
                    <div class="col-12">
                        <div class ="search">
                                <div >
                                    <input id="val-search" class="local-input" type="text" placeholder="Введите интерисующее слово или дату" name="val-search">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="row col-appatr">
                    <div class="col-lg-9 col-md-9 col-12 content">
                        <div id="results"></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="filter">
                                <?if($_GET[table]=="newstenants"){
                                        $id = $_SESSION["id_user"];
                                        $rootUser = $query->db->query("SELECT root FROM users WHERE id = '". $id ."'");
                                        if($_SESSION["loginUser"] == true && $rootUser[0][root] == "w"){
                                            ?>
                                            <div class="btn-add-blc">
                                                <a href="/content/modules/add-news-users.php?table=newstenants" class="btn-add">Добавить +</a>
                                            </div> 
                                            <?
                                        }               
                                    }?>

                                <p>
                                    Сортировка:
                                </p>
                                <div class="nav-filter">
                                    <button class="local-btn" id="SORT_DESC">
                                        Новинки
                                    </button>

                                    <button class="local-btn" id="SORT_ASC">
                                        По дате начала
                                    </button>

                                    <button class="local-btn" id="reset">
                                        По умолчанию
                                    </button>
                                </div>
                        <?
                                if($_GET[table] == "apartments"){
                                    ?>
                                    <div class="search-rooms">
                                        <p>
                                        Кол-во комнат:
                                        </p>
                                        <div class="row nav-filter">
                                            <div class="col-7 col">
                                                <input id="val-search-rooms" class="local-input" type="number" min="0" name="val-search">
                                            </div>
                                            <div class="col-5 col">
                                                <button id="search-rooms" class="local-btn">
                                                    <img src="<?=$Resources?>/img/svg/search-white.svg" alt="">
                                                </button>
                                            </div>
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