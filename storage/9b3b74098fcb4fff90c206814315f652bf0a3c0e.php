<div class="info-doctor">
    <div class="container">
        <div class="row">
            <?php
            if (isset($data)) {
                foreach ($data as $item) {
            ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <article class="material-card Red">
                            <h2>
                                <span> <?= $item->lastName ?> <?= $item->firstName ?></span>
                                <strong>
                                    <label for="<?= $item->id ?>" id="label-<?= $item->id ?>" class="label-sl-dr">
                                        <i class="fa fa-fw fa-star"></i>
                                        <div>Chọn bác sĩ</div>
                                    </label>

                                    <input type="radio" class="select-doctor dr-select-<?= $item->id ?>" id="<?= $item->id ?>" name="doctorid" value="<?= $item->id ?>" hidden>
                                </strong>
                            </h2>
                            <label for="<?= $item->id ?>">
                                <div class="mc-content">
                                    <div class="img-container">
                                        <img class="img-responsive" style="width: 100%;" src="<?= BASE_URL . PATH_UPLOAD_IMAGES . $item->image  ?>">
                                    </div>
                                    <div class="mc-description">
                                        <?= $item->description ?>
                                    </div>
                                </div>
                            </label>
                            <a class="mc-btn-action">
                                <i class="fa fa-bars"></i>
                            </a>
                            <div class="mc-footer">
                                <h4>
                                    Social
                                </h4>
                                <a class="fa-brands fa-facebook-f"></a>
                                <a class="fa-brands fa-twitter"></a>
                                <a class="fa-brands fa-linkedin-in"></a>
                                <a class="fa-brands fa-google-plus-g"></a>
                            </div>
                        </article>
                    </div>

            <?php
                }
            }
            ?>
        </div>


    </div>
</div><?php /**PATH F:\xampp\htdocs\baocaoCNweb\src\Views/admin/infoDoctor.blade.php ENDPATH**/ ?>