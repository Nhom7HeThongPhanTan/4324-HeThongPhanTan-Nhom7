<?php 
	include_once('include/function.php');
	// create object DB_Function
	$db = new DB_Function();
	$result = '';
	//=============================
	if(isset($_GET['tag'])){
		switch($_GET['tag']){
			case 'danhsachthanhvien': 
				$result = $db->GetDanhSachThanhVien();
				break;
			case 'danhsachnhom' : 
				$result = $db->GetDanhSachNhom();
				break;
			case 'thongtincanhan': 
				if(isset($_GET['username']))
				{
					$result = $db->GetThongTinByUsername($_GET['username']);
				}
				break;
			case 'danhsachcungnhom': 
				if(isset($_GET['username']))
				{
					$result = $db->GetDanhSachThanhVienCungNhomByUsername($_GET['username']);
				}
				break;
			case 'login':
				if(isset($_POST['login'])){
				  	if(isset($_POST['username']) && isset($_POST['password'])){
					    $username = $_POST['username'];
					    $password = $_POST['password'];
					    $username = strip_tags($username);
				     	$username = addslashes($username);
				     	$password = strip_tags($password);
				  	  	$password = addslashes($password);
						$result = $db->login($username,$password);
					}	
				}
				break;
			case 'themnhom':
				if(isset($_POST['manhom']) && isset($_POST['tennhom']) && isset($_POST['soluong'])){
					// gọi tới function thêm nhóm
					$result = $db->PosThemNhom($_POST['manhom'],$_POST['tennhom'],$_POST['soluong']);
				}
				break;
			case 'dangkytaikhoan':
				if(isset($_POST['username']) && isset($_POST['password']) && $_POST['manhom'] && isset($_POST['ho']) &&isset($_POST['ten']) &&isset($_POST['gioitinh'])&& isset($_POST['ngaysinh']) && isset($_POST['email'])){
					// gọi tới function đăng kí thành viên
					$result = $db->PosDangKyThanhVien($_POST['username'],$_POST['password'],'0',$_POST['manhom'],$_POST['ho'],$_POST['ten'],$_POST['gioitinh'],$_POST['ngaysinh'],$_POST['email']);
				}
				break;
			case 'themnguoidung':
				if(isset($_POST['quyenhan'])&&isset($_POST['username']) && isset($_POST['password']) && $_POST['manhom'] && isset($_POST['ho']) &&isset($_POST['ten']) &&isset($_POST['gioitinh'])&& isset($_POST['ngaysinh']) && isset($_POST['email'])){
					// gọi tới function đăng kí thành viên
					$result = $db->PosDangKyThanhVien($_POST['username'],$_POST['password'],$_POST['quyenhan'],$_POST['manhom'],$_POST['ho'],$_POST['ten'],$_POST['gioitinh'],$_POST['ngaysinh'],$_POST['email']);
				}
				break;
			case 'soluongthanhvienthuocnhom':
				if(isset($_GET['manhom'])){
					$result = $db->GetSoLuongThanhVienThuocNhom($_GET['manhom']);
				}
				break;
			case 'checkusername':
				if(isset($_GET['username'])){
					$result = $db->checkUsername($_GET['username']);
				}
				break;
			case 'checkemail':
				if(isset($_GET['email'])){
					$result = $db->checkEmail($_GET['email']);
				}
				break;
			default : echo "HELLO !!!"; break;
		}
	}
	$db->CloseDB();
	$json = json_encode($result);
	echo $json;
?>