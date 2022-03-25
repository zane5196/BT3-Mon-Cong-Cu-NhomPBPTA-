<?php  
    require_once("entities/product.class.php");
    require_once("entities/category.class.php");
?>

<?php  
    include_once("header.php");
    if (!isset($_GET["id"])){
        header('Location: not_found.php');

    }
    else{
        $id = $_GET["id"];
        $prod = Product::get_product($id);
        $prod = reset($prod);
        $prods_relate = Product::list_product_relate($prod["CateID"],$id);
        
    }
    $cates = Category::list_category();
    
?>
<div class ="container text-center">
    <div class="col-sm-3 panel panel-danger" >
        <h3 class ="panel-heading">Danh mục</h3>
        <ul class = "list-group">
            <?php
                foreach ($cates as $item) {
                    echo "<li class = 'list-group-item'>
                               <a href = '/LAB3/list_product.php?cateid=".$item["CateID"]."'>".$item["CategoryName"]."</a></li>";
                    
                }
            ?>
        </ul>
    </div>
    <div class="col-sm-9 panel panel-info" >
    <h3 class ="panel-heading">Chi tiết sản phẩm</h3><br>
        <div class ="row">
            <div class="col-sm-6">
                <img src = "<?php echo $prod["Picture"]; ?>" class = "img-responsive" style = "width:120px;height:120px;" alt ="Image">
            </div>
            

            <div class="col-sm-6" >
                <div style ="padding-left:10px;">

                    <h3 class ="text-info"><strong><?php echo $prod["ProductName"]; ?></strong></h3>
                    <p><strong>Giá: <?php echo $prod["Price"]; ?></strong></p>
                    <p><strong>Mô tả: <?php echo $prod["Description"]; ?></strong></p>
                    <p> 
                        <button type = "button" class = "btn btn-primary">Mua hàng </button>
                    </p>
            
                </div>
            </div>
            
            <h3 class ="panel-heading"> Sản phẩm liên quan </h3>
            <div class ="row"> 
                <?php 
                    foreach ($prods_relate as $item) {
                        ?>

                    <div class="col-sm-4">
                    <a href = "/LAB3/product_details.php?id=<?php echo $item ["ProductID"]; ?>">
                        <img src = "<?php echo $item["Picture"]; ?>" class = "img-responsive" style = "width:120px;height:120px;" alt ="Image">
                    </a>
                    
                    <p class ="text-danger"><strong><?php echo $item["ProductName"]; ?></strong></p>
                    <p class ="text-danger"><strong><?php echo $item["Price"]; ?></strong></p>
                    <p> 
                        <button type = "button" class = "btn btn-primary">Mua hàng </button>
                    </p>
                    </div>
                <?php } ?>

            </div>

        </div>       
    </div>  
    
</div>
   

   
   
   <?php include_once("footer.php"); ?>
