<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">DANH SÁCH NHÓM</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tabledanhsachnhom" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>MÃ NHÓM</th>
          <th>TÊN NHÓM</th>
          <th>SỐ LƯỢNG</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $result = new SendGetToService(URL_DANHSACHNHOM);
            $data = $result->getResult();
            if(!empty($data)){
              foreach ($data as $key) {
                echo "<tr>";
                echo "<td>";
                // mã nhóm
                echo $key['_MANHOM'];
                echo "</td>";
                echo "<td>";
                // tên nhóm
                echo $key['_TENNHOM'];
                echo "</td>";
                echo "<td>";
                // số lượng
                echo $key['_SOLUONG'];
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