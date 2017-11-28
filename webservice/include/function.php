<?php
	class DB_Function{
		private $db;
		// constructor
		function __construct(){
			require_once('db_connect.php');
			$this->db = new DB_Connect();
		}
		// destructor
		function __destruct(){
			// to do
		}
		// close connect database
		public function CloseDB(){
			$this->db->CloseDB();
		}
		// Hàm kiểm tra login
		public function login($username,$password){
			$password = md5($password);
			$sql = "SELECT _account._USERNAME,_account._QUYEN FROM _account WHERE _account._USERNAME = '$username' AND _account._PASSWORD = '$password'";
			$result = $this->db->SqlExecuteQuery($sql);
			return $result;
		}
		// Hàm kiểm tra tài khoản đã tồn tại
		public function checkUsername($username){
			$sql = "SELECT _account._USERNAME FROM _account WHERE _account._USERNAME = '$username'";
			$result = $this->db->SqlExecuteQuery($sql);
			return $result;
		}
		// Hàm kiểm tra email đã tồn tại
		public function checkEmail($email){
			$sql = "SELECT _users._EMAIL FROM _users WHERE _users._EMAIL = '$email'";
			$result = $this->db->SqlExecuteQuery($sql);
			return $result;
		}
		// hàm lấy danh sách thành viên
		public function GetDanhSachThanhVien(){
			$sql = "SELECT _users._HO,_users._TEN,(CASE WHEN _users._GIOITINH = 1 THEN 'Nam' WHEN _users._GIOITINH = 0 THEN N'Nữ' END) AS _GIOITINH,_users._NGAYSINH,_users._EMAIL,_account._USERNAME,_groups._TENNHOM FROM _users,_account,_groups WHERE _groups._MANHOM = _users._MANHOM AND _users._ID = _account._ID";
			$result = $this->db->SqlExecuteQuery($sql);
			return $result;
		}
		// Hàm lấy danh sách nhóm
		public function GetDanhSachNhom(){
			$sql = "SELECT * FROM _groups";
			$result = $this->db->SqlExecuteQuery($sql);
			return $result;
		}
		// Hàm lấy số lượng thành viên đã trong nhóm
		public function GetSoLuongThanhVienThuocNhom($manhom){
			$sql = "SELECT COUNT(_users._ID) AS _SOLUONG FROM _users WHERE _users._MANHOM = '$manhom'";
			$result = $this->db->SqlExecuteQuery($sql);
			return $result;
		}
		// Hàm lấy thông tin thành viên
		public function GetThongTinByUsername($username){
			$sql = "SELECT _users._HO,_users._TEN,(CASE WHEN _users._GIOITINH = 1 THEN 'Nam' WHEN _users._GIOITINH = 0 THEN N'Nữ' END) AS _GIOITINH,_users._NGAYSINH,_users._EMAIL,_account._USERNAME,_groups._TENNHOM FROM _users,_account,_groups WHERE _groups._MANHOM = _users._MANHOM AND _users._ID = _account._ID AND _account._USERNAME = '$username'";
			$result = $this->db->SqlExecuteQuery($sql);
			return $result;
		}
		// Hàm lấy thông tin danh sách thành viên cùng nhóm
		public function GetDanhSachThanhVienCungNhomByUsername($username){
			$sql ="SELECT _users._HO,_users._TEN,(CASE WHEN _users._GIOITINH = 1 THEN 'Nam' WHEN _users._GIOITINH = 0 THEN N'Nữ' END) AS _GIOITINH,_users._NGAYSINH,_users._EMAIL,_groups._TENNHOM FROM _users,_account,_groups WHERE  _groups._MANHOM = _users._MANHOM AND _users._ID = _account._ID AND _groups._MANHOM = (SELECT _users._MANHOM FROM _account,_users WHERE _account._USERNAME = '$username' AND _account._ID = _users._ID)";
			$result = $this->db->SqlExecuteQuery($sql);
			return $result;
		}
		// Hàm thêm nhóm
		public function PosThemNhom($manhom,$tennhom,$soluong){
			$sql = "INSERT INTO `_groups` (`_MANHOM`, `_TENNHOM`, `_SOLUONG`) VALUES ('$manhom', '$tennhom', '$soluong')";
			$result = $this->db->SqlExecuteNonQuery($sql);
			return $result;
		}
		// Hàm thêm người dùng
		public function PosThemNguoiDung($id,$manhom,$ho,$ten,$gioitinh,$ngaysinh,$email){
			$sql = "INSERT INTO `_users` (`_ID`, `_MANHOM`, `_HO`, `_TEN`, `_GIOITINH`, `_NGAYSINH`, `_EMAIL`) VALUES ('$id', '$manhom', '$ho', '$ten', b'$gioitinh', '$ngaysinh', '$email')";
			$result = $this->db->SqlExecuteNonQuery($sql);
			return $result;
		}
		// Hàm thêm tài khoản
		public function PosThemTaiKhoan($username,$password,$quyenhan){
			$password = md5($password);
			$sql = "INSERT INTO `_account` (`_ID`, `_USERNAME`, `_PASSWORD`, `_QUYEN`) VALUES (NULL, '$username', '$password', b'$quyenhan');";
			$result = $this->db->SqlExecuteNonQuery($sql);
			return $result;
		}
		// Hàm đăng ký thành viên
		public function PosDangKyThanhVien($username,$password,$quyenhan,$manhom,$ho,$ten,$gioitinh,$ngaysinh,$email){
			$sql = "SELECT * FROM `_users` WHERE _users._EMAIL = '$email'";
			$result = $this->db->SqlExecuteQuery($sql);
			if($result){
				$result = false;
			}
			else
			{
				$result = $this->PosThemTaiKhoan($username,$password,$quyenhan);
				if($result){
					$sql = "SELECT _ID FROM `_account` WHERE _account._USERNAME = '$username'";
					$data = $this->db->SqlExecuteQuery($sql);
					$result = $this->PosThemNguoiDung($data[0]['_ID'],$manhom,$ho,$ten,$gioitinh,$ngaysinh,$email);
					if(!$result){
						$result = false;
					}
				}
				else
				{
					$result = false;
				}
			}
			return $result;
		}
		// // Hàm xóa nhóm theo mã nhóm
		// public function DeleteNhom($manhom){
		// 	$sql = "DELETE FROM `_groups` WHERE `_groups`.`_MANHOM` = '$manhom'";
		// 	$result = $this->db->SqlExecuteNonQuery($sql);
		// 	return $result;
		// }
		// // Hàm xóa người dùng theo id
		// public function DeleteNguoiDung($id){
		// 	$sql = "DELETE FROM `_users` WHERE `_users`.`_ID` = '$id'";
		// 	$result = $this->db->SqlExecuteNonQuery($sql);
		// 	return $result;
		// }
		// // Hàm xóa tài khoản theo id
		// public function DeleteTaiKhoan($id){
		// 	$sql = "DELETE FROM `_account` WHERE `_account`.`_ID` = '$id'";
		// 	$result = $this->db->SqlExecuteNonQuery($sql);
		// 	return $result;
		// }
		// // Hàm xóa tài khoản theo tài khoản
		// public function DeleteTaiKhoanByUsername($username){
		// 	$sql = "DELETE FROM `_account` WHERE `_account`.`_USERNAME` = '$username'";
		// 	$result = $this->db->SqlExecuteNonQuery($sql);
		// 	return $result;
		// }
		// // Hàm xóa  tài khoản và người dùng theo tài khoản
		// public function DeleteTaiKhoanVaNguoiDung($username){
		// 	$sql = "DELETE `_account`,`_users` FROM `_account`,`_users` WHERE `_account`.`_USERNAME` = '$username' AND _users._ID = _account._ID";
		// 	$result = $this->db->SqlExecuteNonQuery($sql);
		// 	return $result;
		// }
		// // Hàm thay đỗi thông tin người sử dụng
		// public function PutThayDoiEmail($email){

		// }
		// public function PutThayDoiMatKhau($username,$password,$newpassword){

		// }
	}
?>