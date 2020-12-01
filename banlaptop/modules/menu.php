	<?php 
    $sql_hangsx1="SELECT tbl_hangsx.id_hangsx,tbl_hangsx.name_hangsx,tbl_hangsx.ma_cha,tbl_loaisp.id_loaisp,tbl_loaisp.name_loaisp FROM tbl_hangsx ,tbl_loaisp WHERE tbl_hangsx.ma_cha = tbl_loaisp.id_loaisp AND tbl_loaisp.id_loaisp = 1  ORDER BY tbl_hangsx.name_hangsx ASC" ;
    $sql_hangsx2="SELECT tbl_hangsx.id_hangsx,tbl_hangsx.name_hangsx,tbl_hangsx.ma_cha,tbl_loaisp.id_loaisp,tbl_loaisp.name_loaisp FROM tbl_hangsx ,tbl_loaisp WHERE tbl_hangsx.ma_cha = tbl_loaisp.id_loaisp AND tbl_loaisp.id_loaisp = 2  ORDER BY tbl_hangsx.name_hangsx ASC" ;
    $sql_hangsx3="SELECT tbl_hangsx.id_hangsx,tbl_hangsx.name_hangsx,tbl_hangsx.ma_cha,tbl_loaisp.id_loaisp,tbl_loaisp.name_loaisp FROM tbl_hangsx ,tbl_loaisp WHERE tbl_hangsx.ma_cha = tbl_loaisp.id_loaisp AND tbl_loaisp.id_loaisp = 3  ORDER BY tbl_hangsx.name_hangsx ASC" ;
    $query1=mysqli_query($conn,$sql_hangsx1);
    $query2=mysqli_query($conn,$sql_hangsx2);
    $query3=mysqli_query($conn,$sql_hangsx3);
    
    ?>
    <section class="hearder-conten clearfix" style="margin-top: 2px;">
      <nav class="navbar navbar-default" role="navigation" style="width: 100%;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-md hidden-lg" href="#">Menu</a>
        </div>

        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav">
            <li class="dropdown">
                	<a href="./" class="link1"><i class="fa fa-home" aria-hidden="true"></i> TRANG CHỦ</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-mobile" aria-hidden="true"></i>  DELL<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php   
                        while ($hangsx1=mysqli_fetch_array($query1)) {

                            ?>
                            <ul>
                            <li style="margin-top: 2px;"><a style="color: #00008B;"  href="index.php?view=product&id=<?php  echo $hangsx1['id_loaisp']?>&id_hang=<?php   echo $hangsx1['id_hangsx'] ?>"><i class="icon-chevron-right"></i><?php echo $hangsx1['name_hangsx'] ?></a></li>
                        </ul>
                            <?php 
                        }
                        ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tablet" aria-hidden="true"></i>  LENOVO<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       <?php   
                       while ($hangsx2=mysqli_fetch_array($query2)) {

                        ?>
                        <ul>
                            <li style="margin-top: 2px;"><a style="color: #00008B;"  href="index.php?view=product&id=<?php  echo $hangsx2['id_loaisp']?>&id_hang=<?php   echo $hangsx2['id_hangsx'] ?>"><i class="icon-chevron-right"></i><?php echo $hangsx2['name_hangsx'] ?></a></li>
                        </ul>
                        <?php 
                    }
                    ?>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-laptop" aria-hidden="true"></i> MSI<span class="caret"></span></a>
                <ul class="dropdown-menu">
                   <?php   
                   while ($hangsx3=mysqli_fetch_array($query3)) {

                    ?>
                    <ul>
                        <li style="margin-top: 2px;"><a style="color: #00008B;"  href="index.php?view=product&id=<?php  echo $hangsx3['id_loaisp']?>&id_hang=<?php   echo $hangsx3['id_hangsx'] ?>"><i class="icon-chevron-right"></i><?php echo $hangsx3['name_hangsx'] ?></a></li>
                    </ul>
                    <?php 
                }
                ?>
            </ul>
        </li>
        <li><a href="?view=bangtin"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  TIN TỨC</a></li>
        <li><a href="index.php?view=map"> <i class="fa fa-map" aria-hidden="true"></i>  BẢN ĐỒ</a></li>
        <li><a href="?view=contact"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  LIÊN HỆ</a></li>
         <li><form class="navbar-form navbar-left" action="index.php?view=whereproduct" role="search" enctype="mutipart/from-data" method="POST"  >
					<div class="form-group" >
						<input type="text" name="seachtext" class="form-control" placeholder="Bạn kiếm sản phẩm gì?" required="">
					</div>
					<button type="submit" name="ok" value="seach" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				</form></li>
    </ul>
</div> 

</nav>
</section>
