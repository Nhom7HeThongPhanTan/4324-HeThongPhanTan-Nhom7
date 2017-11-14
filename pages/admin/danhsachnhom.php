<?php
$sql = "SELECT * FROM _groups" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
?>
<div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Mã nhóm</th>
                  <th>Tên Nhóm</th>
                  <th>Số lượng</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $row['_MANHOM']?></td>
                  <td><?php echo $row['_TENNHOM']?></td>
                  <td><?php echo $row['_SOLUONG']?></td>
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