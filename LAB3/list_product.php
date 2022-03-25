<?php  
    require_once("entities/product.class.php");
    require_once("entities/category.class.php");
?>

<?php  
    include_once("header.php");
    if (!isset($_GET["cateid"])){
        $prods = Product::list_product();

    }
    else{
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateid($cateid);
    }
    $cates = Category::list_category();
    
?>
<div class ="container text-center">
    <div class="col-sm-3" >
        <h3>Danh mục</h3>
        <ul class = "list-group">
            <?php
                foreach ($cates as $item) {
                    echo "<li class = 'list-group-item'>
                               <a href = '/LAB3/list_product.php?cateid=".$item["CateID"]."'>".$item["CategoryName"]."</a></li>";
                    
                }
            ?>
        </ul>
    </div>
    <div class="col-sm-9" >
    <h3>Sản phẩm cửa hàng</h3><br>
        <div class ="row">
            <?php 
                foreach ($prods as $item) {
                    ?>

            <div class="col-sm-4" style = "border: 1pt solid grey;">
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
   

   
   
   <?php include_once("footer.php"); ?>
