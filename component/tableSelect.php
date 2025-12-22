   <thead>
        <?php 
        $items = ['Id_barang','Kategori','gambar','harga_beli','harga_jual','stok'];
        foreach($items as $item){
            echo "
                <tr>$item</tr>
            ";
        }
    ?>
    </thead>
    <tbody>
        <?php
            $data = $cluster->getDataSelection("data_barang","nama",$nama);
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
 