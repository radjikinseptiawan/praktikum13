<?php
    require("./configuration/database.php");
    $cluster = new DatabaseConn();

    $per_page = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if($page < 1) $page = 1;
    $offset = ($page - 1) * $per_page;


    $result = $cluster->getallData("data_barang");
    $nama = "";
    if(isset($_GET['search']) && $_GET['search'] !== ""){
        $nama = $_GET['search'];
        $result = $cluster->getDataSelection("data_barang", "nama", $nama);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cari Barang - Mode GET</title>
    <link rel="stylesheet" href="./style/index.css">
</head>
<body>
    <form action="" class="search-form" method="get">
        <label for="search">Cari Data</label>
        <input class="input-group" id="search" name="search" type="text" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <input  class="input-group" type="submit" value="Cari">
    </form>

    <hr>

    <?php if(isset($_GET['search'])): ?>
        <p>Menampilkan hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['search']) ?></strong></p>
    <?php endif; ?>

    <table>

    <?php
        if(isset($_GET['search'])){
            include("./component/tableSelect.php");
        }else{
            include('./component/table.php');     
        }        
    ?>
    </table>
        <?php
            if($data-> num_rows == $per_page):
        ?>
            <a href="?page=<?= $page + 1 ?>">Next</a>
        <?php endif; ?>
        <?php
            if($page > 1):?>
            <a href="?page=<?= $page - 1 ?>">Previous</a>
        <?php endif;?>
</body>
</html>