<!DOCTYPE html>
<html>
<head>
    <title>Input</title>
    <h2>Edit table customer</h2> 
</head>
<body>
<div class="container">
    <?php
    include "db_connect.php";
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $kdCustomer=input($_POST["kdCustomer"]);
        $nmCustomer=input($_POST["nmCustomer"]);
        $kota=input($_POST["kota"]);
        $sql="insert into customer (kdCustomer,nmCustomer,kota) values
		('$kdCustomer','$nmCustomer','$kota')";
        $hasil=mysqli_query($kon,$sql);
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Input Data</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>kdCustomer:</label>
            <input type="text" name="kdCustomer" class="form-control" placeholder="Masukan kdCustomer" required />
        </div>
        <div class="form-group">
            <label>nmCustomer:</label>
            <input type="text" name="nmCustomer" class="form-control" placeholder="Masukan nmCustomer" required/>
        </div>
        <div class="form-group">
            <label>kota:</label>
            <input type="text" name="kota" class="form-control" placeholder="Masukan kota" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>