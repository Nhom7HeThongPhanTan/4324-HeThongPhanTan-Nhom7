<?php
    if(isset($_POST['them']))
    { 
       if(!empty($_POST['username']))
       {
         $tennhom = $_POST['username'];
       }
       else
       {
         $errors[]='username';
       }
       if(!empty($_POST['password']))
       {
         $soluong = $_POST['password'];
       }
       else
       {
         $errors[]='password';
       }
       if(!empty($_POST['cpassword']))
       {
         $tennhom = $_POST['cpassword'];
       }
       else
       {
         $errors[]='cpassword';
       }
       if(!empty($_POST['ho']))
       {
         $tennhom = $_POST['ho'];
       }
       else
       {
         $errors[]='ho';
       }
       if(!empty($_POST['ten']))
       {
         $tennhom = $_POST['ten'];
       }
       else
       {
         $errors[]='ten';
       }
       if(!empty($_POST['email']))
       {
         $tennhom = $_POST['email'];
       }
       else
       {
         $errors[]='email';
       }
       if(!empty($_POST['ngaysinh']))
       {
         $tennhom = $_POST['ngaysinh'];
       }
       else
       {
         $errors[]='ngaysinh';
       }
       if(empty($errors))
       {
         $result = new SendPostToService(URL_THEMNGUOIDUNG);
         $data = $result->getResult();
         
         if(!empty($data)){
           echo "<script> alert(\"Thêm thành công!\");</script>";
           header('Location:index.php');
         }
         else
         {
           echo "<script> alert(\"Không thể thêm !\");</script>";
         }
         
       }
    }

  if(isset($errors) && in_array('username',$errors))
  {
    echo("<script> alert(\"Username không được để trống\");</script>");
  }
  if(isset($errors) && in_array('password',$errors))
  {
    echo("<script> alert(\"password không được để trống\");</script>");
      }
      if(isset($errors) && in_array('cpassword',$errors))
  {
    echo("<script> alert(\"Nhập sai password\");</script>");
  }if(isset($errors) && in_array('ho',$errors))
  {
    echo("<script> alert(\"Họ không được để trống\");</script>");
  }if(isset($errors) && in_array('ten',$errors))
  {
    echo("<script> alert(\"Tên không được để trống\");</script>");
  }if(isset($errors) && in_array('email',$errors))
  {
    echo("<script> alert(\"Email không được để trống\");</script>");
  }if(isset($errors) && in_array('ngaysinh',$errors))
  {
    echo("<script> alert(\"Ngày sinh không được để trống\");</script>");
  }
?>

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">THÊM NGƯỜI DÙNG</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form method="post">
      <div class="form-group has-feedback">
        <input name ="username" type="text" class="form-control" placeholder="Tài khoản">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name ="password" type="password" class="form-control" placeholder="Mật khẩu">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name ="cpassword" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="ho" type="text" class="form-control" placeholder="Họ">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="ten" type="text" class="form-control" placeholder="Tên">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name ="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name ="ngaysinh" type="date" class="form-control" placeholder="dd/mm/yyyy">
        <span class="glyphicon  glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="radio">
        <label>Giới tính:</label>
        <label><input type="radio"  name="gioitinh" value = "1">Nam</label>
        <label><input type="radio"  name="gioitinh" value = "0">Nữ</label>
      </div>
      <div class="form-group has-feedback">
        <label>Nhóm đăng ký:</label>
        <select class="form-control" name ="manhom">
          <?php
            $result = new SendGetToService(URL_DANHSACHNHOM);
            $data = $result->getResult();
            if(!empty($data)){
              foreach ($data as $value) {
                $soluong = $value['_SOLUONG'];
                $result = new SendGetToService(URL_SOLUONGTHANHVIENTHUOCNHOM.$value['_MANHOM']);
                $tempp = $result->getResult();
                if($tempp[0]['_SOLUONG']< $soluong){
                  echo "<option value=\"".$value['_MANHOM']."\">";
                  echo $value['_TENNHOM'];
                  echo "</option>";
                }
              }
            }
          ?>
        </select>
      </div>
      <div class="form-group has-feedback">
        <label>Quyền</label>
        <select class="form-control" name ="quyenhan">
          <option value="1">ADMIN</option>
          <option value="0">USER</option>
        </select>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name ="them" class="btn btn-primary btn-block btn-flat">Thêm</button>
        </div>
        <!-- /.col -->
      </div>
    </form>      
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
</div>