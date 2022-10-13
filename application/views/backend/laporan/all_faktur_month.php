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
                Dalam Rentang Waktu : <b>1 Bulan (Bulan <?php echo $month; ?> - <?php echo date('Y'); ?>)</b></br>
            </td>
        </table>
        <hr />
		<br/>
        <table cellspacing='0' style='width:100%; font-size:11pt; font-family:calibri;  border-collapse: collapse;'
            border='1'>

            <tr align="center">
                <td width='80%'><b>Nama Produk</b></td>
                <td width='13%'><b>Qty</b></td>
                <td width='33%'><b>Subtotal</b></td>
                <?php
				$keseluruhan = 0;
				foreach($afaktur as $prod):
				?>
            <tr>
                <td><?php echo $prod->nama_produk; ?></td>
                <td style='text-align:center'><?php echo $prod->quty; ?></td>
                <td style='text-align:right'><?php echo rupiah($prod->toutal); ?></td>
				<?php
				$totala = $prod->toutal;
				$keseluruhan += $totala;
				?>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan='2'>
                    <div style='text-align:right'>Total Pendapatan : </div>
                </td>
                <td style='text-align:right'><b><?php echo rupiah($keseluruhan); ?></b></td>
            </tr>
            <tr>
                <td colspan='3'>
                    <div style='text-align:right'>Terbilang : <b><?php echo penyebut($keseluruhan); ?> Rupiah</b>
                    </div>
                </td>
            </tr>
        </table>
        <br />
        <br />
		<hr/>
        <br />
        <br />
		<center><h3>GRAFIK PENJUALAN</h3></center>
		<br/>
		<br/>
		<?php
					$nama_produk= "";
					$jumlah=null;
		foreach ($afaktur as $item)
					{
						$prodd = $item->nama_produk;
						$nama_produk .= "'$prodd'". ", ";
						$jum=$item->quty;
						$jumlah .= "$jum". ", ";
					}
		?>
		<canvas id="myChart"></canvas>
		<br />
        <br />
        <br />
        <br />
        <table style='width:100%; font-size:11pt;' cellspacing='2'>
            <tr>
                <td align='center'>Diterima Oleh,</br></br><u>(<b>Sdr. Iin Febryanda</b>)</u></td>
                <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
                <td align='center'>TTD,</br></br><u>(...........)</u></td>
            </tr>
        </table>
        <br />
    </center>
    <center><i
        class="fa fa-scissors"></i>--------------------------------------------------------</center>
    <br />
    <script src="https://use.fontawesome.com/bb21722b54.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
		var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
					// The type of chart we want to create
					type: 'pie',
					// The data for our dataset
					data: {
						labels: [<?php echo $nama_produk; ?>],
						datasets: [{
							label:'Data Penjualan Arwana',
							backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
							borderColor: ['rgb(255, 99, 132)'],
							data: [<?php echo $jumlah; ?>]
						}]
					},
					// Configuration options go here
					
				});
	</script>
</body>

</html>