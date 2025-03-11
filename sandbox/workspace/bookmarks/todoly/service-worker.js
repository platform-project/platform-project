const CACHE_NAME = "todoly-cache-v1";
const FILES_TO_CACHE = [
    "/",
    "/index.html",
    "/assets/css/styles.css",
    "/assets/js/script.js",
    "/assets/sounds/beep.mp3",
    "/assets/images/13882329_xl.jpg",
    "/assets/images/15702210_xl.jpg",
    "/assets/images/20708828_xl.jpg",
    "/assets/images/24562916_xl.jpg",
    "/assets/images/32472819_xl.jpg",
    "/assets/images/35514164_xl.jpg",
    "/assets/images/38044388_xl.jpg",
    "/assets/images/38410531_xl.jpg",
    "/assets/images/39460720_xl.jpg",
    "/assets/images/40110057_xl.jpg",
    "/assets/images/40583353_xl.jpg",
    "/assets/images/40979868_xl.jpg",
    "/assets/images/41176656_xl.jpg",
    "/assets/images/41319845_xl.jpg",
    "/assets/images/45066053_xl.jpg",
    "/assets/images/47188652_xl.jpg",
    "/assets/images/47936012_xl.jpg",
    "/assets/images/48545960_xl.jpg",
    "/assets/images/48672457_xl.jpg",
    "/assets/images/53402047_xl.jpg",
];

// Install Service Worker and Cache Files
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            console.log("Caching files...");
            return cache.addAll(FILES_TO_CACHE);
        })
    );
});

// Fetch and Serve Cached Files When Offline
self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            return response || fetch(event.request);
        })
    );
});
