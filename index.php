<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>appsBee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center w-96">
        <h1 class="text-2xl font-bold text-gray-800">Selamat Datang</h1>
        <p class="text-gray-600 mt-2">Aplikasi ini mendukung offline mode</p>
        <button id="reloadButton" class="hidden mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg shadow">
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
                    newWorker.onstatechange = () => {
                        if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                            console.log('Versi baru tersedia!');
                            document.getElementById('reloadButton').classList.remove('hidden');
                        }
                    };
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
