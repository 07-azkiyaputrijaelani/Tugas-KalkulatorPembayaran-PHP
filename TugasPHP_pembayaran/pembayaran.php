<h2>Total pembayaran</h2>
<form action="" method="POST">
    <label for="namBar">Nama barang:</label>
    <input type="text" name="input_namBar" required> <br>
    <label>Harga satuan:</label>
    <input type="number" name="input_harga" required min="0" value="<?= isset($_POST['input_harga']) ? htmlspecialchars($_POST['input_harga']) :''?> "<br> <br>
    <label>Jumlah pembelian:</label>
    <input type="number" name="input_jumlah" required min="1" value="<?= isset($_POST['input_jumlah']) ? htmlspecialchars($_POST['input_jumlah']) : '1'?>"> <br><br>
    <button type="submit" name="tombol_total">Total</button>
</form>

<?php
    if (isset($_POST['tombol_total'])) {
        $nama = htmlspecialchars($_POST['input_namBar']);
        $harga = (float)($_POST['input_harga']);
        $jumlah = (int)($_POST['input_jumlah']);

        if ($harga < 0) {
            echo "<p style='color=red;'><b>Error:</b> Harga Barang Tidak Boleh Bernilai Negatif!</p>";
        } elseif ($jumlah < 1) {
            echo "<p style='color=red;'><b>Error:</b> Jumlah Barang Minimal 1 Barang!</p>";
        } else {
            $totalpertama = $harga * $jumlah;

            $diskon = 0;
            $nominalpotongan = 0;

            if ($totalpertama >= 500000) {
                $diskon = 20;
            } elseif ($totalpertama >= 250000) {
                $diskon = 10;
            } else {
                $diskon = 0;
            };

            $nominalpotongan = ($diskon / 100) * $totalpertama;
            $totalakhir = $totalpertama - $nominalpotongan;

            echo "<h3>Struk Pembayaran</h3>";
            echo "Nama Barang: ". $nama . "<br>";
            echo "Harga Barang: Rp ". number_format($harga, 0, ',', '.'). "<br>";
            echo "Jumlah Barang: ". $jumlah . "pcs<br>";
            echo "Total Awal: ". number_format($totalpertama, 0, ',', '.'). "<br>";
            echo "Diskon: ". $diskon . "% (-Rp " . number_format($nominalpotongan, 0, ',', '.'). ")<br>";
            echo "<strong>Total Akhir yang Harus Dibayar: Rp". number_format($totalakhir, 0, ',', '.')."</strong>";
        }

        
    };

    
?>