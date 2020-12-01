<?php 
$sql="SELECT * FROM tbl_tin ORDER BY id_tin DESC"; 
$query=mysqli_query($conn,$sql);
?>

<div class="container">
        <div class="col-md-9">
            <div class="clearfix ">
                <h1 class="title"><span>Danh sách tin</span></h1>
                <?php while ($row=mysqli_fetch_assoc($query)) {
                       ?>
                
                    
                    <ul >
                        <li >
                            <a href="index.php?view=xemtin&id=<?php echo $row['id_tin']?>"><h3 style="display: inline;"><?php echo $row['tieuDe']; ?></h3>   </a>
                        </li>
                        <li><div style="display: inline;">
                            <a href="index.php?view=xemtin&id=<?php echo $row['id_tin']?>"><img style="width: 200px; height: 150px;"  src="<?php echo "upload/imgtin/".$row["img"]; ?>" alt=""></a>
                            <span style="width: 550px;"><?php echo $row['tomtat']; ?></span>
                            </div>
                        </li>
                        
                    </ul>
                   
                
                   <?php
                    } ?>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3">
            <img  style="width: 100%;" src="upload/imgwb/1.jpg" alt="">       
        </div>
    </div>
</div>