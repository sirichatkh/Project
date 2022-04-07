<?php
require_once("../_config.php");
checkLogin();
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
                  <th scope="col" width="10%" data-orderable="false">รูปภาพบุคลากร</th>
                  <th scope="col" width="15%">ชื่อบุคลากร</th>
                  <th scope="col" width="10%">ตำเเหน่ง</th>
                  <th scope="col" width="20%">ความเชี่ยวชาญ</th>
                  <th scope="col" width="20%">อีเมล</th>
                  <th scope="col" width="10%" data-orderable="false"></th>
                  <th scope="col" width="10%" data-orderable="false"></th>
                </tr>
                <tr>
                <?php
                  $sql = "SELECT * FROM staff";
                  $result = mysqli_query($conn,$sql);
                  while($row = mysqli_fetch_array($result)){
                ?>
                  <td scope="col" width="10%" data-orderable="false"><?php echo $row['S_ID']; ?></td>
                  <td scope="col" width="10%" data-orderable="false"><img src="../<?php echo $row['S_Image']; ?>" style="max-width:150px;max-height: 120px;"></td>
                  <td scope="col" width="15%"><?php echo $row['S_Name']; ?></td> 
                  <td scope="col" width="10%"><?php echo $row['S_Position']; ?></td> 
                  <td scope="col" width="20%"><?php echo $row['S_Skill']; ?></td> 
                  <td scope="col" width="20%"><?php echo $row['S_Email']; ?></td> 
                  <td scope="col" width="10%" data-orderable="false"><a href='Staff_Func/Edit_S_Ad.php?edit=<?php echo $row['S_ID']; ?>'><button type='button' class='btn btn-outline-warning'>เเก้ไข</button></a></td>
                  <td scope="col" width="10%" data-orderable="false"><a href='Staff_Func/Del_S_Ad.php?del=<?php echo $row['S_ID']; ?>'><button type='button' class='btn btn-outline-danger'>ลบ</button></a></td>
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

<?php require_once("_footer.php");?>