<form method="get" class="navbar-form navbar-right">
	<input type="hidden" name="dog" value="1">
    <input type="hidden" name="maTl" value="<?php if(isset($_GET["maTl"])){echo $_GET["maTl"];}?>">
	<input type="text" name="txtSearch" class="form-control" value="<?php if(isset($_GET["txtSearch"])){echo $_GET["txtSearch"];}?>" placeholder="Tên tác phẩm..." />
    <button type="submit" class="form-control"><span class="glyphicon glyphicon-search"></span> Search</button>
</form>
<?php 
	include("modules/open.php");
	if(isset($_GET["maTl"]))
	{
		$maTl=$_GET["maTl"];
		$sql="select * from tblsach where maTl=$maTl";
		
		//Tim kiem
		$search="";
		if(isset($_GET["txtSearch"]))
		{
			$search=$_GET["txtSearch"];
			$sql="select * from tblsach where maTl=$maTl and tenSach like '%$search%'";	
		}
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0)
		{
			echo "Không tìm thấy sản phẩm nào.";	
		}
		
		//Phan trang
		$start=0;
		$sachTren1Trang=10;
		$end=$sachTren1Trang;
		if(isset($_GET["page"]))
		{
			$page=$_GET["page"];
			$start=$page*$sachTren1Trang;
		}
		$soSach=mysqli_num_rows($result); //tổng số sách
		$soTrang=ceil($soSach/$sachTren1Trang); //tổng số trang
			
		//loc sp
		$sql="select * from tblsach where maTl=$maTl and tenSach like '%$search%' limit $start,$end";
		$result=mysqli_query($conn,$sql);
?>  
      <table class="table table-responsive">
      	<tr>
      	<?php
		$dem=0; //đếm sp trên 1 dòng
      		while($row=mysqli_fetch_array($result))
			{	
				$dem++;
		?>
					<td>
                    	<table style="width:200px">
                        	<tr>
                            	<td>
                                	<a href="chiTietSach.php?maSach=<?php echo $row["maSach"]?>">
                                		<img src="<?php echo $row["anh"]?>" height="200px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                            	<td>
									<a href="chiTietSach.php?maSach=<?php echo $row["maSach"]?>">
										<?php echo $row["tenSach"]?>
                                	</a>
                                </td>
                            </tr>
                            <tr>
                            	<td><?php echo $row["gia"]?>
                                <a href="themVaoGioHang.php?maSach=<?php echo $row["maSach"]?>">
                                		<img src="images/gioHang.jpg" width="30">
                                    </a>
                                </td>  
                            </tr>
                        </table>
                    </td>
				<?php
					if($dem%5==0) //đếm =5 xuống dòng
					{
				?>
					</tr>
					<tr>
				<?php	
					}	
			}
		?>
      	</tr>
      </table>
<?php
	include("modules/close.php");
?>
		<ul class="pagination" >
    <?php
		for($i=0;$i<$soTrang;$i++)
		{
			if(isset($_GET["txtSearch"]))
			{
				$search=$_GET["txtSearch"];
				?>
				<li><a href="?dog=1&page=<?php echo $i?>&maTl=<?php echo $maTl?>&txtSearch=<?php echo $search?>"><?php echo ($i+1) ?></a></li>
				<?php
			}else
			{
				?>
				<li><a href="?dog=1&page=<?php echo $i?>&maTl=<?php echo $maTl?>"><?php echo ($i+1) ?></a></li>
				<?php	
			}
		}
	}
	?>
		</ul>