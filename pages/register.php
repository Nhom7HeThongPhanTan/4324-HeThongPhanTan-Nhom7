<?php 
  include_once('../include/SendGetToService.php');
  include_once('../include/SendPostToService.php');
  include_once('../config.php');
  if(isset($_POST['register'])){
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['cpassword'])&& isset($_POST['ho']) && isset($_POST['ten']) && isset($_POST['email']) && isset($_POST['ngaysinh']) && isset($_POST['gioitinh']) && isset($_POST['manhom'])){
      // kiểm tra nếu tồn tại thì gán vào các giá trị
      $username = $_POST['username'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      $ho = $_POST['ho'];
      $ten = $_POST['ten'];
      $email = $_POST['email'];
      $ngaysinh = $_POST['ngaysinh'];
      $gioitinh = $_POST['gioitinh'];
      $manhom = $_POST['manhom'];
      if($username=="" && $password =="" && $cpassword =="" && $ho ==""&& $ten ==""&& $email =="" &&$ngaysinh ==""&& $manhom =="" && $gioitinh ==""){
        echo "<script> alert(\"Vui lòng nhập đầy đủ thông tin !\");</script>";
      }
      else
      {
        if($password != $cpassword){
          echo "<script> alert(\"Mật khẩu nhập lại không chính xác !\");</script>";
        }
        else
        {
          $result = new SendGetToService(URL_CHECKUSERNAME.$username);
          $result = $result->getResult();
          if(empty($result)){
            $result = new SendGetToService(URL_CHECKEMAIL.$email);
            $result = $result->getResult();
            if(empty($result)){
              // todo
              $result = new SendPostToService(URL_DANGKYTAIKHOAN);
              echo "<script> alert(\"Đăng kí thành công !\");</script>";
              header('Location:../index.php');
            }
            else
            {
              echo "<script> alert(\"Email ".$email." đã tồn tại !\");</script>";
            }
          }
          else
          {
            echo "<script> alert(\"Tài khoản ".$username." đã tồn tại !\");</script>";
          }
        }
      }
    }
    else
    {
      echo "<script> alert(\"Vui lòng nhập đầy đủ thông tin!\");</script>";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản lý nhóm| Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../index.php"><b>QUẢN LÝ NHÓM</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">ĐĂNG KÝ TÀI KHOẢN</p>

    <form action="register.php" method="post">
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
        <label><input type="radio" class="form-control" name="gioitinh" value = "1">Nam</label>
        <label><input type="radio" class="form-control" name="gioitinh" value = "0">Nữ</label>
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
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name ="register" class="btn btn-primary btn-block btn-flat">Đăng kí</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="./login.php" class="text-center">Tôi đã là thành viên</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
  //document.getElementById('btn_register').disabled = true;
  // function check(){
  //   var data = new Array();
  //   data[0] = document.getElementById('username').value;
  //   data[1] = document.getElementById('password').value;
  //   data[2] = document.getElementById('cpassword').value;
  //   data[3] = document.getElementById('hovaten').value;
  //   data[4] = document.getElementById('email').value;
  //   data[5] = document.getElementById('ngaysinh').value;
  //   var nearby = new Array("taikhoan","matkhau","cmatkhau","ho","ten","email","ngaysinh");
  //   for (i in data)
  //   {
  //     var div = nearby[i];
  //     if(data[i]==""){
  //       document.getElementById(div).style.borderColor = 'red';
  //     }
  //   }
  // }
</script>
</body>
</html>