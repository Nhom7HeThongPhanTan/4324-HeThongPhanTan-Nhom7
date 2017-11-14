<?php
$sql = "SELECT * FROM (_account ac inner join _users us on ac._id= us._id) inner join _groups gr on us._manhom=gr._manhom";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Họ</th>
                  <th>Tên</th>
                  <th>Giới Tính</th>
                  <th>Ngày Sinh</th>
                  <th>Email</th>
                  <th>User</th>
                  <th>Nhóm</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['_HO']?></td>
                  <td><?php echo $row['_TEN']?></td>
                  <td><?php echo $row['_GIOITINH']?></td>
                  <td><?php echo $row['_NGAYSINH']?></td>
                  <td><?php echo $row['_EMAIL']?></td>
                  <td><?php echo $row['_USERNAME']?></td>
                  <td><?php echo $row['_TENNHOM']?></td>
                </tr>
                <?php
                  }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
                </tbody>
              </table>
</div>