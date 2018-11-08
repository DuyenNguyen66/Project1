<?php
$path = "images/"; 
$valid_formats = array("jpg", "png", "gif", "bmp","PNG",'JPG','GIF','jpeg');
$valid_type = array('image/gif','image/jpeg','image/png','image/bmp'); 
if (isset($_POST)) {
    $name = $_FILES['image']['name']; 
    $size = $_FILES['image']['size']; 
    $type = $_FILES['image']['type'];
    if (strlen($name)) { // Kiểm tra xem đã có file nào được chọn
        list($txt, $ext) = explode(".", $name); // Lấy đuôi file sau dấu . vào biến $ext
        if (in_array($ext, $valid_formats)) { // Kiểm tra đúng với các đuôi file cho phép
            if(in_array($type, $valid_type)){ // Kiển tra định dạng (Content-Type) của file cho phép
                if ($size < (1024 * 1024)) { // Kiểm tra dung lượng file. Nếu nhỏ hơn 1 Mb = 1024 * 1024 thì tiếp tục
					$tmp = $_FILES['image']['tmp_name']; // Lấy thư mục lưu tạm upload file 
                    if (move_uploaded_file($tmp, $path )) { // Di chuyển vào thư mục $path
					//lay ten san pham ve
						if(isset($_POST["txtTen"]) && isset($_POST["txtMoTa"]) && isset($_POST["txtTacGia"]) && isset($_POST["btntheLoai"]) && isset($_POST["txtGia"]) && isset($_POST["txtNgay"]))
						{
							$anh="images/".$name;
							$ten=$_POST["txtTen"];
							$moTa=$_POST["txtMoTa"];
							$tacGia=$_POST["txtTacGia"];
							$theLoai=$_POST["btntheLoai"];
							$gia=$_POST["txtGia"];
							$ngayNhap=$_POST["txtNgay"];
							
							include("../../modules/open.php");
							
							$sql="insert into tblsach(maTl,tenTg,tenSach,moTa,anh,gia,ngayNhap) values ('$theLoai','$tacGia','$ten','$moTa','$anh','$gia','$ngayNhap')";
							mysqli_query($conn,$sql);
									
							include("../../modules/close.php");
							header("Location:../admin.php?dog=2");
						}else
						{
							header("Location:addSach.php");	
						}
					}else
                        echo "Lỗi không xác đinh"; // Nếu di chuyển không thành công//quay ve trang chu va bao loi
                } else
                    echo "Tối đa upload 1 MB"; // Nếu file upload lớn hơn 1 MB
            } else
            echo "Không đúng định dạng"; // Nếu Content-Type không nằm trong danh sách cho phép
        } else
            echo "Không đúng định dạng"; // Nếu đuôi file không nằm trong danh sách cho phép
    } else
        echo "Hãy chọn một hình ảnh !"; // Nếu chưa có file gì được gửi đên
}
?>
