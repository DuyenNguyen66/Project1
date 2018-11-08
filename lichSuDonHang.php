<div class="row">
	<h1>Tìm kiếm</h1>
</div>
<div class="row">
	<div class="col-sm-2"></div>
    <div class="col-sm-4">
        <form method="get" class="navbar-form ">
            <input type="hidden" name="dog" value="2" />
            <input type="date" class="form-control" name="dateSearch" value="<?php if(isset($_GET["dateSearch"])){echo $_GET["dateSearch"];}?>">
            <button type="submit" class="form-control"><span class="glyphicon glyphicon-search"></span> Search</button>     
        </form>
    </div>
    <div class="col-sm-4">
        <form method="get" class="navbar-form">
            <input type="hidden" name="dog" value="2">
            <select name="tinhTrang" class="form-control">
                <option value="null">--Chọn--</option>
                <option value="0">Chưa duyệt</option>
                <option value="1">Đã duyệt</option>
                <option value="2">Đã giao hàng</option>
            </select>
            <input type="submit" value="Search" class="btn btn-info">
         </form>
    </div>
</div>
<h1>Lịch sử đơn hàng</h1>
<?php		
    include("modules/open.php");
	if(isset($_SESSION["userKh"]))
	{
		$userKh=$_SESSION["userKh"];
		$sqlKh="select * from tblkh where user='$userKh'";
		$resultKh=mysqli_query($conn,$sqlKh);
		$rowKh=mysqli_fetch_array($resultKh);
		$maKh=$rowKh["maKh"];
					
		$sql="SELECT * 
					FROM (tblhoadon 
						  INNER JOIN tblhoadonchitiet ON tblhoadon.maHd=tblhoadonchitiet.maHd)
						  where maKh=$maKh
						  group by tblhoadon.maHd
						  order by tblhoadon.maHd desc";
		
		//tim kiem
		$dateSearch="";
		if(isset($_GET["dateSearch"]))
		{
			$dateSearch=$_GET["dateSearch"];
			$sql="SELECT * 
					FROM (tblhoadon 
						  INNER JOIN tblhoadonchitiet ON tblhoadon.maHd=tblhoadonchitiet.maHd)
						  where maKh=$maKh and ngayDatHang like '%$dateSearch%'
						  group by tblhoadon.maHd
						  order by tblhoadon.maHd desc";	
		}
		if(isset($_GET["tinhTrang"]))
		{
			$tinhTrang=$_GET["tinhTrang"];
			$sql="SELECT * 
					FROM (tblhoadon 
						  INNER JOIN tblhoadonchitiet ON tblhoadon.maHd=tblhoadonchitiet.maHd)
						  where maKh=$maKh and tinhTrang=$tinhTrang
						  group by tblhoadon.maHd
						  order by tblhoadon.maHd desc";	
			if($tinhTrang=='null')
			{
				header("location:index.php?dog=2");	
			}	
		}
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)==0)
		{
			echo "Không tìm thấy đơn hàng nào.";	
		}	
		//phan trang
		$start=0;
		$donHangTren1Trang=5;
		$end=$donHangTren1Trang;
		if(isset($_GET["page"]))
		{
			$page=$_GET["page"];	
			$start=$page*$donHangTren1Trang;
		}
		$soDonHang=mysqli_num_rows($result);
		$soTrang=ceil($soDonHang/$donHangTren1Trang);
		
		//loc don hang
		$sql="SELECT * 
					FROM (tblhoadon 
						  INNER JOIN tblhoadonchitiet ON tblhoadon.maHd=tblhoadonchitiet.maHd)
						  where maKh=$maKh
						  group by tblhoadon.maHd
						  order by tblhoadon.maHd desc limit $start,$end";	
		if(isset($_GET["dateSearch"]))
		{
			$dateSearch=$_GET["dateSearch"];
			$sql="SELECT * 
						FROM (tblhoadon 
						  INNER JOIN tblhoadonchitiet ON tblhoadon.maHd=tblhoadonchitiet.maHd)
						  where maKh=$maKh and ngayDatHang like '%$dateSearch%'
						  group by tblhoadon.maHd
						  order by tblhoadon.maHd desc limit $start,$end";
		}
		if(isset($_GET["tinhTrang"]))
		{
			$tinhTrang=$_GET["tinhTrang"];
			$sql="SELECT * 
					FROM (tblhoadon 
						  INNER JOIN tblhoadonchitiet ON tblhoadon.maHd=tblhoadonchitiet.maHd)
						  where maKh=$maKh and tinhTrang=$tinhTrang
						  group by tblhoadon.maHd
						  order by tblhoadon.maHd desc limit $start,$end";		
		}
		$result=mysqli_query($conn,$sql);	
?>
<div class="row">
	<div class="col-sm-2"></div>
    <div class="col-sm-8 col-xs-12" >
    	<table class="table table-responsive">
        	<tr>
            	<td>Mã ĐH</td>
                <td>Ngày đặt hàng</td>
                <td>Tình trạng</td>
                <td></td>
            </tr>
            <?php
				while($row=mysqli_fetch_array($result))
				{
			?>
            <tr>
                <td><?php echo $row["maHd"]?></td>
                <td><?php echo $row["ngayDatHang"]?></td>
                <td>
                    <?php
                        if($row["tinhTrang"]==1)
                        {
                            echo "Đã duyệt";	
                        }else if($row["tinhTrang"]==0)
                        {
                            echo "Chưa duyệt";	
                        }else
						{
							echo "Đã giao hàng";
						}
                    ?>
                </td>
                <td><a href="chiTietDH.php?maHd=<?php echo $row["maHd"]?>">Chi tiết đơn hàng</a></td>
            </tr>
            <?php
				}
			?>
        </table>
    </div>
    <div class="col-sm-2"></div>
</div><!--row-->

    <?php
	}
	?>
    <ul class="pagination">
    	<?php 
			for($i=0;$i<$soTrang;$i++)
			{
				if(isset($_GET["dateSearch"]))
				{
					$dateSearch=$_GET["dateSearch"];
					?>
					<li><a href="?dog=2&page=<?php echo $i ?>&dateSearch=<?php echo $dateSearch?>"><?php echo $i+1 ?></a></li>
					<?php
				}else if(isset($_GET["tinhTrang"]))
				{
					$tinhTrang=$_GET["tinhTrang"];
					?>
					<li><a href="?dog=2&page=<?php echo $i ?>&tinhTrang=<?php echo $tinhTrang?>"><?php echo $i+1 ?></a></li>
					<?php	
				}else
				{
					?>
					<li><a href="?dog=2&page=<?php echo $i ?>"><?php echo $i+1 ?></a></li>
					<?php
				}
			}
			include("modules/close.php");
		?>
    </ul>
    
