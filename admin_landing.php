<?php
include "includes/header.php";
include "includes/nav.php";
include "model/db.php";
include "model/getWeeklySale.php";
include "model/getCategoriesModel.php";
include "model/getCategorySummaryModel.php";
include "model/getPointsModel.php";
include "controller/getPointsContr.php";
include "controller/getWeeklySaleContr.php";
include "controller/getCategoriesContr.php";
include "controller/getCategorySummaryContr.php";
?>

<?php $resultSET = 0;?>

<?php 
if(isset($_POST['fetch_sales'])){
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $getSale = new getWeeklySaleContr();
    $resultSet = $getSale->getSalefromDate($start_date,$end_date); 
    $rowSet = $resultSet->num_rows;
}

if(isset($_POST["getCat"])){
    $cat_id = $_POST["category"];
    $categorySummary = new getCategorySummaryContr();
    $resultSET = $categorySummary->getCatSummary($cat_id);
}
?>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid" style="margin-bottom:20px">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="createUser.php">ADD NEW USER</a>
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav>

<div>
    <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; ">
        <h2>This weeks sale:</h2>
    </div>
    <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; padding-right:50px; padding-top: 15px; padding-bottom: 15px;  box-shadow: 5px 10px #888888; margin-bottom:50px  ">
    <table>
            <th>Category</th>
            <th>Quantity</th>
            <th>Collection</th>
            <?php  
            $getWS = new getWeeklySaleContr();
            $result = $getWS->getws();
            $row = $result->num_rows;
            if($row > 0){
                while($row = $result->fetch_assoc()){?>
                    <tr>
                    <td>
                    <?php echo $row['category_name'] . " " .$row['quantity']. " " .$row['s_price'] ?>
                    </td>
                </tr>

            <?php } }?>
        </table>
        <?php $result = $getWS->getSales();?>
        <p>Total collection this week: <?php echo $result['sum']; ?></p>
    </div>

    <div>
        <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; margin-bottom:50px ">
        <?php 
            $points = new getPointsContr();
            $row = $points->weeklyRedeem();
        ?>
        <h3>Points redeemed this week by customers: <?php echo $row["points"]; ?> points</h3>
        </div>
    </div>

    <div>
        <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; ">
             <h2>Inside category summary</h2>
        </div>
        <div  style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; padding-right:50px; padding-top: 15px; padding-bottom: 15px;    box-shadow: 5px 10px #888888; margin-bottom:50px ;">
        <?php 
        $no_of_category = new getCategoriesContr();
        $result = $no_of_category->getCat();
    ?>
    <form method = "POST" action = "admin_landing.php">
        <label>Select a category:</label>
        <select name="category" >
            <?php 
                while($row = $result->fetch_assoc()){?>
                    <option value = <?php echo $row["cat_id"] ?>><?php echo $row["cat_name"] ?></option>
               <?php }  ?>
        </select>
        <input type="submit" value="Get Sales" name="getCat" style="margin-top: 10px;">
    </form>

    <?php 
    if($resultSET){?>
        <table>
            <th>Item</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Collection</th>
            <?php 
            while($row = $resultSET->fetch_assoc()){ ?>
            <tr>
                <td>
                <?php echo $row['prod_id'] ." " .$row['prod_name']. " " .$row['quantity']. " " .$row['s_price'] ?>
                </td>
            </tr>
           <?php } ?>
        </table>
   <?php } ?> 
        </div>
    </div>

    <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888;">
    <h2>Select dates to get sales according to dates: </h2>
    </div>
    <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; padding-right:50px; padding-top: 15px; padding-bottom: 15px; box-shadow: 5px 10px #888888; margin-bottom:50px ;">
    <form method = "POST" action="admin_landing.php">
        <div class="form-group">
            <label for="start_date" class="sr-only">From:</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date" class="sr-only">To:</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <input type="submit" name="fetch_sales" class="btn btn-custom btn-lg btn-block" value="Get sales" style="margin-top: 5px;">
    </form>

    <?php 
    if(isset($rowSet)){?>
     <table>
        <th>Item</th>
        <th>Quantity</th>
        <th>Collection</th>
        <?php 
            while($rowSet = $resultSet->fetch_assoc()){?>
                <tr>
                <td>
                    <?php echo $rowSet['cat_id'] . " " .$rowSet['quantity']. " " .$rowSet['s_price'] ?>
                </td>
            </tr>

        <?php } }?>
    </table>

    </div>


</div>
</body>
</html>
