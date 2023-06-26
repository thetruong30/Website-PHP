<div class="boxtrai mr">
    <div class="row mb">
        <div class="boxtitle">QUÊN MẬT KHẨU</div>
        <div class="row boxcontent dkitv mt">
            <form action="index.php?act=quenmk" method="post" >
                <div class="row mb10">
                <label for="">email</label><br>
                <input type="email" name="email" id=""><br>
                
                </div>
                <input type="submit" value="Gửi" name="guiemail">
                <input type="hidden" name="vai_tro" value="0">
                <input type="hidden" name="kich_hoat" value="0">
                <input type="reset" value="Nhập lại">
            </form>
            <?php
            if(isset($thongbao)&& $thongbao!=""){
                echo "<p style='color:red'>$thongbao</p>";
            } ?>
        </div>
    </div>
</div>
<div class="boxphai">
    <?php
    include "view/boxright.php";
    ?>
</div>
</div>