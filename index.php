<?php
    require("./configuration/database.php");
    $cluster = new DatabaseConn();

    $result = $cluster->getallData("data_barang");
    $nama = "";
    if(isset($_GET['q']) && $_GET['q'] !== ""){
        $nama = $_GET['q'];
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
        <label for="q">Cari Data</label>
        <input class="input-group" id="q" name="q" type="text" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
        <input  class="input-group" type="submit" value="Cari">
    </form>

    <hr>

    <?php if(isset($_GET['q'])): ?>
        <p>Menampilkan hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['q']) ?></strong></p>
    <?php endif; ?>

    <table>

    <?php
        if(isset($_GET['q'])){
            include("./component/tableSelect.php");
        }else{
            include('./component/table.php');     
        }        
    ?>
    </table>

</body>
</html>