<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<?php include "includes/header.php";
 include "includes/nav.php"; 
 include "model/db.php"; 
 include "model/billModel.php";
 include "model/getPointsModel.php";
 include "controller/getPointsContr.php";
 include "controller/billController.php";
?>

<?php 
$result = 0;
if(isset($_POST["generate_bill"])){
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $cust_num = $_POST['customerNumber'];
    $redeem_amount = $_POST['redeem'];

    $bill = new billController();
    $result = $bill->makeBill($item,$quantity,$cust_num,$redeem_amount);
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
          <a class="nav-link"  href="addNewCustomer.php">ADD NEW CUSTOMER</a>
        </li>
      </ul>
      </form>
    </div>
  </div>
</nav>

<div>
    <div>
    <form action = "cashier_landing.php" method = "POST">
    <p style=" display: inline">Customer Number:</p>
    <input name="customerNumber">
    <input type="submit" name="getPoints" value="Get Points" />
    </form>

    <?php   
      if(isset($_POST['getPoints'])){
          $cust_num = $_POST['customerNumber'];
          $fetch_p = new getPointsContr();
          $point = $fetch_p->getPoints($cust_num);
          $ans = $point->fetch_assoc();
          if($ans){ ?>
              <p>Points available : <?php echo $ans["c_points"] ?></p>
              <?php } 
        }
    ?>
    </div>

    <div>
    <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; ">
    <h2 style="margin-left:330px">Bill</h2>
    </div>
    <div style="border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; ">

    <form id="Enter" method="POST" action="cashier_landing.php">
    <br></br>
    <p style="display: inline">Customer Number:</p>
    <input name="customerNumber" style="margin-bottom:10px">

    <table class="table table-striped" id="table">
  <thead>
    <tr>
      <th scope="col">Item ID</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
</table>

    <input type="button" id="addItem" name="additem" value="ADD" onclick="addNewRow()"></input><br><br>
    <label for="redeem">Enter points to redeem:</label>
    <input type="text" name="redeem"></input>
    <input type="submit" name="generate_bill">
    
    </form>
    <?php 
    if($result){
        echo "<h2>Bill amount: $result</h2>";
    }
    ?>
    </div>
</div>
</div>

<script>
  var Entry;
function getVal(V) {
    var xmlhttp = new XMLHttpRequest();
    var id = Entry.childNodes[0].childNodes[0].value;
    xmlhttp.onreadystatechange = function(){
        var p = this.response;
        var quantity = V;
        var qtotal = p * quantity;
        Entry.childNodes[2].childNodes[0].value = qtotal;
    };
    xmlhttp.open("GET", "/SMSys/includes/getPprice.php?pid="+id, true);
    xmlhttp.send();
}

var tableRef= document.getElementById("table");
function addNewRow()
{
    tableRef.innerHTML += "<tr onclick='setelement(this)'><td><input name = 'item[]'></td><td><input name = 'quantity[]' onkeyup='getVal(this.value)'></td><td><input id='qtotal' type = 'text'></td></tr>";
}

document.getElementById("Enter").addEventListener("keypress", (event)=>{
  if(event.key === "Enter"){
    event.preventDefault();
  }
})

function setelement(element)
  {
    Entry = element;
    console.log(Entry.childNodes[0].childNodes[0].value);
  }
</script>