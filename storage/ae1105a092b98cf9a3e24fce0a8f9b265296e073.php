<div class="col-4">
    <form action="<?= BASE_URL ?>indexController/updateUserById" method="POST" enctype="multipart/form-data">
        <div class="handle-profile">
            <div class="title-revise-profile">
                Chỉnh sửa thông tin
            </div>
            <div class="container-handle-profile">

                <div class="name-profile">
                    <div class="name-profile-update">
                        Email
                    </div>
                    <div class="name-profile-input">
                        <input type="text" name="email" value="<?= $dataById->email ?>" placeholder="Nhập email bác sĩ">
                        <span class="text-bottom"></span>
                        <span class="text-right"></span>
                        <span class="text-top"></span>
                        <span class="text-left"></span>

                    </div>

                </div>
                <div class="name-profile">
                    <div class="name-profile-update">
                        Họ bác sĩ
                    </div>
                    <div class="name-profile-input">
                        <input type="text" name="lastName" value="<?= $dataById->lastName ?>" placeholder="Nhập tên bác sĩ">
                        <span class="text-bottom"></span>
                        <span class="text-right"></span>
                        <span class="text-top"></span>
                        <span class="text-left"></span>

                    </div>

                </div>

                <div class="name-profile">
                    <div class="name-profile-update">
                        Tên bác sĩ
                    </div>
                    <div class="name-profile-input">
                        <input type="text" name="firstName" value="<?= $dataById->firstName ?>" placeholder="Nhập tên bác sĩ">
                        <span class="text-bottom"></span>
                        <span class="text-right"></span>
                        <span class="text-top"></span>
                        <span class="text-left"></span>

                    </div>

                </div>

                <div class="name-profile">
                    <div class="name-profile-update">
                        Mô tả bác sĩ
                    </div>
                    <div class="name-profile-input">
                        <input type="text" name="description" value="<?= $dataById->description ?>" placeholder="Nhập mô tả bác sĩ">
                        <span class="text-bottom"></span>
                        <span class="text-right"></span>
                        <span class="text-top"></span>
                        <span class="text-left"></span>

                    </div>

                </div>

                <div class="image-profile">
                    <div class="name-profile-update">
                        Hình ảnh bác sĩ
                    </div>
                    <div class="image-user">
                        <label for="imgUser" id="label-imgUser">
                            <div class="btn-upload-imgUser">Chọn ảnh</div>
                        </label>
                        <input type="file" name="image" id="imgUser" default="<?= $dataById->image ?>" hidden require>
                        <input type="text" name="oldImg" value="<?= $dataById->image ?>" hidden>
                        <span class="text-bottom"></span>
                        <span class="text-right"></span>
                        <span class="text-top"></span>
                        <span class="text-left"></span>
                        <a href="<?= BASE_URL . PATH_UPLOAD_IMAGES . $dataById->image  ?>" data-toggle="lightbox">
                            <img class="img-fluid" style="width: 250px;object-fit: cover; border-radius: 8px; margin-bottom: 10px;" src="<?= BASE_URL . PATH_UPLOAD_IMAGES . $dataById->image  ?>" alt="">
                        </a>

                    </div>
                </div>
                <div class="position-profile">
                    <div class="position-profile-update">
                        <label for="position">Chức Vụ</label>
                    </div>
                    <div class="position-profile-input">

                        <select name="positionid" id="position">

                            <option value="P0" <?php if ($dataById->positionid === "P0") {
                                                    echo "selected";
                                                } ?>>Bác Sĩ</option>
                            <option value="P1" <?php if ($dataById->positionid === "P1") {
                                                    echo "selected";
                                                } ?>>Bác Sĩ Ngoại Khoa</option>
                            <option value="P2" <?php if ($dataById->positionid === "P2") {
                                                    echo "selected";
                                                } ?>>Bác Sĩ Nội Khoa</option>
                            <option value="P3" <?php if ($dataById->positionid === "P3") {
                                                    echo "selected";
                                                } ?>>Nha Sĩ</option>
                            <option value="P4" <?php if ($dataById->positionid === "P4") {
                                                    echo "selected";
                                                } ?>>Bác Sĩ Đa Khoa</option>
                        </select>
                    </div>
                </div>
                <div class="price-profile">
                    <div class="name-profile-update">
                        Giá khám
                    </div>
                    <div class="position-profile-input">
                        <select name="price" id="price">

                            <option value="PRI1" <?php if ($dataById->price === "PRI1") {
                                                        echo "selected";
                                                    } ?>>200.000đ</option>
                            <option value="PRI2" <?php if ($dataById->price === "PRI2") {
                                                        echo "selected";
                                                    } ?>>250.000đ</option>
                        </select>

                    </div>
                </div>
            </div>

            <button type="submit" class="btn-execute" name="idUpdate" value="<?= $dataById->id ?>">
                Cập Nhật
            </button>

        </div>

    </form>

</div>
</div>
</div>
</div>
</div><?php /**PATH F:\xampp\htdocs\baocaoCNweb\src\Views/admin/handleHomePage.blade.php ENDPATH**/ ?>