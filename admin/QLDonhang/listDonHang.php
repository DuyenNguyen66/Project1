<div class="row">
	<h1>Tìm kiếm</h1>
</div>
<div class="row">
    <div class="col-sm-4">
        <form method="get" class="navbar-form">
            <input type="hidden" name="dog" value="3" />
            <input type="search" name="txtSearch" value="<?php if(isset($_GET["txtSearch"])){echo $_GET["txtSearch"];}?>" placeholder="Tên khách hàng..." class="form-control">
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    </div>
    <div class="col-sm-4">
        <form method="get" class="navbar-form">
            <input type="hidden" name="dog" value="3">
            <input type="date" name="dateSearch" value="<?php if(isset($_GET["dateSearch"])){echo $_GET["dateSearch"];}?>" class="form-control">
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    </div>
    <div class="col-sm-4">
        <form method="get" class="navbar-form">
            <input type="hidden" name="dog" value="3">
            <select name="tinhTrang" class="form-control">
                <option value="null">--Chọn--</option>
                <option value="0">Chưa duyệt</option>
                <option value="1">Đã duyệt</option>
                <option value="2">Đã giao hàng</option>
            </select>
            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    </div>
</div>
<?php
	$sql="SELECT * FROM (tblhoadon 
							   INNER JOIN tblkh on tblhoadon.maKh=tblkh.maKh) 
								GROUP BY tblhoadon.maHd
								ORDER BY tblhoadon.maHd DESC";	
	$search="";
	if(isset($_GET["txtSearch"]))
	{
		$search=$_GET["txtSearch"];
		$sql="SELECT * FROM (tblhoadon 
							   INNER JOIN tblkh on tblhoadon.maKh=tblkh.maKh) 
							   where ten like '%$search%'
								GROUP BY tblhoadon.maHd
								ORDER BY tblhoadon.maHd DESC";	
	}
	$dateSearch="";
	if(isset($_GET["dateSearch"]))
	{
		$dateSearch=$_GET["dateSearch"];
		$sql="SELECT * FROM (tblhoadon 
							   INNER JOIN tblkh on tblhoadon.maKh=tblkh.maKh) 
							   where ngayDatHang like '%$dateSearch%'
								GROUP BY tblhoadon.maHd
								ORDER BY tblhoadon.maHd DESC";		
	}
	if(isset($_GET["tinhTrang"]))
	{
		$tinhTrang=$_GET["tinhTrang"];
		$sql="SELECT * FROM (tblhoadon 
							   INNER JOIN tblkh on tblhoadon.maKh=tblkh.maKh) 
							   where tinhTrang=$tinhTrang
								GROUP BY tblhoadon.maHd
								ORDER BY tblhoadon.maHd DESC";
		if($tinhTrang=='null')
		{
			header("Location:admin.php?dog=3");	
		}		
	}
	
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0)
	{
		echo "Không tìm thấy đơn hàng nào.";	
	}
	
	//Phan trang
	$start=0;
	$donHangTren1Trang=4;
	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
		$start=$page*$donHangTren1Trang;		
	}
	$end=$donHangTren1Trang;	
	$soDonHang=mysqli_num_rows($result); 
	$soTrang=ceil($soDonHang/$donHangTren1Trang); 
	
	//loc sp
	$sql="SELECT * FROM (tblhoadon 
							   INNER JOIN tblkh on tblhoadon.maKh=tblkh.maKh) 
								GROUP BY tblhoadon.maHd
								ORDER BY tblhoadon.maHd DESC
								limit $start,$end";	
	if(isset($_GET["txtSearch"]))
	{
		$search=$_GET["txtSearch"];
		$sql="SELECT * FROM (tblhoadon 
							   INNER JOIN tblkh on tblhoadon.maKh=tblkh.maKh) 
							   where ten like '%$search%'
								GROUP BY tblhoadon.maHd
								ORDER BY tblhoadon.maHd DESC 
								limit $start,$end";
	}
	if(isset($_GET["dateSearch"]))
	{
		$dateSearch=$_GET["dateSearch"];
		$sql="SELECT * FROM (tblhoadon 
							   INNER JOIN tblkh on tblhoadon.maKh=tblkh.maKh) 
							   where ngayDatHang like '%$dateSearch%'
								GROUP BY tblhoadon.maHd
								ORDER BY tblhoadon.maHd DESC
								limit $start,$end";
	}
	if(isset($_GET["tinhTrang"]))
	{
		$tinhTrang=$_GET["tinhTrang"];
		$sql="SELECT * FROM (tblhoadon 
							   INNER JOIN tblkh on tblhoadon.maKh=tblkh.maKh) 
							   where tinhTrang=$tinhTrang
								GROUP BY tblhoadon.maHd
								ORDER BY tblhoadon.maHd DESC
								limit $start,$end";		
	}	
	$result=mysqli_query($conn,$sql);
	
