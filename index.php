<!DOCTYPE html>
<html>
<head>
    <title>PHP MySql</title>
    <h2>Table customer</h2>
</head>
<body>
<div class="container">
    <br> NIM : 201110191 </br>
    <br> NAMA   : Nur Rizkyawan Maulana </br>
<?php
    include "db_connect.php";
    if (isset($_GET['kdCustomer'])) {
        $kdCustomer=htmlspecialchars($_GET["kdCustomer"]);
        $sql="delete from customer where kdCustomer='$kdCustomer' ";
        $hasil=mysqli_query($kon,$sql);
            if ($hasil) {
                header("Location:index.php");
            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
?>
    <table width="68%" border="1" 25 cellpadding="5">
        <br>
        <thead>
        <tr>
            <th>kdCustomer</th>
            <th>nmCustomer</th>
            <th>Kota</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <?php
        include "db_connect.php";
        $sql="select * from customer order by kdCustomer desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $data["kdCustomer"]; ?></td>
                <td><?php echo $data["nmCustomer"];   ?></td>
                <td><?php echo $data["kota"];   ?></td>
                <td>
                    <a href="update.php?kdCustomer=<?php echo htmlspecialchars($data['kdCustomer']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?kdCustomer=<?php echo $data['kdCustomer']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <br>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>

</body>
</html>
