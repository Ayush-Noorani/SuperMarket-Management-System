<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<?php include "includes/header.php"; ?>
<?php include "includes/nav.php";
include "model/db.php";
include "model/searchProductModel.php";
include "model/updateProductModel.php";
include "controller/searchProductContr.php";
include "controller/updateProductContr.php";?>

<?php $message = "";?>

<?php 
if(isset($_POST['search_product'])){
    $value = $_POST['search'];
    $getP = new searchProductContr();
    $result = $getP->getProduct($value);
    $row = $result->fetch_assoc();
}

if(isset($_POST['update'])){
    $prod_id = $_POST['prod_id'];
    $quantity = $_POST['quantity'];
    $updateProd = new updateProductContr();
    $result = $updateProd->updateItem($prod_id,$quantity);
    echo $result;   
}
?>

<div>
    <div style=" margin-bottom: 30px;">
        <div  style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; ">
        <h2>Update stock</h2>
        </div>

        <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; padding-top:35px; padding-bottom:35px">
        <form method="POST" action="supervisor_landing.php">
        <label for="prod_id">Product_Id:</label><br>
        <input type="text" name="prod_id"><br>
        <label for="quantity">Quantity:</label><br>
        <input type="text"  name="quantity"><br><br>
        <input type="submit" name="update" value="Update">
        <?php echo $message;?>
    </form>
    </div>
    </div>

    <div>
        <div  style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; ">
            <h2>Search for a product</h2>
        </div>
        <div  style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; padding-top:35px; padding-bottom:35px">
        <form method="POST" action="supervisor_landing.php">
        <input type="text" name="search" placeholder="Enter barcode or product name">
        <input type="submit" name="search_product" value="Search">
    </form>
    <table>
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <?php if(isset($row)){ ?> 
        <tr>
            <td>
            <?php 
                echo $row['p_name'] . " ";
                echo $row['p_quantity'] . " "; 
                echo $row['p_price'] . " ";
            ?>
            </td>
        </tr>
        <?php }?>
    </table>

        </div>
        
    </div>
</div>

