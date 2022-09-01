<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid" style="margin-bottom:20px">
        <div>
            <?php echo "<h4>Welcome ".$_SESSION['user']. "</h4>" ?>
                <div class="float-right">
                    <a href="includes/logout.php"><input type="submit" name="logout" value="Logout"
                    class="btn btn-lg" style="text-decoration: none; color: #000;"></a>
                </div>
        </div>
  </div>
</nav>




