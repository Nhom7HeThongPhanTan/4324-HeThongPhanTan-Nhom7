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
              $sql = "SELECT * FROM _groups";
              $result = mysqli_query($conn,$sql);
              if(mysqli_num_rows($result) == FALSE)
              {}
              else
              {
                while($row = mysqli_fetch_row($result))
                {
                  echo "<tr>";
                  echo "<td>";
                  // mã nhóm
                  echo "$row[0]";
                  echo "</td>";
                  echo "<td>";
                  // tên nhóm
                  echo "$row[1]";
                  echo "</td>";
                  echo "<td>";
                  // số lượng
                  echo "$row[2]";
                  echo "</td>";
                  echo "</tr>";
                } 
              }
              mysqli_free_result($result);
              mysqli_close($conn);
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
