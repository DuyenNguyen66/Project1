<script>	
	function addSachVal()
	{
		var dem=0;
		
		//ten
		var ten=document.getElementById("txtTen").value;
		var errTen=document.getElementById("errTen");
		if(ten.length==0)
		{
			errTen.innerHTML="Không được để trống!";
		}else
		{
			errTen.innerHTML="";	
			dem++;
		}
		
		//mota
		var moTa=document.getElementById("txtMoTa").value;
		var errMoTa=document.getElementById("errMoTa");
		if(moTa.length==0)
		{
			errMoTa.innerHTML="Không được để trống!";	
		}else
		{
			errMoTa.innerHTML="";
			dem++;	
		}
		
		//tacgia
		var tacgia=document.getElementById("txtTacGia").value;
		var errTacGia=document.getElementById("errTacGia");
		if(tacgia.length==0)
		{
			errTacGia.innerHTML="Không được để trống!";
		}else
		{
			errTacGia.innerHTML="";	
			dem++;
		}
		
		//theloai
		var theloai=document.getElementById("btntheLoai").value;
		var errTheLoai=document.getElementById("errTheLoai");
		if(theloai==0)
		{
			errTheLoai.innerHTML="Hãy chọn thể loại!";
		}else
		{
			errTheLoai.innerHTML="";	
			dem++;
		}
		
		//gia
		var gia=document.getElementById("txtGia").value;
		var errGia=document.getElementById("errGia");
		if(gia==0)
		{
			errGia.innerHTML="Không được để trống!";
		}else
		{
			errGia.innerHTML="";	
			dem++;
		}
				
		if(dem==5)
		{
			return true;	
		}else
		{
			return false;	
		}
	}
	
</script>

<body>
<?php 
	include("../modules/open.php");
	$sql="select * from tbltheloai";
	$result=mysqli_query($conn,$sql);

?>
<h1>Thêm truyện</h1>
<form action="QLSach_Nv/addSachXuLy.php" class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-group">
    	<label class="control-label col-sm-4">Ảnh: </label>
        <div class="col-sm-4">
        	<input type="file" name="image">
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Tên sách: </label>
        <div class="col-sm-4">
        	<input type="text" id="txtTen" name="txtTen" class="form-control"> <span id="errTen"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Mô tả: </label>
        <div class="col-sm-4">
        	<input type="text" id="txtMoTa" name="txtMoTa" class="form-control"> <span id="errMoTa"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Tác giả: </label>
        <div class="col-sm-4">
        	<input type="text" id="txtTacGia" name="txtTacGia" class="form-control"> <span id="errTacGia"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Thể loại: </label>
        <div class="col-sm-4">
        	<select id="btntheLoai" name="btntheLoai" class="form-control">
            	<option value="0">--Chọn thể loại--</option>
                <?php
                    while($row=mysqli_fetch_array($result))
					{
				?>
                <option value="<?php echo $row["maTl"]?>"> 
				<?php 
					echo $row["tenTl"];	
				?>
                </option>
                <?php
				}
				?>             
            </select> <span id="errTheLoai"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Giá bìa: </label>
        <div class="col-sm-4">
        	<input type="number" id="txtGia" name="txtGia" class="form-control"> <span id="errGia"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Ngày nhập: </label>
        <div class="col-sm-4">
        	<input type="date" name="txtNgay" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <input type="submit" class="btn btn-success" value="Thêm sách" onClick="return addSachVal()">
            <input type="reset" class="btn btn-default" value="Nhập lại" onClick="return confirm('Chắc chắn muốn nhập lại?')">
        </div>
    </div>

</form>
<?php
	include("../modules/close.php")
?>