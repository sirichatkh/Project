<?php
require_once("../_config.php");
/*checkLogin();*/
$title = "ข้อมูลกิจกรรม";
require_once("_header.php");
?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-outline-primary float-end" onclick="add()">
            เพิ่ม<?php echo $title; ?>
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
                  <th scope="col" width="10%" data-orderable="false"></th>
                  <th scope="col" width="10%" data-orderable="false">รูปภาพกิจกรรม</th>
                  <th scope="col" width="15%">วันที่</th>
                  <th scope="col" width="10%">เวลา</th>
                  <th scope="col" width="20%">ชื่อกิจกรรม</th>
                  <th scope="col" width="20%">รายละเอียดกิจกรรม</th>
                  <th scope="col" width="10%" data-orderable="false"></th>
                  <th scope="col" width="10%" data-orderable="false"></th>
                </tr>
                <tr>
                <?php
                  $sql = "SELECT * FROM event";
                  $result = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_array($result)){
                ?>
                  <td scope="col" width="10%" data-orderable="false"><?php echo $row['E_ID']; ?></td>
                  <td scope="col" width="10%" data-orderable="false"><img src="../<?php echo $row['E_Image']; ?>" style="max-width:150px;max-height: 120px;"></td>
                  <td scope="col" width="15%"><?php echo $row['E_Date']; ?></td> 
                  <td scope="col" width="10%"><?php echo $row['E_Time']; ?></td> 
                  <td scope="col" width="20%"><?php echo $row['E_Name']; ?></td>
                  <td scope="col" width="20%"><?php echo $row['E_Description']; ?></td>   
                  <td scope="col" width="10%"><a href='Event_Func/Edit_E_Ad.php?edit=<?php echo $row['E_ID']; ?>'><button type='button' class='btn btn-outline-warning'>เเก้ไข</button></a></td>
                  <td scope="col" width="10%"><a href='Event_Func/Del_E_Ad.php?del=<?php echo $row['E_ID']; ?>'><button type='button' class='btn btn-outline-danger'>ลบ</button></a></td>
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
<div class="modal fade" id="modal">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
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
        <div class="modal-body">
          <form id="form">
          <div id="message"></div>
          <input type="hidden" name="action" id="action">
          <input type="hidden" name="E_ID" id="E_ID">
            <div class="mb-3">
              <label for="E_Image" class="form-label">รูปภาพหลัก <small class="text-muted">รองรับเฉพาะไฟล์รูปภาพนามสกุล .jpg .png</small></label> 
              <input class="form-control" type="file" id="E_Image" name="E_Image" accept="image/*" onchange="checkSize(this)">
              <div id="E_ImageFeedback" class="invalid-feedback"></div>
              <img class="mt-2" id="E_Imageshow" style="max-width:450px;max-height: 220px;">
            </div>
            <div class="mb-3">
              <label for="E_Images" class="form-label">รูปภาพอื่น ๆ <small class="text-muted">รองรับเฉพาะไฟล์รูปภาพนามสกุล .jpg .png</small></label> 
              <input class="form-control" type="file" id="E_Images" name="E_Images[]" accept="image/*" onchange="checkSizes(this)" multiple>
              <div id="E_ImagesFeedback" class="invalid-feedback"></div>
              <label class="form-label mb-0" id="LabelE_ImagesNew" style="display:none">ภาพอัพโหลดใหม่</label>
              <div class="row" id="E_ImagesNew"></div>
              <label class="form-label mb-0" id="LabelE_ImagesOld" style="display:none">ภาพเดิม</label>
              <div class="row" id="E_ImagesOld"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

<?php require_once("_footer.php");?>