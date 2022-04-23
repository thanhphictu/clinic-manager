<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/plugins/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/style.css">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>public/images/favicon.ico">

    <link rel="stylesheet" href="<?= BASE_URL ?>public/plugins/datepicker/css/bootstrap-datepicker.min.css">
    <script type="text/javascript" src="<?= BASE_URL ?>public/plugins/jquery3.6.0/jquery-3.6.0.min.js"></script>
    <title>Clinic Manager</title>
</head>

<body>
    <div class="container-page">
        <div class="navigation-sidebar">
            <div class="logo-main">
                <a href="<?= BASE_URL ?>">
                    <div class="logo-main-content">
                        <img src="<?= BASE_URL ?>public/images/logo-main.png" alt="logo-main">

                    </div>
                </a>
            </div>
            <ul>
                <li class="item-sidebar">
                    <a href="<?= BASE_URL ?>indexController">
                        <span class="display-hovered icon-sidebar">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="none-hovered icon-sidebar">
                            <ion-icon name="home-sharp"></ion-icon>
                        </span>

                        <span class="title-sidebar">
                            Trang Chủ
                        </span>
                    </a>
                </li>
                <li class="item-sidebar">
                    <a href="<?= BASE_URL ?>UserController">
                        <span class="display-hovered icon-sidebar">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="none-hovered icon-sidebar">
                            <ion-icon name="person-sharp"></ion-icon>
                        </span>

                        <span class="title-sidebar">
                            Tạo Tài Khoản
                        </span>
                    </a>
                </li>
                <li class="item-sidebar">
                    <a href="<?= BASE_URL ?>AppointmentController">
                        <span class="display-hovered icon-sidebar">
                            <ion-icon name="calendar-outline"></ion-icon>
                        </span>
                        <span class="none-hovered icon-sidebar">
                            <ion-icon name="calendar-sharp"></ion-icon>
                        </span>

                        <span class="title-sidebar">
                            Lịch Khám
                        </span>
                    </a>
                </li>
                <li class="item-sidebar">
                    <a href="<?= BASE_URL ?>CovidController">
                        <span class="display-hovered icon-sidebar">
                            <ion-icon name="medical-outline"></ion-icon>
                        </span>
                        <span class="none-hovered icon-sidebar">
                            <ion-icon name="medical-sharp"></ion-icon>
                        </span>

                        <span class="title-sidebar">
                            Tình Hình COVID-19
                        </span>
                    </a>
                </li>
                <li class="item-sidebar">
                    <a href="<?= BASE_URL ?>LoginController/logout">
                        <span class="display-hovered icon-sidebar">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="none-hovered icon-sidebar">
                            <ion-icon name="log-out-sharp"></ion-icon>
                        </span>
                        <span class="title-sidebar">

                            Đăng Xuất
                        </span>
                    </a>
                </li>
            </ul>
        </div>