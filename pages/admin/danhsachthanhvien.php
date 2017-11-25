<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">DANH SÁCH THÀNH VIÊN</h3>
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
          <th>TÀI KHOẢN</th>
          <th>NHÓM</th>
        </tr>
        </thead>
        <tbody>
          <?php 
            $result = new SendGetToService(URL_DANHSACHTHANHVIEN);
            $data = $result->getResult();
            if(!empty($data)){
              foreach ($data as $key) {
                echo "<tr>";
                echo "<td>";
                // họ
                echo $key['_HO'];
                echo "</td>";
                echo "<td>";
                // tên
                echo $key['_TEN'];
                echo "</td>";
                echo "<td>";
                // giới tính
                echo $key['GIOITINH'];
                echo "</td>";
                echo "<td>";
                // ngày sinh
                echo $key['_NGAYSINH'];
                echo "</td>";
                echo "<td>";
                // email
                echo $key['_EMAIL'];
                echo "</td>";
                echo "<td>";
                // tài khoản
                echo $key['_USERNAME'];
                echo "</td>";
                echo "<td>";
                // nhóm
                echo $key['_TENNHOM'];
                echo "</td>";
                echo "</tr>";
              }
            }
            else
            {
              echo "error , don't connect to web service";
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
