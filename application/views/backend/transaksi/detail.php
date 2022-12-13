<!DOCTYPE html>
<html><head>
<title>Detail transaksi</title>
<style>
    td{
        font-size :14px;
        font-family: sans-serif;
    }

    h3{
        font-size: 18px;
    }

    hr{
        border: 0px;
        border-top :2px solid black;
    }

    .tabel{
        border : 1px solid black;
        border-collapse: collapse;
    }

    th{
        font-family: sans-serif;
        font-size: 12px;
    }
</style>
</head><body>

<table>
    <tr>
        <td width="400"><h3>Laundry Online</h3></td>
        <td><h3>Invoice</h3></td>
    </tr>
    <tr>
        <td>Alamat : xxxxx</td>
    </tr>
    <tr>
        <td>Telp. : xxxxx</td>
    </tr>
    <tr>
        <td>Email. : @gmail.com</td>
    </tr>
</table>

<hr><br>

<table>
    <tr>
        <td width="80">Konsumen</td>
        <td width="250"><?= $transaksi['nama_konsumen']?></td>

        <td width="80">Kode Transaksi</td>
        <td><?= $transaksi['kode_transaksi']?></td>
    </tr>

    <tr>
        <td width="80"></td>
        <td width="250"><?= $transaksi['alamat_konsumen']?></td>

        <td width="80">Tanggal Masuk</td>
        <td><?= $transaksi['tgl_masuk']?></td>
    </tr>
    <tr>
        <td width="80"></td>
        <td width="250"><?= $transaksi['no_telp']?></td>

        <?php
            if ($transaksi['tgl_ambil'] !=0) {?>
            <td width="80">Tanggal ambil</td>
            <td><?= $transaksi['tgl_ambil']?></td>
            <?php } else {?>
                <td width="80">Tanggal ambil</td>
                <td style="color: red;">-</td>
            <?php }
        ?>
        
    </tr>
</table><br><br>

<table width="500" class="tabel">
    <tr>
        <th class="tabel">Paket Laundry</th>
        <th class="tabel">Berat / KG</th>
        <th class="tabel">Harga</th>
        <th class="tabel">Sub Total</th>
    </tr>

    <tr>
        <td class="tabel"><?= $transaksi['nama_paket']?></td>
        <td class="tabel"><?= $transaksi['berat']?></td>
        <td class="tabel"><?= "Rp.".number_format($transaksi['harga_paket'],0,'.','.')?></td>
        <td class="tabel"><?= "Rp.".number_format($transaksi['grand_total'],0,'.','.')?></td>
    </tr>

    <tr>
        <td class="tabel" colspan="3" style="text-align: right; font-weight: bold;">Grand Total</td>
        <td class="tabel" style="font-weight: bold; font-size: 14px;"><?= "Rp.".number_format( $transaksi['grand_total'],0,'.','.')?></td>
    </tr>
</table>


</html></body>