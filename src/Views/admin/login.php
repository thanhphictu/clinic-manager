<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASE_URL ?>public/plugins/fontawesome-free-6.1.1-web/css/all.min.css">
    <link href="<?= BASE_URL ?>public/assets/login.css" rel="stylesheet" />

    <script type="text/javascript" src="<?= BASE_URL ?>public/plugins/jquery3.6.0/jquery-3.6.0.min.js"></script>
    <title>Đăng Nhập</title>
</head>

<body>
    <div class="login-main">
        <div class="container-login">
            <div class="row-login">
                <div class="img-login-main m-base-0">
                    <div class="left-login">
                        <div class="title-login">
                            Đăng Nhập
                        </div>
                        <div class="describe-left">
                            Chào mừng bạn đến với trang quán lý. Đăng để làm nhiều thứ hơn !!
                        </div>
                    </div>
                </div>
                <div class="login-area m-base-12">
                    <form class="form-login" name="form-login-user" id="form-login" method="POST" action="<?= BASE_URL ?>LoginController/checkLogin">
                        <div class="right-login">
                            <div class="email-user">
                                <div class="title-email">
                                    Tài Khoản
                                </div>
                                <div class="input-email">
                                    <input class="input-user-email email" type="text" name="user" placeholder="Nhập tài khoản của bạn" required>
                                    <span class="effect-input"></span>
                                </div>


                            </div>
                            <div class="password-user">
                                <div class="title-password title-email">
                                    Mật Khẩu
                                </div>
                                <div class="input-password input-email">
                                    <input class="input-user-password password" type="password" name="password" placeholder="Nhập mật khẩu của bạn" minlength="5" maxlength="50" required>
                                    <span class="effect-input"></span>

                                    <div class="see-pass-icon">
                                        <i class="fas fa-eye"></i>
                                        <i class="fas fa-eye-slash"></i>
                                    </div>
                                </div>

                            </div>

                            <div class="msg-login">
                                <?php
                                echo $data[0];
                                ?>
                            </div>

                            <div class="btn-submit">
                                <button class="submit-login" type="submit">
                                    Đăng Nhập
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>


        </div>
    </div>


    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= BASE_URL ?>public/assets/login.js"></script>


</body>

</html>