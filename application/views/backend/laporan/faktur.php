<?php
foreach($all as $al):
$kd = $al->kode_pemesanan;
$p = $this->db->query("SELECT * FROM pelanggan
JOIN pemesanan ON pemesanan.id_pelanggan=pelanggan.id_pelanggan
JOIN provinsi ON provinsi.id_provinsi=pelanggan.id_provinsi
WHERE kode_pemesanan='$kd' GROUP BY kode_pemesanan")->row_array();
$pr = $this->db->query("SELECT * FROM produk JOIN pemesanan ON pemesanan.id_produk=produk.id_produk WHERE kode_pemesanan='$kd'")->result();
$to = $this->db->query("SELECT SUM(total) as totally FROM pemesanan WHERE kode_pemesanan='$kd'")->result();
?>
<html>

<head>
    <title><?php echo $title; ?></title>
    <style>
    #tabel {
        font-size: 15px;
        border-collapse: collapse;
    }

    #tabel td {
        padding-left: 5px;
        border: 1px solid black;
    }
    </style>
</head>

<body style='font-family:tahoma; font-size:18pt;' width="100%" onload="print()">
    <center>
        <table style='width:100%; font-size:11pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:15pt'><b><img src="<?php echo base_url(); ?>komponen/images/arwanalogo2.png" width="30%" /></b></span></br>
                Jl. Mungguk Batu, Selimbau, Kalimantan Barat, Indonesia 78765
                <br />
                iinfebryanda23@gmail.com
                <br />
                +62857-5135-1752
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:15pt'>FAKTUR PENJUALAN</span></b></br>
                No Trans. : <?php echo $al->kode_pemesanan; ?></br>
                Tanggal :<?php echo format_indo($al->tanggal_pemesanan); ?></br>
            </td>
        </table>
        <hr />
        <table style='width:100%; font-size:12pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                Nama Pelanggan : <?php echo $p['nama_lengkap']; ?></br>
                Alamat : <?php echo $p['alamat']; ?>, <?php echo $p['nama_provinsi']; ?>
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                No Telp : <?php echo $p['no_hp']; ?>
            </td>
        </table>
		<br/>
        <table cellspacing='0' style='width:100%; font-size:11pt; font-family:calibri;  border-collapse: collapse;'
            border='1'>

            <tr align="center">
                <td width='70%'><b>Nama Produk</b></td>
                <td width='13%'><b>Harga</b></td>
                <td width='4%'><b>Qty</b></td>
                <td width='33%'><b>Total Harga</b></td>
                <?php foreach($pr as $prod):
				$total = $prod->harga * $prod->qty; 
				?>
            <tr>
                <td><?php echo $prod->nama_produk; ?></td>
                <td style='text-align:center'><?php echo rupiah($prod->harga); ?></td>
                <td style='text-align:center'><?php echo $prod->qty; ?></td>
                <td style='text-align:right'><?php echo rupiah($total); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php foreach($to as $tota): ?>
            <tr>
                <td colspan='3'>
                    <div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div>
                </td>
                <td style='text-align:right'><?php echo rupiah($tota->totally); ?></td>
            </tr>
            <tr>
                <td colspan='4'>
                    <div style='text-align:right'>Terbilang : <b><?php echo penyebut($tota->totally); ?> Rupiah</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:right'>Cash : </div>
                </td>
                <td style='text-align:right'><?php echo rupiah($tota->totally); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br />
        <br />
        <table style='width:100%; font-size:11pt;' cellspacing='2'>
            <tr>
                <td align='center'>Diterima Oleh,</br></br><u>(<b>Sdr. <?php echo $p['nama_lengkap']; ?></b>)</u></td>
                <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
                <td align='center'>TTD,</br></br><u>(...........)</u></td>
            </tr>
        </table>
        <br />
        <br />
    </center>
    <i
        class="fa fa-scissors"></i>------------------------------------------------------------------------------------------------------
    <script src="https://use.fontawesome.com/bb21722b54.js"></script>
</body>

</html>
<?php endforeach; ?>