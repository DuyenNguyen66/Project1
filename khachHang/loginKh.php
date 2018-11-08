<script language="javascript">
	function loginKhVal()
	{
		var user=document.getElementById("txtUser");
		if(user.value=="")
		{
			alert("Tên tài khoản không được để trống!");
			user.focus();
			return;
		}
		var pass=document.getElementById("txtPass");
		if(pass.value=="")
		{
			alert("Mật khẩu không được để trống!");
			pass.focus();
			return;
		}    
	}
</script>
		<h1>Đăng nhập</h1>
        <form action="khachHang/loginKhXuLy.php" class="form-horizontal" method="post">
            <div class="form-group">
            	<label class="control-label col-sm-4">Username:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="txtUser" name="txtUser">
                </div> 
            </div>
            <div class="form-group">
            	<label class="control-label col-sm-4">Password:</label>
                <div class="col-sm-4">
                	<input type="password" class="form-control" id="txtPass" name="txtPass">
                </div> 
            </div>
            <div class="form-group">
            	<div class="col-sm-4"></div>
            	<div class="col-sm-4">
            		<input type="submit" class="btn btn-success" value="Đăng nhập" onclick="return loginKhVal()">
                    <a href="khachHang/quenMk.php" class="btn btn-warning">Quên mật khẩu</a>
                </div>
            </div>
        </form>


   