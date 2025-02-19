<?php
header("Content-Type: application/javascript"); // Pastikan ini mengembalikan JavaScript
$versi = 5; // Naikkan versi setiap update agar cache lama terhapus
echo "const CACHE_VERSION = 'cache-v$versi';";
?>