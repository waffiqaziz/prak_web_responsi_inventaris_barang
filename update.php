<?php  
  session_start();
  require 'functions.php';

  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }
  
  $id = $_POST["id"];
  $dt = read("SELECT * FROM inventaris WHERE kode_barang = '$id'")[0];
  
  //cek tombol sumbit sudah ditekan atau belum
	if (isset($_POST["submit"]) ) {
		// POP UP INPUT SUCCESS
		if (update($_POST) < 0) {
			echo "
						<script>
							alert('Edit Gagal!!!');
						</script>
					 ";
		} else {
			echo "
						<script>
							document.location.href = 'daftar_inventaris.php';
							alert('Edit Berhasil!!!');
						</script>
					 ";
		}

		//untuk menampilkan pesan error jika ada yang salah
		echo mysqli_error($db);
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>INVENTARIS BARANG</title>  
  <!-- STYLE -->
  <link href="vendor/style.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Page Content -->
  <form class="form-horizontal" action="" method="post" role="form">

      <!-- UNTUK MENYIMPAN kode_barang lama -->
        <input type="hidden" name="old_kode" value="<?= $dt -> kode_barang; ?>">

      <div class="row">
        <div class="blok col-sm-6 offset-3">
          <div class="form-group form-group-sm col-sm-12">
            <h4 style="background-color: blue; color: white; " class="text-center">Update Data Inventaris</h4><br>
              <div class="row">
                  <label for="kode_barang" class="col-sm-3 col-form-label">Kode Barang</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="kode_barang" name="kode_barang" pattern=".{1-10}" value="<?= $dt -> kode_barang; ?>" title="max 10 characters" required>
                  </div>
              </div>
          </div>
          <div class="form-group form-group-sm col-sm-12">
            <div class="row">
              <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" pattern=".{1-30}" title="max 30 characters" value="<?= $dt -> nama_barang; ?>" required>
              </div>
            </div>
          </div>
          <div class="form-group form-group-sm col-sm-12">
            <div class="row">
              <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
              <div class="col-sm-3">
                  <input type="number" class="form-control" id="jumlah" name="jumlah" pattern=".{1-11}" title="max 11 characters" value="<?= $dt -> jumlah; ?>" required>
              </div>
            </div>
          </div>
          <div class="form-group form-group-sm col-sm-12">
            <div class="row">
              <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control" id="satuan" name="satuan" pattern=".{1-15}" title="max 15 characters" value="<?= $dt -> satuan; ?>" required>
              </div>
            </div>
          </div>
          <div class="form-group form-group-sm col-sm-12">
            <div class="row">
              <label for="tgl_datang" class="col-sm-3 col-form-label">Tanggal Datang</label>
              <div class="col-sm-9">
                  <input type="date" class="form-control" id="tgl_datang" name="tgl_datang" value="<?= $dt -> tgl_datang; ?>" required>
              </div>
            </div>
          </div>
          <div class="form-group form-group-sm col-sm-12">
            <div class="row">
              <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
              <div class="col-sm-6">
                <select name="kategori" id="kategori" class="form-control">
                  <option value="" disabled selected>Pilih Kategori</option> 
                  <option value="Bangunan"
                    <?php if ($dt -> kategori == "Bangunan"):?> 
                      <?= 'selected = "selected"'; ?>
                    <?php  endif ?>
                  >         
                    Bangunan            
                  </option>
                  <option value="Kendaraan"
                    <?php if ($dt -> kategori == "Kendaraan"):?> 
                      <?= 'selected = "selected"'; ?>
                    <?php  endif ?>
                  >        
                    Kendaraan           
                  </option>
                  <option value="Alat Tulis Kantor"
                    <?php if ($dt -> kategori == "Alat Tulis Kantor"):?> 
                      <?= 'selected = "selected"'; ?>
                    <?php  endif ?>
                  >
                    Alat Tulis Kantor   
                  </option>
                  <option value="Elektronik"
                    <?php if ($dt -> kategori == "Elektronik"):?> 
                      <?= 'selected = "selected"'; ?>
                    <?php  endif ?>
                  >       
                    Elektronik          
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group form-group-sm col-sm-12">
            <div class="row">
              <label for="tgl_datang" class="col-sm-3 col-form-label">Status</label>
              <div class="col-sm-9">
                <input type="radio" name="status_barang" value="Baik" id="baik"
                <?php if (strpos($dt -> status_barang, "Baik") !== false):?>
                  <?php echo'checked'; ?>
                <?php endif;?>
                > 
                <label for="baik">Baik &nbsp</label>
                <input type="radio" name="status_barang" value="Perawatan" id="perawatan"
                  <?php if (strpos($dt -> status_barang, "Perawatan") !== false):?>
                    <?php echo'checked'; ?>
                  <?php endif;?>
                > 
                <label for="perawatan">Perawatan &nbsp</label>
                <input type="radio" name="status_barang" value="Rusak" id="rusak"
                  <?php if (strpos($dt -> status_barang, "Rusak") !== false):?>
                    <?php echo'checked'; ?>
                  <?php endif;?>
                > 
                <label for="rusak">Rusak &nbsp</label>
              </div>
            </div>
          </div>
          <div class="form-group form-group-sm col-sm-12">
            <div class="row">
              <label for="harga" class="col-sm-3 col-form-label">Harga Satuan</label>
              <div class="col-sm-9">
                  <input type="number" type="number" class="form-control" id="harga" name="harga" pattern=".{1-20}" title="max 20 characters" required value="<?= $dt -> harga; ?>">
              </div>
            </div>
          </div>
          <div class="col-sm-12 text-center">
						<button type="submit" class="btn-work" name="submit" value="submit" style="width: 100px; margin : 2px ;color: white; font-weight: bold;">Simpan</button>
            <button type="button" class="btn-work" name="cancel" id="cancel" onclick="location.href='daftar_inventaris.php'" style="width: 100px; margin : 2px ;color: white; font-weight: bold;">Batal</button>
					</div>
        </div>
      </div>
    </div>
  </form>

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="vendor/jquery/jquery-3.5.1.min.js"></script>
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
