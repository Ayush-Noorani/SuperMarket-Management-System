<?php 
include "includes/header.php";
include "includes/nav.php";
include "model/db.php";
include "model/getRolesModel.php";
include "model/createUserModel.php";
include "controller/getRolesContr.php";
include "controller/createUserContr.php";
?>

<?php 
if(isset($_POST["addUser"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $makeUser = new createUserContr();
    $result = $makeUser->makeuser($username,$password,$role);
    echo "<h2>$result</h2>";
    ?>
    <button type="submit"><a href="admin_landing.php" style="text-decoration: none; color: black;" >Back to Home</button>
<?php }
?>

<div>
    <div style="border-width:1px; left: 50%; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; box-shadow: 5px 10px #888888; ">
        <h2 style="padding-left:270px;">CREATE USER</h2>
    </div>
    <div style="display: flex; flex-direction: column; align-items: center; border-width:1px; border-color:black; border-style:solid; margin-left:350px; margin-right:350px; padding-left:50px; padding-right:50px; padding-top: 15px; padding-bottom: 15px;  box-shadow: 5px 10px #888888; margin-bottom:50px  ">
<form method="POST" action="createUser.php">
    <div style="padding-top: 15px; padding-bottom: 15px">
    <input type="text" placeholder="Enter user name" name="username" style="display: block; padding-left: 50px"/>

    </div>

    <div  style="padding-top: 15px; padding-bottom: 15px">
      <input type="password"  placeholder="password"  name="password" style="padding-left: 50px" />

    </div>
        
        
        <?php 
        $user_roles = new getRolesContr();
        $result = $user_roles->getRoles();
        ?>
        <select name="role">
            <?php 
            while($row = $result->fetch_assoc()){ ?>
                <option name=<?php echo $row["role"] ?>><?php echo $row["role"] ?></option>
           <?php } ?>
        </select>
        <div style="padding-top: 15px; padding-bottom: 15px">
          <input type="submit" name="addUser" value="Add New User" >
        </div>
       
    </form>
    
</div>
    
</div>
