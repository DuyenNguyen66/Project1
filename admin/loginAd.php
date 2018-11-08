<?php
	session_start();
	if(isset($_SESSION["user"]))
	{
		header("Location:admin.php");	
	}
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

<script language="javascript">
	function loginAdVal()
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

<body>

<div class="jumbotron" style="margin-bottom:0;background-color:#BEFF7D">
	<div class="container text-center">
    	<h1>Admin</h1>
        <p>-------------------</p>
    </div>
</div>

<div class="container">
		<h1>Đăng nhập</h1>
        <form action="loginAdXuLy.php" class="form-horizontal" method="post">
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
            		<input type="submit" class="btn btn-success" value="Đăng nhập" onclick="return loginAdVal()">
                </div>
            </div>
        </form>

</div><!--/.container-->

<footer class="jumbotron text-center" style="margin-bottom:0;background-color:#BEFF7D">
</footer>
</body>
</html>