<!DOCTYPE html>
<html>
<head>
    <title>Update nmCustomer</title>
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
    if (isset($_GET['kdCustomer'])) {
        $kdCustomer=input($_GET["kdCustomer"]);
        $sql="select * from customer where kdCustomer='$kdCustomer'";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);    
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kdCustomer=htmlspecialchars($_POST["kdCustomer"]);
        $nmCustomer=input($_POST["nmCustomer"]);
        $kota=input($_POST["kota"]);
        $sql="update customer set
            nmCustomer='$nmCustomer'
		    where kdCustomer='$kdCustomer'";
        $hasil=mysqli_query($kon,$sql);
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Update nmCustomer</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
        <div class="form-group">
            <label>nmCustomer:</label>
            <input type="text" name="nmCustomer" class="form-control" value="<?php echo $data['nmCustomer']; ?>" placeholder="Masukan nmCustomer" required />
        </div>
        <input type="hidden" name="kdCustomer" value="<?php echo $data['kdCustomer']; ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>