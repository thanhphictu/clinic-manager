<div class="position-profile">
    <div class="position-profile-update">
        <label for="position">Chọn Bác Sĩ</label>
    </div>
    <div class="position-profile-input">
        <select name="positionid" id="position">
            <option value="P0">Bác Sĩ A</option>
            <option value="P1">Bác Sĩ Ngoại Khoa A</option>
            <option value="P2">Bác Sĩ Nội Khoa A </option>
            <option value="P3">Nha Sĩ A</option>
            <option value="P4">Bác Sĩ Đa Khoa A</option>
        </select>
    </div>
</div>

<div class="wrapper">
    <label>
        <!--     <input data-provide="datepicker" required="required"> -->
        <input type="text" class="dateselect" name="date-appointment" required="required" />
        <span>Chọn ngày</span>
    </label>
</div>

<div class="position-profile">
    <div class="position-profile-update">
        <label for="position">Chọn Giờ</label>
    </div>
    <div class="position-profile-input">
        <select name="positionid" id="position">
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



<button type="submit" class="btn-execute">
    tạo
</button>

</div>

</form>
</div>

</div>
<script src="<?= BASE_URL ?>public/assets/appointment.js"></script>
</div><?php /**PATH F:\xampp\htdocs\baocaoCNweb\src\Views/admin/apmPageSecond.blade.php ENDPATH**/ ?>