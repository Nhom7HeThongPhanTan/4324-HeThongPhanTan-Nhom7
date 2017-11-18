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
          </tr>
          </thead>
          <tbody>
            <?php
            if(isset($_SESSION['username']))
            {
            	$username = $_SESSION['username'];
        		$sql = "SELECT _users._HO,_users._TEN,CASE WHEN _users._GIOITINH = 1 THEN 'Nam' WHEN _users._GIOITINH = 0 THEN N'Nữ' END,_users._NGAYSINH,_users._EMAIL FROM _users,_account,_groups WHERE  _groups._MANHOM = _users._MANHOM AND _users._ID = _account._ID AND _groups._MANHOM = (SELECT _users._MANHOM FROM _account,_users WHERE _account._USERNAME = '$username' AND _account._ID = _users._ID)";
              	$result = mysqli_query($conn,$sql);
             	if(mysqli_num_rows($result) == FALSE)
             	{}
              	else
              	{
                	while($row = mysqli_fetch_row($result))
                	{
	                  echo "<tr>";
	                  echo "<td>";
	                  // họ
	                  echo "$row[0]";
	                  echo "</td>";
	                  echo "<td>";
	                  // tên
	                  echo "$row[1]";
	                  echo "</td>";
	                  echo "<td>";
	                  // giới tính
	                  echo "$row[2]";
	                  echo "</td>";
	                  echo "<td>";
	                  // ngày sinh
	                  echo "$row[3]";
	                  echo "</td>";
	                  echo "<td>";
	                  // email
	                  echo "$row[4]";
	                  echo "</td>";
	                  echo "</tr>";
                	} 
             	}
             	mysqli_free_result($result);
             	mysqli_close($conn);
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
