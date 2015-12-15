<div class="container">
    <div class="page-header ">
        <h4>LIST PEMESANAN PEMANDU</h4>
    </div>
    <?php
    $link = $this->uri->segment('4');
    if ($link == "dihapus") {
        echo "<div class='alert alert-success'>Produk berhasil di hapus !</div>";
    } else if ($link == "oke") {
        echo "<div class='alert alert-success'>Produk berhasil di tambah !</div>";
    } else if ($link == "diupdate") {
        echo "<div class='alert alert-success'>Produk berhasil di update !</div>";
    }
    ?>


    <div class="table-header">
        Data Pemesanan
    </div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Nama Wisatawan</th>
                <th>No Telepon</th>								
                <th>Tanggal Berangkat</th>
                <th>Destinasi</th>
                <th>Lama Guide</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($pemesanan as $pp) {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <?php
                        echo $pp->namaWisatawan
                        ?>
                    </td>
                    <td><?php echo $pp->noTelponWisatawan ?></td>
                    <td><?php echo $pp->tanggalBerangkat ?></td>
                    <td><?php echo $pp->destinasi ?></td>
                    <td><?php echo $pp->lamaBooking ?></td>
                    <td><?php echo $pp->harga ?></td>
                </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
</div>
