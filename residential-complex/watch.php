<?
require_once __DIR__ . "/engine/run.php";
$title = "Residential-complex";
require $dir . "/content/layout/main/header.php";

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