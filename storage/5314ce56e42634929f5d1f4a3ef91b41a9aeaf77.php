<div class="container-main">
    <div class="card-box">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="item-cardBox">
                        <div class="title-cardBox">
                            <div class="quantity-cardBox">
                                1645
                            </div>
                            <div class="name-cardBox">
                                Lượt truy cập
                            </div>
                        </div>
                        <div class="icon-cardBox">
                            <ion-icon name="eye-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="item-cardBox">
                        <div class="title-cardBox">
                            <div class="quantity-cardBox">
                                489
                            </div>
                            <div class="name-cardBox">
                                Số lịch khám đã đặt
                            </div>
                        </div>
                        <div class="icon-cardBox">
                            <ion-icon name="checkmark-done-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="item-cardBox">
                        <div class="title-cardBox">
                            <div class="quantity-cardBox">
                                694
                            </div>
                            <div class="name-cardBox">
                                Tư vấn
                            </div>
                        </div>
                        <div class="icon-cardBox">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="item-cardBox">
                        <div class="title-cardBox">
                            <div class="quantity-cardBox">
                                $64.673
                            </div>
                            <div class="name-cardBox">
                                Doanh thu
                            </div>
                        </div>
                        <div class="icon-cardBox">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="load-profile">
                        <div class="title-load-profile">
                            Hồ Sơ Hiện Tại
                        </div>

                        <div class="all-user">
                            <table style="width: 100%; text-align: center;">
                                <thead>
                                    <tr>
                                        <td>Tên</td>
                                        <td>Chức Vụ</td>
                                        <td>Giá Khám</td>
                                        <td>Thao Tác</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="" method="GET">
                                        <?php

                                        foreach ($data as $key) {
                                        ?>
                                            <tr>
                                                <td class="col-3"><?= $key->lastName ?> <?= $key->firstName ?></td>
                                                <td class="col-3"><?= $key->allCodePosition->value ?></td>
                                                <td class="col-2"><?= number_format($key->allCodePrice->value, 0, '.', ',') ?>đ</td>
                                                <td class="col-4">
                                                    <div class="upate-delete">
                                                        <button type="submit" class="update-profile" name="update" value="<?= $key->id ?>">
                                                            Cập Nhật
                                                        </button>
                                                        <span class=" devide">|</span>
                                                        <button type="submit" class="delete-profile" name="delete" value="<?= $key->id ?>">
                                                            Xóa
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </form>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><?php /**PATH F:\xampp\htdocs\baocaoCNweb\src\Views/admin/homePage.blade.php ENDPATH**/ ?>