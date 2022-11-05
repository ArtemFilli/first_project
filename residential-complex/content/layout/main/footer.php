<footer id="footer">
        <div class="container-xl">
            <div class="footer-container row">
                <div class=" col col-lg-6 col-md-4 col-sm-3 col-12">
                    <div class="wrapper-logo-link"><a class="logo-link" href="./">
                            <h2 class="title">Гармония</h2>
                            <p class="sub-title">Жилой комплекс</p>
                        </a></div>
                </div>
                <div class="contacts col col-lg-3 col-md-4 col-sm col-12">
                    <ul>
                        <li>Адрес: Санкт-Петербург, ул. Типанова 21</li>
                        <li>Телефон: <span class='highlighting'>8 (812) 123-45-67<span></li>
                        <li>Отдел продаж: 10:00 - 20:00</li>
                        <li>E-mail: <span class='highlighting'>artemfilippov@gmail.com</span></li>
                        <li class="social">
                            <a href="#"><img src="<?=$Resources?>/img/svg/youtube.svg" alt=""></a>
                            <a href="#"><img src="<?=$Resources?>/img/svg/vk.svg" alt=""></a>
                            <a href="#"><img src="<?=$Resources?>/img/svg/instagram.svg" alt=""></a>
                            <a href="#"><img src="<?=$Resources?>/img/svg/facebook.svg" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="nav-footer col col-lg-3 col-md-4 col-sm col-12">
                    <a class="nav-footer-link" href="/about_complex.php?about">О комплексе</a>
                    <a class="nav-footer-link" href="/watch.php">Посмотреть</a>
                    <a class="nav-footer-link" href="/about_complex.php?location">Район</a>
                    <a class="nav-footer-link" href="/list_elements.php?table=apartments">Католог квартир</a>
                    <a class="nav-footer-link" href="/list_elements.php?table=news">Новости</a>
                    <?if($_SESSION["loginUser"] == true){?>
                        <a class="nav-footer-link" href="/list_elements.php?table=newstenants">Жильцам</a>
                    <?}?>
                    <a class="nav-footer-link" href="#footer">Контакты</a>
                    <a class="nav-footer-link" href="/form-login.php">Личный кабинет</a>
                </div>
            </div>
        </div>
    </footer>
    <div class="theme_switch">
        <div class="theme_switch_dark"><img src="<?=$Resources?>/img/svg/sun-fill.svg" alt=""></div>
        <div class="theme_switch_white"><img src="<?=$Resources?>/img/svg/moon-fill.svg" alt=""></div>
    </div>

    <!-- script, libs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="<?=$Resources?>/js/jquery.maskedinput.min.js"></script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxBEsYGeUks_yd5SGN1W53ZIoJqdILDF4&libraries=geometry&callback=initMap"></script>
    <script src="<?=$Resources?>/js/stickjaw.js"></script>
    <script src="<?=$Resources?>/js/for-libs.js"></script>
    <script src="<?=$Resources?>/js/main.js"></script>
    <script src="<?=$Resources?>/js/functional_main.js"></script>
    <script>
        if (!(window.ActiveXObject) && "ActiveXObject" in window) {
            document.body.innerHTML = '<div class="error-web">Данный сайт не поддерживается в этом браузере.</div>';
        }
    </script>
</body>

</html>