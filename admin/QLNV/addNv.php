<script>	
	function addNvVal()
	{
		var dem=0;
		//username
		var user=document.getElementById("txtUser").value;
		var errUser=document.getElementById("errUser");
		var regUser=/^[a-zA-Z0-9]+$/;
		var kqUser=regUser.test(user);
		if(user.length==0)
		{
			errUser.innerHTML="Không được để trống!";	
		}else if(user.length<6)
		{
			errUser.innerHTML="Tên tài khoản phải lớn hơn 6 kí tự!";		
		}else if(kqUser==false)
		{
			errUser.innerHTML="Tên tài khoản không đúng định dạng! Tên tài khoản chỉ chứa kí tự thường, kí tự in hoa và kí tự số.";	
		}else 
		{
			errUser.innerHTML="";	
			dem++;
		}
		
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
		
		//gioi tinh
		var demGt=0;
		var gt=Array();
		gt=document.getElementsByName("rdbGioiTinh");
		var errGioiTinh=document.getElementById("errGioiTinh");
		for(var i=0;i<gt.length;i++)
		{
			if(gt[i].checked)
			{
				demGt++;	
			}	
		}
		if(demGt==0)
		{
			errGioiTinh.innerHTML="Hãy chọn giới tính!";	
		}else 
		{
			errGioiTinh.innerHTML="";
			dem++;		
		}
		
		//ca lam viec
		var ca=document.getElementById("txtCa").value;
		var errCa=document.getElementById("errCa");
		if(ca.length==0)
		{
			errCa.innerHTML="Không được để trống!";		
		}else
		{
			errCa.innerHTML="";	
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
		
		//email
		var email=document.getElementById("txtEmail").value;
		var errEmail=document.getElementById("errEmail");
		var regEmail=/^[a-zA-Z]+[a-zA-Z0-9_.]*[a-zA-Z0-9]+@[a-zA-Z]+[a-zA-Z0-9]*\.?[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
		var kqEmail=regEmail.test(email);
		if(email.length==0)
		{
			errEmail.innerHTML="Không được để trống!";	
		}else if(email.length<10)
		{
			errEmail.innerHTML="Email phải lớn hơn 10 kí tự!";			
		}else if(kqEmail==false)
		{
			errEmail.innerHTML="Email không đúng định dạng!";	
		}else
		{
			errEmail.innerHTML="";	
			dem++;
		}
		
		if(dem==8)
		{
			return true;	
		}else
		{
			return false;	
		}
	}
	
</script>
<h1>Thêm nhân viên</h1>
<form action="QLNV/addNvXuLy.php" class="form-horizontal" method="post">
	<div class="form-group">
    	<label class="control-label col-sm-4">Tài khoản:</label>
        <div class="col-sm-4">
        	<input type="text" id="txtUser" name="txtUser" class="form-control"> <span id="errUser"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Mật khẩu:</label>
        <div class="col-sm-4">
        	<input type="password" id="txtPass" name="txtPass" class="form-control"> <span id="errPass"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Họ và tên:</label>
        <div class="col-sm-4">
        	<input type="text" id="txtName" name="txtName" class="form-control"> <span id="errName"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Ngày sinh:</label>
        <div class="col-sm-4">
        	<input type="date" id="txtNgay" name="txtNgay" class="form-control"> 
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Giới tính:</label>
        <div class="col-sm-4">
        	<input type="radio" value="Nam" name="rdbGioiTinh">Nam 
            <input type="radio" value="Nữ" name="rdbGioiTinh">Nữ  <span id="errGioiTinh"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Số điện thoại:</label>
        <div class="col-sm-4">
        	<input type="text" id="txtNum" name="txtNum" class="form-control"> <span id="errNum"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Địa chỉ:</label>
        <div class="col-sm-4">
        	<input type="text" id="txtAdd" name="txtAdd" class="form-control"> <span id="errAdd"></span>
        </div>
    </div>
    <div class="form-group">
    	<label class="control-label col-sm-4">Email:</label>
        <div class="col-sm-4">
        	<input type="text" id="txtEmail" name="txtEmail" class="form-control"> <span id="errEmail"></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <input type="submit" class="btn btn-success" onclick="return addNvVal()" value="Thêm">
            <input type="reset" class="btn btn-default" value="Nhập lại" onclick="return confirm('Chắc chắn muốn nhập lại?')">
        </div>
    </div>
</form>