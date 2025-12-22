   <thead>
    <td>
        <tr>Id_Barang</tr>
        <tr>Kategori</tr>
        <tr>Harga Beli</tr>
        <tr>Harga Jual</tr>
        <tr>Stok</tr>
    </td>

</thead>
    <tbody>
        <?php
            $data = $cluster->getallData("data_barang");
            while($item = $data->fetch_assoc()){
                echo "
                <tr>   
                    <td>{$item['id_barang']}</td> 
                    <td>{$item['nama']}</td>
                    <td>{$item['kategori']}</td>
                    <td>{$item['harga_beli']}</td>
                    <td>{$item['harga_jual']}</td>
                    <td>{$item['stok']}</td>
                </tr>
                    ";
            }
        ?>
    </tbody>
 