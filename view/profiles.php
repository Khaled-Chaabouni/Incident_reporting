<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheets/style.css?v=<?php echo time(); ?>">
    </head>
    <body style="background-color: black;">
        
        <?php
            //Database Connection : */
            require_once '../model/dbcon.php';
            //Preparing the SQL Query :
            $sql="select * from users where deleted=0";

            $result=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);
            //Setting Session Variables Gathered from Database :
        ?>  
        <div class="shop">
            <?php include_once'Sortingpanel.php'?>
            <div class="articles">
                <?php 
                    $temp=array();
                    $_SESSION['articles']=$temp;
                    if(isset($_SESSION['acctype'])){
                        if($_SESSION['acctype']=="admin"){
                            if ($count > 0) {
                                while($row=mysqli_fetch_assoc($result)) {
                                    $_SESSION['id_product']=$row['id_product'];
                                    $_SESSION['price']=$row['price'];
                                    $_SESSION['name']=$row['name'];
                                    $_SESSION['duration']=$row['duration'];
                                    $_SESSION['location']=$row['location'];
                                    $_SESSION['img_product']=@$row['img_course'];
                                    ?>
                                    <div class="article">
                                        <img id="productimg"src='<?php echo "images/products/".$row['img_course'].""?>'>
                                        <h1><?php echo $row['name']?></h1>
                                        <h2><?php echo $row['price'].' DT'?></h2>
                                        <h2><?php echo $row['duration'].' Days'?></h2>
                                        <h2><?php echo 'Location : '.$row['location']?></h2>
                                        <form id="addcart" action="http://localhost/Projects/LearnAccount/Cart.php?id=<?php echo $row['id_product']?>" method="POST" enctype="multipart/form-data">
                                            <input type="submit" name="add" value="Add">
                                        </form>
                                    </div>
                                    <?php
                                }
                            }
                        }elseif($_SESSION['admin']==1){
                            if ($count > 0) {
                                while($row=mysqli_fetch_assoc($result)) {
                                    $_SESSION['id_product']=$row['id_product'];
                                    $_SESSION['price']=$row['price'];
                                    $_SESSION['name']=$row['name'];
                                    $_SESSION['duration']=$row['duration'];
                                    $_SESSION['location']=$row['location'];
                                    $_SESSION['img_product']=@$row['img_course'];
                                    ?>
                                    <div class="article">
                                        <h3>Product ID :<?php echo $row['id_product']?></h3>
                                        <img id="productimg" src='<?php echo "images/products/".$row['img_course'].""?>'>
                                        <h1><?php echo $row['name']?></h1>
                                        <h2><?php echo $row['price'].' DT'?></h2>
                                        <h2><?php echo $row['duration'].' Days'?></h2>
                                        <h2><?php echo 'Location : '.$row['location']?></h2>
                                        <form id="addcart" action="http://localhost/Projects/LearnAccount/update.php?id=<?php echo $row['id_product']?>" method="POST" enctype="multipart/form-data">
                                            <input type="submit" name="submit" value="Edit">
                                        </form>
                                    </div>
                                    <?php
                                }
                            }$_SESSION['articles']=$temp;
                        }
                    }
                    else{
                        if ($count > 0) {
                            while($row=mysqli_fetch_assoc($result)) {
                                $_SESSION['id_product']=$row['id_product'];
                                $_SESSION['price']=$row['price'];
                                $_SESSION['name']=$row['name'];
                                $_SESSION['duration']=$row['duration'];
                                $_SESSION['location']=$row['location'];
                                $_SESSION['img_product']=@$row['img_course'];
                                ?>
                                <div class="article">
                                    <img id="productimg" src='<?php echo "images/products/".$row['img_course'].""?>'>
                                    <h1><?php echo $row['name']?></h1>
                                    <h2><?php echo $row['price'].' DT'?></h2>
                                    <h2><?php echo $row['duration'].' Days'?></h2>
                                    <h2><?php echo 'Location : '.$row['location']?></h2>
                                    <form id="addcart" action="http://localhost/Projects/LearnAccount/LearnAccount.php" method="POST" enctype="multipart/form-data">
                                        <input type="submit" name="add" value="Add">
                                    </form>
                                </div>
                                <?php
                            }
                        }
                    }
                ?>                   
            </div>
        </div>
        <script>
            var right=document.getElementById('articles').style.height;
            var left=document.getElementById('sorts').style.height;
            if(right>left)
            {
                document.getElementById('sorts').style.height=right;
            }
        </script>
    </body>
</html>