importScripts("/config.php"); // Mengambil versi cache dari PHP

const ASSETS_TO_CACHE = ["/", "/appsBee.png", "/fallback.php"];

self.addEventListener("install", (event) => {
  console.log("Service Worker: Installing...");
  event.waitUntil(
    caches.open(CACHE_VERSION).then((cache) => {
      console.log("Service Worker: Caching new assets...");
      return cache.addAll(ASSETS_TO_CACHE);
    })
  );
  self.skipWaiting();
});

self.addEventListener("activate", (event) => {
  console.log("Service Worker: Activated!");

  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cache) => {
          if (cache !== CACHE_VERSION) {
            console.log("Deleting old cache:", cache);
            return caches.delete(cache);
          }
        })
      );
    })
  );

  self.clients.claim();
});

self.addEventListener("fetch", (event) => {
  if (event.request.url.includes("index.php")) {
    console.log("Fetching dynamic page: ", event.request.url);
    event.respondWith(
      fetch(event.request)
        .then((response) => response)
        .catch(() => caches.match("/fallback.html"))
    );
    return;
  }

  event.respondWith(
    caches.match(event.request).then((response) => {
      return (
        response ||
        fetch(event.request).then((fetchResponse) => {
          return caches.open(CACHE_VERSION).then((cache) => {
            cache.put(event.request, fetchResponse.clone());
            return fetchResponse;
          });
        })
      );
    })
  );
});

self.addEventListener("message", (event) => {
  if (event.data.action === "skipWaiting") {
    console.log("Skipping waiting, activating new Service Worker...");
    self.skipWaiting();
  }
});
