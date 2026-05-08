<?php

require_once '../config/Database.php';
require_once '../classes/Produk.php';

$db = new Database();
$conn = $db->getConnection();
$produk = new Produk($conn);
$data = $produk->tampilProduk();
?>

<h2>Dashboard</h2>

<a href="tambah_produk.php">
Tambah Produk
</a>

|
<a href="transaksi.php">
Transaksi
</a>
<br><br>
<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nama Produk</th>
    <th>Jenis</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Status</th>
</tr>

<?php while($row = $data->fetch_assoc()) : ?>
<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['nama_produk']; ?></td>
<td><?= $row['jenis_produk']; ?></td>
<td><?= $row['harga']; ?></td>
<td><?= $row['stok']; ?></td>
<td>

<?php

if($row['stok'] < 5){

    echo "
    <b style='color:red'>
    Stok Menipis
    </b>";
}else{

    echo "Stok Aman";
}
?>
</td>
</tr>
<?php endwhile; ?>
</table>

