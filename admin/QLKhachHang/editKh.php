<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>
<script>	
	function editKhVal()
	{
		var dem=0;
		
		//pass
		var pass=document.getElementById("txtPass").value;
		var errPass=document.getElementById("errPass");
		var regPass=/^[a-z0-9]+$/;
		var kqPass=regPass.test(pass);
		if(pass.length==0)
		{
			errPass.innerHTML="Không được để trống!";	
		}else if(pass.length<6)
		{
			errPass.innerHTML="Mật khẩu phải lớn hơn 6 kí tự!";	
		}else if(kqPass==false)
		{
			errPass.innerHTML="Mật khẩu không đúng định dạng! Mật khẩu chỉ chứa kí tự thường và kí tự số.";	
		}else 
		{
			errPass.innerHTML="";	
			dem++;
		}
		
		//name
		var name=document.getElementById("txtName").value;
		var errName=document.getElementById("errName");
		var regName=/^[a-zA-Z]+\s?[a-zA-Z]+\s?[a-zA-Z]+\s?[a-zA-Z]+\s?[a-zA-Z]+$/;
		var kqName=regName.test(name);
		if(name.length==0)
		{
			errName.innerHTML="Không được để trống!";
		}else if(name.length<10)
		{
			errName.innerHTML="Họ và tên phải lớn hơn 10 kí tự!";	
		}else if(kqName==false)
		{
			errName.innerHTML="Họ và tên không đúng định dạng! Họ và tên chỉ chứa kí tự thường, kí tự in hoa.";;
		}else
		{
			errName.innerHTML="";	
			dem++;
		}
		
		//so dien thoai
		var num=document.getElementById("txtNum").value;
		var errNum=document.getElementById("errNum");
		var regNum=/^[0-9]+$/;
		var kqNum=regNum.test(num);
		if(num.length==0)
		{
			errNum.innerHTML="Không được để trống!";		
		}else if(kqNum==false)
		{
			errNum.innerHTML="Số điện thoại nhập không đúng định dạng!";	
		}else 
		{
			errNum.innerHTML="";	
			dem++;
		}
		
		//dia chi
		var address=document.getElementById("txtAdd").value;
		var errAdd=document.getElementById("errAdd");
		if(address.length==0)
		{
			errAdd.innerHTML="Không được để trống!";	
		}else
		{
			errAdd.innerHTML="";	
			dem++;
		}
		
		if(dem==4)
		{
			return true;	
		}else
		{
			return false;	
		}
	}
	
</script>

<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="../admin.php?dog=9"><span class="glyphicon glyphicon-arrow-left"></span></a></li> 
            </ul>
        </div><!--collapse-->
    </div><!--container-fluid-->
</nav><!--navbar-->

<div class="container">
    	<?php
        	include("../../modules/open.php");
			$maKh=$_GET["maKh"];
		
			$sql="select * from tblkh where maKh=$maKh";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($result);
		?>
        <h1>Sửa thông tin</h1>
    	<form action="editKhXuLy.php" class="form-horizontal" method="post" >
        	<div class="form-group">
            	<label class="control-label col-sm-4">Mã tài khoản:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtMa" name="txtMa" readonly="readonly" value="<?php echo $row["maKh"]?>">
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Tài khoản:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtUser" name="txtUser" readonly="readonly" value="<?php echo $row["user"]?>"> <span id="errUser"></span>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Mật khẩu:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtPass" name="txtPass" value="<?php echo $row["pass"]?>"> <span id="errPass"></span>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Họ và tên:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtName" name="txtName" value="<?php echo $row["ten"]?>"> <span id="errName"></span>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Số điện thoại:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtNum" name="txtNum" value="<?php echo $row["sdt"]?>"> <span id="errNum"></span>
                </div>
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Địa chỉ:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtAdd" name="txtAdd" value="<?php echo $row["diaChi"]?>"> <span id="errAdd"></span>
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-4"></div>
                <div class="col-sm-4">
                	<input type="submit" class="btn btn-success" value="Sửa thông tin" onclick="return editKhVal()">
                    <input type="reset" class="btn btn-default" value="Nhập lại" onclick="return confirm('Chắc chắn muốn nhập lại?')">
                </div>
            </div>          
        </form>
</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>