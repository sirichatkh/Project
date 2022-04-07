<?php
require_once("_config.php");
$title = "วิธีการจองห้องต่าง ๆ";
?>
<?php require_once("_header.php"); ?>
<br>
<h1 class="text-center my-4">วิธีการจองห้องต่าง ๆ</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border-radius:20px">
                <div class="card-body" style="margin:30px">
                    <h3>วิธีการจองห้องเรียน</h3>
                    <img src="Resouces/Images/B_Computer_Lab.jpg" class="rounded float-end" alt="Image" width="40%" height="30%">
                    <h4>ผู้ที่มีสิทธิ์ในการจองห้องเรียน</h4>
                    <p>
                    1.บุคลากรคณะวิทยาลัยการคอมพิวเตอร์เท่านั้น
                    </p>
                    <h4>หมายเหตุ</h4>
                    <p>
                    1.ท่านสามารถเข้าสู่ระบบได้ที่ <a href="https://appcs.kku.ac.th/rlab/admin.php" target="_blank">https://appcs.kku.ac.th/rlab/admin.php</a>
                    <br>
                    2.การเข้าสู่ระบบจะใช้รหัสผ่านเดียวกันกับ kku net
                    <br>
                    3.เมื่อเข้าสู่ระบบแล้วระบบจะแสดงตารางปฏิทินการจองห้องปฏิบัติการ
                    <br> 
                    4.ท่านสามารถทำการจองห้องปฏิบัติการด้วยตนเองโดยการเลือกห้องตามวันและเวลาที่ต้องการ
                    <br>
                    5. เมื่อบันทึกการจองห้องปฏิบัติการเรียบร้อยแล้วระบบจะแสดงสถานะ “กำลังรออนุมัติ” (ขึ้นสีเขียวอ่อน)
                    <br>
                    เมื่อรายการได้รับการอนุมัติแล้วจะแสดงเป็นสีเขียวเข้ม โดยผู้ที่จะอนุมัติการใช้ห้องปฏิบัติการมีรายนาม
                    <br>
                    <a href="https://appcs.kku.ac.th/rlab/usmrlab.pdf" target="_blank">รายละเอียดเพิ่มเติม</a>
                    </p>      
                    <a href="https://appcs.kku.ac.th/rlab/day.php?year=<?php echo date("Y") ?>&month=<?php echo date("m") ?>&day=<?php echo date("d") ?>&area=3" target="_blank"><button type="button" class="btn btn-outline-primary">จองห้องเรียน</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border-radius:20px">
                <div class="card-body" style="margin:30px">
                    <h3>วิธีการจองห้องประชุม</h3>
                    <img src="Resouces/Images/B_Meeting_Room.jpg" class="rounded float-end" alt="Image" width="40%" height="30%">
                    <h4>ผู้ที่มีสิทธิ์ในการจองห้องประชุม</h4>
                    <p>
                    1.อาจารย์และเจ้าหน้าที่ สังกัดคณะวิทยาลัยการคอมพิวเตอร์
                    <br>
                    2.หากนักศึกษาต้องการจองห้องประชุม กรุณาติดต่อจองห้องประชุมได้ที่สารบรรญภาควิชาฯ
                    <br>
                    โดยโหลด<a href="https://cs.kku.ac.th/rroom/file/form.doc" target="_blank">แบบฟอร์มขอใช้ห้องประชุมได้ที่นี่</a>
                    <h4>หมายเหตุ</h4>
                    <p>
                    1.กรุณาตรวจสอบเวลาของการจองห้องประชุมก่อนยืนยัน
                    <br>
                    2.เพื่อให้เกิดความสะดวกในการติดต่อ กรุณาระบุเบอร์โทรศัพท์ในการติดต่อกลับกรณีเกิดปัญหาทุกครั้ง
                    <br>
                    3.การจองห้องประชุมใช้ระบบคิวหมายถึง ใครจองก่อนได้ก่อน
                    <br> 
                    4.การจองห้องประชุมจะให้สิทธิ์การประชุมที่มีความสำคัญมากกว่าเสมอ หากมีการจองห้องประชุมก่อนแล้ว
                    <br>
                    ล่วงหน้าเจ้าหน้าที่จะติดต่อเพื่อแจ้งยกเลิกการจอง
                    <br>
                    5.ติดต่อผู้ดูแลระบบ <a href="mailto:sutoch@kku.ac.th">sutoch@kku.ac.th</a> เบอร์โทรศัพท์ภายใน 44460
                    </p>
                    <!--<h4>ขั้นตอนการใช้งานระบบจองห้องประชุม</h4>-->
                    </p>
                    <div class="BMR">
                        <a href="https://appcs.kku.ac.th/rroom/day.php?year=<?php echo date("Y") ?>&month=<?php echo date("m") ?>&day=<?php echo date("d") ?>&area=2" target="_blank"><button type="button" class="btn btn-outline-primary">จองห้องประชุม</button></a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
<?php require_once("_footer.php"); ?>