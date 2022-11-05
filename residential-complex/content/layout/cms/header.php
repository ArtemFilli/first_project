<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$Resources?>/img/favicon_cms/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$Resources?>/img/favicon_cms/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$Resources?>/img/favicon_cms/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <!-- main style -->
    
    <link rel="stylesheet" href="<?=$Resources?>/css/reset.min.css">
    <link rel="stylesheet" href="<?=$Resources?>/css/main_cms.min.css">
    <title>MyCMS</title>
    <!-- other -->
    <script src='https://cdn.tiny.cloud/1/hf4epni4md7xvmab57k56k58fyqvc8j66g36585eac2rzxcp/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: '#mytextarea'
        });
    </script>
</head>

<body class="__lock">
    <div class="page_loading">
        <img src="<?=$Resources?>/img/load.gif" alt="">
    </div>
    
    <header class="col-lg-3 col-2">
        <div class="container-fluid wrapper-border-bottom static-elem">
            <h1 class="title-1 _text-clipping"> <a href="/admin/working/index.php">MyCMS</a></h1>
        </div>
        <div class="container-fluid static-elem wrapper-border-bottom">
            <?
                
                $idEmpl = $_SESSION["id"];
                $empl = new run();
                $result = $empl->db->query("SELECT * FROM employee WHERE id=" . $idEmpl);
                $pic = explode(',' ,$result[0][pic]);
            ?>
            <div class="profile">
                <a class="profile-link" href="/admin/working/personal_account.php">
                    <div class="profile-img-blc">
                        <div class="profile-img-wrapper">
                            <img src="<?=$Resources?><?= $pic[0] == "nophoto.jpg" ? "/img/$pic[0]" : "/img/employee/$pic[0]"?>" alt="">
                        </div>
                    </div>
                    <div class="profile-description _text-clipping">
                        <h2 id="user" class="title-2"><?=$result[0][login]?></h2>
                        <p><?=$result[0][email]?></p>
                    </div>
                </a>
            </div>
        </div>
        <div class="container-fluid container-for-scroll wrapper-border-bottom">
            <div class="task _text-clipping">
                <a class="task-one" href="/">
                    <div class="task-one-img"><img src="<?=$Resources?>/img/svg/box-arrow-in-left.svg" alt=""></div>
                    <p>Вернуться на сайт</p>
                </a>
                <?if($_SESSION["role"] == "administrator"){?>
                <a class="task-one" href="/admin/working/changing_table.php?table=apartments">
                    <div class="task-one-img"><img src="<?=$Resources?>/img/svg/house.svg" alt=""></div>
                    <p>Контент "Квартиры"</p>
                </a>
                <a class="task-one" href="/admin/working/changing_table.php?table=newstenants">
                    <div class="task-one-img"><img src="<?=$Resources?>/img/svg/info-circle.svg" alt=""></div>
                    <p>Контент "Жильцам"</p>
                </a>
                <a class="task-one" href="/admin/working/changing_table.php?table=news">
                    <div class="task-one-img"><img src="<?=$Resources?>/img/svg/newspaper.svg" alt=""></div>
                    <p>Контент "Новости"</p>
                </a>
                <a class="task-one" href="/admin/working/employee.php?table=employee">
                    <div class="task-one-img"><img src="<?=$Resources?>/img/svg/person-circle.svg" alt=""></div>
                    <p>Пользователи MyCMS</p>
                </a>
                <a class="task-one" href="/admin/working/users.php?table=users">
                    <div class="task-one-img"><img src="<?=$Resources?>/img/svg/contacts.svg" alt=""></div>
                    <p>Пользователи сайта</p>
                </a>
                <a class="task-one" href="/admin/working/meeting_requests.php?table=applications">
                    <div class="task-one-img"><img src="<?=$Resources?>/img/svg/email.svg" alt=""></div>
                    <p>Заявки на встречу</p>
                </a>
                <?}?>
                <?if($_SESSION["role"] == "content"){?>
                    <a class="task-one" href="/admin/working/changing_table.php?table=apartments">
                        <div class="task-one-img"><img src="<?=$Resources?>/img/svg/Chat.svg" alt=""></div>
                        <p>Контент "Квартиры"</p>
                    </a>
                    <a class="task-one" href="/admin/working/changing_table.php?table=newstenants">
                        <div class="task-one-img"><img src="<?=$Resources?>/img/svg/Chat.svg" alt=""></div>
                        <p>Контент "Жильцам"</p>
                    </a>
                    <a class="task-one" href="/admin/working/changing_table.php?table=news">
                        <div class="task-one-img"><img src="<?=$Resources?>/img/svg/Chat.svg" alt=""></div>
                        <p>Контент "Новости"</p>
                    </a>
                    <a class="task-one" href="/admin/working/meeting_requests.php?table=applications">
                        <div class="task-one-img"><img src="<?=$Resources?>/img/svg/email.svg" alt=""></div>
                        <p>Заявки на встречу</p>
                    </a>
                <?}?>
                <?if($_SESSION["role"] == "manager"){?>
                    <a class="task-one" href="/admin/working/meeting_requests.php?table=applications">
                        <div class="task-one-img"><img src="<?=$Resources?>/img/svg/email.svg" alt=""></div>
                        <p>Заявки на встречу</p>
                    </a>
                <?}?>
            </div>
        </div>
        <div class="container-fluid static-elem">
            <div class="task settings">
                <a class="task-one" href="/admin/working/FQA.php">
                    <div class="task-one-img">
                        <img src="<?=$Resources?>/img/svg/settings.svg" alt="">
                    </div>
                    <p>Справка</p>
                </a>
            </div>
        </div>
    </header>