<?php
require 'functions.php';

$nama = $_GET["nama"];

if( hapus($nama) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'index.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'index.php';
		</script>
	";
}

?>