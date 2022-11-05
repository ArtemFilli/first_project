<?
session_start();
require_once __DIR__ . "/engine/run.php";
$title = "Residential-complex";
require $dir . "/content/layout/main/header.php";

$query = new run();

if($_SESSION["loginUser"] == true){
    ?><script>location.href="/personal-page.php"</script><?
}else{
?>
    <section class="record-form">
        <div class="container-xl">
            <h3 class="title3">Авторизация</h3>
            <div class="record-form-blocks record-form-blocks-ask row">
                <div class="col-md-6 col-12">
                    <div class="record-form-blocks-description-ask">
                        <p>Доступ к уникальному контенту могут получить жильцы жилого комплекса "Гармония".</p>
                        <p>Авторизоваться вы можете используя ключ и логин отправленные на вашу электронную почту.</p>
                        <p>Если вы не внесены в список жильцов или не получали сообщение на электронный почтовый ящик, пожалуйста, обратитсь в службу поддержки.</p>
                    </div>
                    <div class="gold-blc">
                        <p class="text-gold"> Горячая линия</p>
                        <p class="text-gold-number"> 8 (812) 123-45-67</p>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="record-form-blocks-form">
                        <form action="/content/modules/check-login-user.php" method="POST" class="row">
                            <div class="form-element-wrapper col-6"><input class="local-input" type="text"
                                    placeholder="Логин" name="login"></div>
                            <div class="form-element-wrapper col-6"><input class="local-input" type="text"
                                    placeholder="Email" name="email"></div>
                            <div class="form-element-wrapper col-6"><input class="local-input" type="password"
                                    placeholder="Ключ" name="pass"></div>
                            <div class="form-element-wrapper col-6"><input class="local-input col-6" type="password"
                                    placeholder="Повторите ключ" name="pass2"></div>
                            <div class="form-element-wrapper col-6">
                                <p><?=$_GET[e] ? "$_GET[e]": "Мы никому не передаем ваши данные." ?></p>
                            </div>
                            <div class="form-element-wrapper col-6"><button class="local-btn">Войти</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?
require $dir . "/content/layout/main/footer.php";
require_once $dir . "/content/modules/load_page.php";
}
?>