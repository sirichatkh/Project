<?php
require_once("../_config.php");
$title = "ข้อมูลแผนผังชั้น";
/*checkLogin();*/

$upload_max_size = ini_get('upload_max_filesize');
$maxSize =  intval($upload_max_size); //MB

?>
<?php require_once("_header.php"); ?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#modal">
          เพิ่มข้อมูลแผนผังชั้น
          </button>
          <h5 class="card-title mt-1"><?php echo $title; ?></h5>
        </div>
        <div class="card-body">
          <div id="loading" style="display:none!important;">
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status">
                  <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </div>
          <div class="table-responsive p-2" id="table">
             <table class="table table-light table-hover" id="datatable">
              <thead>
                <tr>
                  <th scope="col" width="5%" data-orderable="false"></th>
                  <th scope="col" width="10%" data-orderable="false"></th>
                  <th scope="col" width="30%" data-orderable="false">รูปภาพเเผนผังชั้น</th>
                  <th scope="col" width="20%">ชั้นที่</th>
                  <th scope="col" width="10%" data-orderable="false"></th>
                  <th scope="col" width="10%" data-orderable="false"></th>
                </tr>
                <tr>
                <?php
                  $sql = "SELECT * FROM floorplan";
                  $result = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_array($result)){
                ?>
                  <th scope="col" width="5%" data-orderable="false"></th>
                  <td scope="col" width="10%" data-orderable="false"><?php echo $row['F_ID']; ?></td>
                  <td scope="col" width="30%" data-orderable="false"><img src="../<?php echo $row['F_Image']; ?>" style="max-width:150px;max-height: 120px;"></td>   
                  <td scope="col" width="20%"><?php echo $row['F_Name']; ?></td>
                  <td scope="col" width="10%" data-orderable="false"><button type='button' class='btn btn-outline-warning' data-bs-toggle="modal" data-bs-target="#modal">เเก้ไข</button></td>
                  <td scope="col" width="10%" data-orderable="false"><button type='button' class='btn btn-outline-danger' data-bs-toggle="modal" data-bs-target="#modal">ลบ</button></td>
                </tr>
                <?php
                }
                ?> 
              </thead>
            </table>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once("_footer.php");?>

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">TITLE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div id="modalLoading" style="display:none!important;">
        <div class="modal-body">
          <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
      </div>
      <form id="form">
        <div class="modal-body">
          <div id="message"></div>
          <input type="hidden" name="action" id="action">
          <input type="hidden" name="F_ID" id="F_ID">
            <div class="mb-3">
              <label for="F_Image" class="form-label">ไฟล์ภาพ <small class="text-muted">รองรับเฉพาะไฟล์รูปภาพนามสกุล .jpg .png</small></label> 
              <input class="form-control" type="file" id="F_Image" name="F_Image" accept="image/*" onchange="checkSize(this)">
              <div id="F_ImageFeedback" class="invalid-feedback"></div>
              <img class="mt-2" id="F_ImageShow" style="max-width:450px;max-height: 220px;">
            </div>
            <div class="mb-3">
              <label for="F_Name" class="form-label">ชั้นที่</label>
              <input type="text" class="form-control" id="F_Name" name="F_Name">
            </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          <a onclink="del"><button type="submit" class="btn btn-primary">บันทึก</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
          <!-- Modal 
          <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="ModalLabel_Add" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel_Add">เพิ่มข้อมูลแผนผังชั้น</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="form">
                    <div id="message"></div>
                    <input type="hidden" name="action" id="action">
                    <input type="hidden" name="F_ID" id="F_ID">
                      <div class="mb-3">
                        <label for="F_Image" class="form-label">ไฟล์ภาพ <small class="text-muted">รองรับเฉพาะไฟล์รูปภาพนามสกุล .jpg .png</small></label> 
                        <input class="form-control" type="file" id="F_Image" name="F_Image" accept="image/*" onchange="checkSize(this)">
                        <div id="F_ImageFeedback" class="invalid-feedback"></div>
                        <img class="mt-2" id="F_ImageShow" style="max-width:450px;max-height: 220px;">
                      </div>
                      <div class="mb-3">
                        <label for="F_Name" class="form-label">ชั้นที่</label>
                        <input type="text" class="form-control" id="F_Name" name="F_Name">
                      </div>
                <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                  <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
              </form>
            </div>
          </div>
        </div> -->

<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
  if(isset($_POST['action'])){

    if($_POST['action'] == "add"){

      $F_Name = $_POST["F_Name"];
      $F_Image = $_POST["F_Image"];

      if(isset($_FILES["F_Image"]) and $_FILES["F_Image"]["tmp_name"] != ""){
        $uploadFile = uploadFile($_FILES["F_Image"],['image/png'=>'png','image/jpeg'=>'jpg'],"/uploads","floor_",$maxSize);
        if(!isset($uploadFile)){
          exit(json_encode(["result"=> 0,"text"=>"ระบบมีปัญหากับการอัพโหลดไฟล์ในขณะนี้"]));
        }
        if($uploadFile["result"] === 0){
          exit(json_encode(["result"=> 0,"text"=>$uploadFile["text"]]));
        }
        else{
          $F_Image = $uploadFile["fileName"];
        }
      }

      $insert = "INSERT INTO floorplan (F_Image, F_Name) VALUES (F_Image, F_Name)";
      if($insert){
        exit(json_encode(["result"=> 1,"text"=>"เพิ่มข้อมูลสำเร็จ"]));
      }
      else{
        exit(json_encode(["result"=> 0,"text"=>"ระบบมีปัญหากับการเพิ่มข้อมูลในขณะนี้"]));
      }
    }



  }
}
?>

<script>

var myModal = new bootstrap.Modal(document.getElementById('modal'), {
  backdrop:'static',
  keyboard: false
});
/*
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
*/

function add(){
  myModal.toggle();
  $('#modalLabel').html('เพิ่ม<?php echo $title;?>');
  $('#action').val('add');
}

function edit(id){
  myModal.toggle();
  
  $("#form").hide();
  $("#modalLoading").show();
  $('#modalLabel').html('แก้ไข<?php echo $title;?>');
  $('#action').val('edit');
  $('#F_ID').val(id);

function del(id){
  swal({
    title: "ยืนยันการลบ",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })

}

function checkSize(file){
  if((file.files[0].size / 1024 / 1024) > <?php echo $maxSize; ?>){
    $(file).addClass('is-invalid');
    $("#F_ImageFeedback").html('รองรับขนาดไฟล์ไม่เกิน <?php echo $maxSize; ?>MB');
    $(file).val('');
  }
  else{
    $(file).removeClass('is-invalid');
    $("#F_ImageFeedback").html('');
    $('#F_ImageShow').show().attr("src", window.URL.createObjectURL(file.files[0]));
  }
}
</script>