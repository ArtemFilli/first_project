<?session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$Resources?>/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$Resources?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$Resources?>/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playfair+Display:wght@700&family=Raleway&display=swap"
        rel="stylesheet">
    <!-- main style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$Resources?>/css/reset.min.css">
    <link rel="stylesheet" href="<?=$Resources?>/css/main.min.css">
    <link rel="stylesheet" href="<?=$Resources?>/css/media.css">
    <script src='https://cdn.tiny.cloud/1/hf4epni4md7xvmab57k56k58fyqvc8j66g36585eac2rzxcp/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: '#mytextarea'
        });
    </script>
    <title><?= $title?></title>
</head>

<body class="__lock">
    <div class="page_loading">
        <img src="<?=$Resources?>/img/load.gif" alt="">
    </div>
    
    <header class="header">
        <div class="line"></div>
        <div class="header-container container-xl">
            <div class="logo-header"><a class="logo-link" href="/">
                    <h1 class="title">Гармония</h1>
                    <p class="sub-title">Жилой комплекс</p>
                </a>
                <div class="mobile-back">
                  <img src="<?=$Resources?>/img/svg/box-arrow-right.svg" alt="">
                </div>
            </div>
            <div class="nav">
                <div class="nav-list">
                    <a href="/about_complex.php?about">О комплексе</a>
                    <a href="/watch.php">Посмотреть</a>
                    <a href="/about_complex.php?location">Район</a>
                    <a href="/list_elements.php?table=apartments">Католог квартир</a>
                    <a href="/list_elements.php?table=news">Новости</a>
                    <?if($_SESSION["loginUser"] == true){?>
                        <a href="/list_elements.php?table=newstenants">Жильцам</a>
                    <?}?>
                    <a href="#footer">Контакты</a>
                    <a href="/form-login.php">Личный кабинет</a></div>
                <div class="burger-wrapper">
                    <div class="burger"><img src="<?=$Resources?>/img/svg/list.svg" alt=""></div>
                </div>
            </div>
        </div>
    </header>