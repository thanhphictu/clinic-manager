<?php
if ($data[0] === "update") { ?>
    <div class="col-4">
        <div class="msg-done-create-user">

        </div>
    <?php
} else {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="msg-done-create-user">

                    </div>
                <?php
            }
                ?>
                <form id="form-create-user" enctype="multipart/form-data">

                    <div class="handle-profile">
                        <div class="title-revise-profile">
                            Tạo tài khoản
                        </div>
                        <div class="msg-create-user">

                        </div>
                        <div class="container-handle-profile">
                            <div class="name-profile">
                                <div class="name-profile-update">
                                    Email
                                </div>
                                <div class="name-profile-input">
                                    <input class="form-data-create-user" type="text" name="email" placeholder="Nhập email bác sĩ" require>
                                    <span class="text-bottom"></span>
                                    <span class="text-right"></span>
                                    <span class="text-top"></span>
                                    <span class="text-left"></span>

                                </div>

                            </div>
                            <div class="name-profile">
                                <div class="name-profile-update">
                                    Mật Khẩu
                                </div>
                                <div class="name-profile-input">
                                    <input class="form-data-create-user" type="text" name="password" placeholder="Nhập mật khẩu bác sĩ" require>
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
                                    <input class="form-data-create-user" type="text" name="lastName" placeholder="Nhập tên bác sĩ" require>
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
                                    <input class="form-data-create-user" type="text" name="firstName" placeholder="Nhập tên bác sĩ" require>
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
                                    <input class="form-data-create-user" type="text" name="description" placeholder="Nhập mô tả bác sĩ" require>
                                    <span class="text-bottom"></span>
                                    <span class="text-right"></span>
                                    <span class="text-top"></span>
                                    <span class="text-left"></span>

                                </div>

                            </div>
                            <?php
                            if ($data[0] === "update") { ?>

                                <div class="name-profile">
                                <?php
                            } else {
                                ?>
                                    <div class="row">
                                        <div class="name-profile col-3 col-xs-12">
                                        <?php
                                    }
                                        ?>
                                        <div class="name-profile-update">
                                            Hình ảnh bác sĩ
                                        </div>
                                        <div class="image-user">
                                            <label for="imgUser" id="label-imgUser">
                                                <div class="btn-upload-imgUser">Chọn ảnh</div>
                                            </label>
                                            <input class="form-img-create-user" id="imgUser" type="file" name="image" hidden require>
                                            <span class="text-bottom"></span>
                                            <span class="text-right"></span>
                                            <span class="text-top"></span>
                                            <span class="text-left"></span>
                                        </div>
                                        </div>
                                        <?php if ($data[0] === "update") { ?>

                                            <div class="position-profile">
                                            <?php
                                        } else {
                                            ?>
                                                <div class="position-profile col-4 col-xs-12">
                                                <?php
                                            }

                                                ?>

                                                <div class="position-profile-update">
                                                    <label for="position">Chức Vụ</label>
                                                </div>
                                                <div class="position-profile-input">
                                                    <select class="form-data-create-user" name="positionid" id="position">
                                                        <option value="P0">Bác Sĩ</option>
                                                        <option value="P1">Bác Sĩ Ngoại Khoa</option>
                                                        <option value="P2">Bác Sĩ Nội Khoa</option>
                                                        <option value="P3">Nha Sĩ</option>
                                                        <option value="P4">Bác Sĩ Đa Khoa</option>
                                                    </select>
                                                </div>
                                                </div>

                                                <?php if ($data[0] === "update") { ?>
                                                    <div class="price-profile">
                                                    <?php
                                                } else {
                                                    ?>
                                                        <div class="price-profile col-4 col-xs-12">
                                                        <?php
                                                    }
                                                        ?>
                                                        <div class="name-profile-update">
                                                            Giá khám
                                                        </div>
                                                        <div class="position-profile-input">
                                                            <select class="form-data-create-user" name="price" id="price">
                                                                <option value="PRI1">200.000đ</option>
                                                                <option value="PRI2">250.000đ</option>
                                                            </select>

                                                        </div>
                                                        </div>
                                                    </div>

                                            </div>

                                            <button type="submit" class="btn-execute" id="btn-submit-create-user">
                                                tạo
                                            </button>

                                    </div>

                </form>
                </div>

            </div>
            <script>
                // create new user form

                let btnSubmitCreate = document.getElementById("btn-submit-create-user");
                let msgCreate = document.querySelector(".msg-create-user");
                let msg_create = document.querySelector(".msg-done-create-user");

                function createUser() {
                    var dataCreateUser = document.getElementsByClassName("form-data-create-user");
                    var imgCreateUser = document.querySelector(".form-img-create-user");
                    var formCreate = document.getElementById("form-create-user");
                    var formCreateData = new FormData();
                    for (var i = 0; i < dataCreateUser.length; i++) {
                        // console.log(dataCreateUser[i].name, dataCreateUser[i].value);
                        formCreateData.append(dataCreateUser[i].name, dataCreateUser[i].value);
                    }
                    formCreateData.append('image', imgCreateUser.files[0]);


                    btnSubmitCreate.disabled = true;

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open('POST', BASE_URL + 'UserController/createUser', true);
                    xmlhttp.send(formCreateData);
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && this.status == 200) {
                            btnSubmitCreate.disabled = false;
                            formCreate.reset();
                            msgCreate.innerHTML = xmlhttp.responseText;
                        }
                    }
                    $.ajax({
                        beforeSend: function() {
                            msg_create.innerHTML = `
                                <div class="loading">
                                    <div class="balls">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>  
            `;
                        },
                        complete: function() {
                            document.querySelector(".loading").classList.add("fadeOut");
                        }
                        // ......
                    });
                }

                btnSubmitCreate.onclick = function() {

                    createUser();
                    return false;

                }
            </script>
        </div>