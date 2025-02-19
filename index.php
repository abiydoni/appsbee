<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//     header('Location: ../login.php'); // Redirect to login page
//     exit;
// }
// if ($_SESSION['user']['role'] !== 'admin') {
//     header('Location: ../login.php'); // Redirect to unauthorized page
//     exit;
// }

// Include the database connection
include 'api/db.php';

// Ambil nama dari tb_profil (sesuaikan query jika perlu)
$stmt = $pdo->prepare("SELECT nama FROM tb_profil LIMIT 1"); 
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$nama = $row ? htmlspecialchars($row['nama']) : "appsBee";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nama; ?> | Platform Manajemen Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center w-96">
        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang</h1>
        <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
            <img src="img/<?php echo $row['logo']; ?>" alt="Logo appsBee" class="w-24 h-24 mb-4">
            <a href="#" class="text-blue-600 font-semibold text-lg"><?php echo $nama; ?></a>
        </div>
        <p class="text-gray-600 mt-2">Aplikasi ini mendukung offline mode</p>
        <button id="reloadButton" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hidden">
            Perbarui Sekarang
        </button>
    </div>

    <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js')
            .then((registration) => {
                console.log('Service Worker terdaftar dengan scope:', registration.scope);

                registration.onupdatefound = () => {
                    const newWorker = registration.installing;
                    if (newWorker) {
                        newWorker.onstatechange = () => {
                            if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                console.log('Versi baru tersedia!');
                                document.getElementById('reloadButton').classList.remove('hidden');
                            }
                        };
                    }
                };
            })
            .catch((error) => console.error('Gagal mendaftarkan Service Worker:', error));

        // Reload saat SW baru aktif
        navigator.serviceWorker.addEventListener('controllerchange', () => {
            console.log('Service Worker baru aktif, reload halaman...');
            window.location.reload();
        });

        // Tombol untuk manual reload
        document.getElementById('reloadButton').addEventListener('click', () => {
            navigator.serviceWorker.getRegistration().then((registration) => {
                if (registration && registration.waiting) {
                    registration.waiting.postMessage({ action: 'skipWaiting' });
                }
            });
        });
    }
    </script>
</body>
</html>
