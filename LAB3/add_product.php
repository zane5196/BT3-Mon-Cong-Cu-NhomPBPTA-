<?php  
require_once('entities/category.class.php');
require_once("entities/product.class.php");
    
    if (isset($_POST["btnsubmit"])){
        $productName = $_POST["txtName"];
        $cateID= $_POST["txtCateID"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_FILES["txtpic"];

        $newProduct = new Product( $productName, $cateID, $price,$quantity,$description,$picture);

        $result = $newProduct -> save();

        if (!$result){
            header("Location: add_product.php?failure");
        }
        else{
            header("Location: add_product.php?inserted");
        }

    }
?>
    

<?php include_once("header.php");    ?>

<?php    
    if (isset($_GET["inserted"])){
        echo "<h2>Thêm sản phẩm thành công !</h2>";
    }
?>

<form method="post" enctype="multipart/form-data"> 
    <div class = "row"> 
        <div class = "lbltitle">
                <label for = "txtName"">Tên sản phẩm</label>
        </div>
        <div class = "lblinput">
                <input class = "form-control" type ="text" name = "txtName" value = "<?php echo isset($_POST["txtName"]) ? $_POST["txtName"]: ""; ?>"/>
        </div>
        
    </div>

    <br/>

    <div class = "row"> 
    <div class = "lbltitle">
                <label for = "txtdesc">Mô tả sản phẩm</label>
        </div>
        <div class = "lblinput">
                <textarea class = "form-control" name = "txtdesc" col = "21" row = "10" value = "<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"]: ""; ?>"></textarea>
        </div>
    </div>
    <br/>
    <div class = "row"> 
        <div class = "lbltitle">
                <label for = "txtpic">Hình ảnh sản phẩm</label>
        </div>
        <div class = "lblinput">
            <input type="file" name="txtpic" accept=".png,.gif,.jpg,.jpeg">
        </div>
    </div>
    <br/>
    <div class = "row"> 
        <div class = "lbltitle">
                <label for = "txtprice">Giá sản phẩm</label>
        </div>
        <div class = "lblinput">
                <input class = "form-control" type ="number" min = "0" name = "txtprice" value = "<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"]: ""; ?>"/>
        </div>
    </div>
    <br/>
    <div class = "row"> 
        <div class = "lbltitle">
                <label for = "txtquantity">Số lượng</label>
        </div>
        <div class = "lblinput">
                <input class = "form-control" type ="number" min = "0" name = "txtquantity" value = "<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"]: ""; ?>"/>
        </div>
    </div>
    <br/>
    <div class = "row"> 
        <div class = "lbltitle">
                <label for = "txtCateID">Loại sản phẩm</label>
        </div>
        <div class = "lblinput">
            <select name="txtCateID">
                <option value="" selected>-- Chọn loại --</option>
                    <?php $cates = Category::list_category() ?>
                    <?php 	foreach ($cates as $item) { ?>
                    <option value="<?php echo $item['CateID'] ?>"><?php echo $item['CategoryName'] ?></option>
                <?php } ?>
            </select>
               
        </div>
    </div>
    <br/>
    <div class = "form-group"> 
        <div class = "submit" style="text-align: right">
            <input class="btn btn-success" type ="submit" name = "btnsubmit" value = "Thêm sản phẩm"/>    
        </div>
    </div>
</form>