?>

 <h1>Danh sách đơn hàng</h1>
            <table class="table table-responsive">
                <tr>
                    <td>Mã ĐH</td>
                    <td>Ngày đặt hàng</td>
                    <td>Tên khách hàng</td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ</td>
                    <td>Tình trạng</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    while($row=mysqli_fetch_array($result))
                    {
                ?> 
                <tr>
                    <td><?php echo $row["maHd"]?></td>
                    <td><?php echo $row["ngayDatHang"]?></td>
                    <td><?php echo $row["ten"]?></td>
                    <td><?php echo $row["sdt"]?></td>
                    <td><?php echo $row["diaChi"]?></td>
                    <td>
                        <?php
                            if($row["tinhTrang"]==0)
                            {
                                echo "Chưa duyệt";	
                            }else if($row["tinhTrang"]==1)
                            {
                                echo "Đã duyệt";	
                            }else if($row["tinhTrang"]==2)
							{
								echo "Đã giao hàng";	
							}
                        ?>
                    </td>
                    <td><a href="QLDonHang/chiTietDonHang.php?maHd=<?php echo $row["maHd"]?>&maKh=<?php echo $row["maKh"]?>">Chi tiết đơn hàng</a></td>
                    <?php
                        if($row["tinhTrang"]==0)
                        {
                    ?>
                            <td><a class="btn btn-danger" href="QLDonHang/editDonHang.php?maHd=<?php echo $row["maHd"]?>">Duyệt</a></td>
                            
                    <?php	
                        }else if($row["tinhTrang"]==1)
						{
					?>
                    		<td><a class="btn btn-success" href="QLDonHang/editDonHang.php?maHd=<?php echo $row["maHd"]?>">Đã giao hàng</a></td>
                    <?php	
						}
                    ?>  
                    <td><a href="QLDonHang/deleteDonHang.php?maHd=<?php echo $row["maHd"]?>" onclick="return confirm('Bạn có muốn xóa đơn hàng?')">Xóa</a></td>       
                </tr> 
                <?php
                    }
                ?>
        	</table>
 <ul class="pagination" >
		<?php
            for($i=0;$i<$soTrang;$i++)
            {
                if(isset($_GET["txtSearch"]))
                {
                    $search=$_GET["txtSearch"];
                    ?>
                    <li><a href="?dog=3&page=<?php echo $i?>&txtSearch=<?php echo $search?>"><?php echo ($i+1) ?></a></li>
                    <?php
                }else if(isset($_GET["dateSearch"]))
				{
					$dateSearch=$_GET["dateSearch"];
					 ?>
                    <li><a href="?dog=3&page=<?php echo $i?>&dateSearch=<?php echo $dateSearch?>"><?php echo ($i+1) ?></a></li>
                    <?php
				}else if(isset($_GET["tinhTrang"]))
				{
					$tinhTrang=$_GET["tinhTrang"];
					 ?>
                    <li><a href="?dog=3&page=<?php echo $i?>&tinhTrang=<?php echo $tinhTrang?>"><?php echo ($i+1) ?></a></li>
                    <?php	
				}else
                {
        ?>
                    <li><a href="?dog=3&page=<?php echo $i?>"><?php echo ($i+1) ?></a></li>
        <?php
                }
            }
			include("../modules/close.php");
        ?>
            </ul>