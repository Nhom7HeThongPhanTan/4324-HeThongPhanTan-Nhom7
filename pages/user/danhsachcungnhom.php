<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">DANH SÁCH THÀNH VIÊN TRONG NHÓM</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="tabledanhsachthanhvien" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>HỌ</th>
            <th>TÊN</th>
            <th>GIỚI TÍNH</th>
            <th>NGÀY SINH</th>
            <th>EMAIL</th>
            <th>TÊN NHÓM</th>
          </tr>
          </thead>
          <tbody>

            <?php
            if(isset($_SESSION['username']))
            {
              $result = new SendGetToService(URL_DANHSACHCUNGNHOM.$_SESSION['username']);
              $result = $result->getResult();
              if(!empty($result)){
                foreach ($result as $value) {
                  echo "<tr>";
                  echo "<td>";
                  // họ
                  echo $value['_HO'];
                  echo "</td>";
                  echo "<td>";
                  // tên
                  echo $value['_TEN'];
                  echo "</td>";
                  echo "<td>";
                  // giới tính
                  echo $value['_GIOITINH'];
                  echo "</td>";
                  echo "<td>";
                  // ngày sinh
                  echo $value['_NGAYSINH'];
                  echo "</td>";
                  echo "<td>";
                  // email
                  echo $value['_EMAIL'];
                  echo "</td>";
                  echo "<td>";
                  // groups
                  echo $value['_TENNHOM'];
                  echo "</td>";
                  echo "</tr>";
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
