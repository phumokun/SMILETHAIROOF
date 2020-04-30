<form action="layouts/action-change-password-db.php?id=<?php echo $_SESSION['id']; ?>" method="post" enctype="multipart/form-data">
    <div class="dasboard-wrap fl-wrap">
        <div class="box-widget-item-header">
            <h3>เปลี่ยนพาสเวิร์ด</h3>
        </div>

        <div class="custom-form no-icons">
            <div class="pass-input-wrap fl-wrap">
                <label>รหัสผ่านเดิม</label>
                <input type="password" name="current_password" class="pass-input" placeholder="" value=""/>
                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
            </div>
            <div class="pass-input-wrap fl-wrap">
                <label>รหัสผ่านใหม่</label>
                <input type="password" name="password" id="password" class="pass-input" placeholder="" value="" minlength="6" required style="margin-bottom:10px"/>
                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span> 
            </div>
            <p style="text-align:left ; font-size:12px">ความปลอดภัยของรหัส : <span id="result"> </span></p>
            <div class="pass-input-wrap fl-wrap">
                <label>ยินยันรหัสผ่าน</label>
                <input type="password" name="con_password" id="con_password" class="pass-input" placeholder="" value="" minlength="6" required/>
                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
            </div>
            <button type="submit" name="change_password" class="btn  big-btn  color2-bg flat-btn float-btn">บันทึก<i class="fal fa-save"></i></button>
        </div>
    </div>
</form>
                                