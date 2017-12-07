<?php
if(isset($_POST['them']))
 {  
    if(!empty($_POST['manhom']))
    {
      $manhom = $_POST['manhom'];
    }
    else
    {
      $errors[]='manhom';
    }
    if(!empty($_POST['tennhom']))
    {
      $tennhom = $_POST['tennhom'];
    }
    else
    {
      $errors[]='tennhom';
    }
    if(!empty($_POST['soluong']))
    {
      $soluong = $_POST['soluong'];
    }
    else
    {
      $errors[]='soluong';
    }
    if(empty($errors))
    {
      $result = new SendPostToService(URL_THEMNHOM);
      $data = $result->getResult();
      echo var_dump($data);
      if(!empty($data)){
        echo "<script> alert(\"Thêm thành công!\");</script>";
      }
      else
      {
        echo "<script> alert(\"Không thể thêm !\");</script>";
      }
      
    }
 }

?>
<div class="box box-info">
<?php 
		      if(isset($errors) && in_array('manhom',$errors))
		      {
		        echo"<script> alert(\"Mã nhóm không được để trống\");</script>";
          }
          if(isset($errors) && in_array('tennhom',$errors))
		      {
		        echo("<script> alert(\"Tên nhóm không được để trống\");</script>");
          }
          if(isset($errors) && in_array('soluong',$errors))
		      {
		        echo("<script> alert(\"Số lượng không được để trống\");</script>");
		      }
		      ?>
            <div class="box-header with-border">
              <h3 class="box-title"> THÊM NHÓM</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Mã nhóm</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="manhom" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tên nhóm</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tennhom">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="soluong">
                  </div>
                </div>
                
  
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="them" class="btn btn-info pull-right">THÊM</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>