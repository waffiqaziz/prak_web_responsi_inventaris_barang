<?php 
	//menghubungkan ke mysql
	$db = mysqli_connect("localhost","root","","responsi");

	function read($query){
		global $db;
		$result = mysqli_query($db, $query);

		$rows = [];
		//ambil data dari tabel/query film
		while($row = mysqli_fetch_object($result)){
			$rows[] = $row;
		}

		return $rows;
	}


	function input($data){
		global $db;

		//simpan data pada var
			$kode_barang		= $data["kode_barang"];	

			// cek apakah kode_barang sudah ada di database/belum
			$result = mysqli_query($db, "SELECT kode_barang FROM inventaris WHERE kode_barang = '$kode_barang'");		
			if(mysqli_num_rows($result) === 1){ // cek kode barang
				echo "<script>
								alert('Kode Barang Sudah Ada!')
							</script>";
				return -1;
			}

			$nama_barang 		= $data["nama_barang"];	
			$jumlah					= $data["jumlah"];	
			$satuan 				= $data["satuan"];
			$tgl_datang 		= $data["tgl_datang"];
			$kategori 			= $data["kategori"];	
			$status_barang 	= $data["status_barang"];
			$harga 	      	= $data["harga"];

		//insert value
			$query_sql = "INSERT INTO inventaris VALUES(
										'$kode_barang',
										'$nama_barang',
										'$jumlah',
										'$satuan',
										'$tgl_datang',
										'$kategori',
										'$status_barang',
										'$harga'
							 		)";
			mysqli_query($db, $query_sql);
			return	var_dump(mysqli_affected_rows($db));
	}

	function hapus($id){
		global $db;
		mysqli_query($db,"DELETE FROM inventaris WHERE kode_barang = '$id'");
		
		return mysqli_affected_rows($db);
	}

	function update($data){
		global $db;

		$kode_barang		= $data["kode_barang"];	
		$old_kode 			= $data["old_kode"];	
		$nama_barang 		= $data["nama_barang"];	
		$jumlah					= $data["jumlah"];	
		$satuan 				= $data["satuan"];
		$tgl_datang 		= $data["tgl_datang"];
		$kategori 			= $data["kategori"];	
		$status_barang 	= $data["status_barang"];
		$harga 	      	= $data["harga"];

	//insert value
		$query_sql = "UPDATE inventaris SET
									kode_barang 				= '$kode_barang',
									nama_barang 				='$nama_barang',
									jumlah 							= '$jumlah',
									satuan 							= '$satuan',
									tgl_datang 					= '$tgl_datang',
									kategori 						= '$kategori',
									status_barang 			= '$status_barang',
									harga 							= '$harga'
									WHERE kode_barang 	= '$old_kode'
								 ";
		mysqli_query($db, $query_sql);
		return	var_dump(mysqli_affected_rows($db));
	}

?>