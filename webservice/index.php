<?php 
	include_once('/include/function.php');
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
					$result = $db->PosThemNhom($_POST['manhom'],$_POST['tennhom'],$_POST['soluong']);
					$db->CloseDB();
				}
				break;
			case 'dangkytaikhoan':
				if(isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']) && $_POST['manhom'] && isset($_POST['ho']) &&isset($_POST['ten']) &&isset($_POST['gioitinh'])&& isset($_POST['ngaysinh']) && isset($_POST['email'])){

					$db->PosThemTaiKhoan($_POST['id'],$_POST['username'],$_POST['password'],0);
					$result = $db->PosThemNguoiDung($_POST['id'],$_POST['ho'],$_POST['ten'],$_POST['gioitinh'],$_POST['ngaysinh'],$_POST['email']);
					$db->CloseDB();
				}
				break;
			case 'themnguoidung':
				if(isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['quyenhan']) && $_POST['manhom'] && isset($_POST['ho']) &&isset($_POST['ten']) &&isset($_POST['gioitinh'])&& isset($_POST['ngaysinh']) && isset($_POST['email'])){

					$db->PosThemTaiKhoan($_POST['id'],$_POST['username'],$_POST['password'],$_POST['quyenhan']);
					$result = $db->PosThemNguoiDung($_POST['id'],$_POST['ho'],$_POST['ten'],$_POST['gioitinh'],$_POST['ngaysinh'],$_POST['email']);
					$db->CloseDB();
				}
				break;
			default : echo "HELLO !!!"; break;
		}
	}
	$json = json_encode($result);
	echo $json;
?>