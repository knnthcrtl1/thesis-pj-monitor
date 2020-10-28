const staticDevProjectMonitoring = "dev-project-monitorong-site-v1"
const assets = [
  "/",
  "/index.php",
  "/assets/css/style.css",
  "/assets/js/app.js",
]

self.addEventListener("install", installEvent => {
  installEvent.waitUntil(
    caches.open(staticDevProjectMonitoring).then(cache => {
      cache.addAll(assets)
    })
  )
})

self.addEventListener('fetch', function(e) {  
    e.respondWith(      caches.match(e.request).then(function(response) {  
    return response || fetch(e.request);
    })   
    );  
});

