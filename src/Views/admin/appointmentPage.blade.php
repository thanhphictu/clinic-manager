<div class="container">


</div>
<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="msg-apm">

            </div>
            <form id="form-appointment">

                <div class="handle-profile">
                    <div class="title-revise-profile">
                        ĐẶT LỊCH HẸN KHÁM BỆNH
                    </div>

                    <div class="container-handle-profile">
                        <div class="name-profile">
                            <div class="name-profile-update">
                                Họ tên người đặt lịch
                            </div>
                            <div class="name-profile-input">
                                <input type="text" name="customerName" placeholder="Nhập tên của người đặt lịch" require>
                                <span class="text-bottom"></span>
                                <span class="text-right"></span>
                                <span class="text-top"></span>
                                <span class="text-left"></span>

                            </div>

                        </div>

                        <div class="name-profile">
                            <div class="name-profile-update">
                                Email người đặt lịch
                            </div>
                            <div class="name-profile-input">
                                <input type="text" name="customerEmail" placeholder="Nhập email của người đặt lịch" require>
                                <span class="text-bottom"></span>
                                <span class="text-right"></span>
                                <span class="text-top"></span>
                                <span class="text-left"></span>

                            </div>

                        </div>
                        <div class="row">
                            <div class="wrapper col-6 col-xs-12">
                                <label>
                                    <!--     <input data-provide="datepicker" required="required"> -->
                                    <input type="text" class="dateselect" name="date" required="required" />
                                    <span>Chọn ngày</span>
                                </label>
                            </div>

                            <div class="time-select col-6 col-xs-12">
                                <div class="time-select-update">
                                    <label for="position">Chọn Giờ</label>
                                </div>
                                <div class="time-select-input">
                                    <select name="timetype" id="time">
                                        <?php
                                        foreach ($timeAllcode as $element) {
                                        ?>
                                            <option value="<?= $element->keymap ?>"><?= $element->value ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="name-profile">
                            <div class="name-profile-update">
                                Ghi chú khi khám bệnh
                            </div>
                            <div class="name-profile-input">
                                <input type="text" name="note" placeholder="Lý do, sức khỏe, bệnh tình, ghi chú với bác sĩ" require>
                                <span class="text-bottom"></span>
                                <span class="text-right"></span>
                                <span class="text-top"></span>
                                <span class="text-left"></span>

                            </div>

                        </div>
                        <div class="position-profile">
                            <div class="position-profile-update">
                                <label for="position">Chọn Chuyên Khoa</label>
                            </div>
                            <div class="position-profile-input">
                                <select name="positionid" id="position">
                                    <option selected hidden style="display:none">Chọn chuyên khoa</option>
                                    <?php
                                    foreach ($positionAllcode as $element) {
                                    ?>
                                        <option value="<?= $element->keymap ?>"><?= $element->value ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>