const CACHE_NAME = 'pwa-voicesurvey';
urls = [
    '/voicesurvey/restaurant',
    ]

self.addEventListener('install',e => {
    console.log('SW Instalado');
    e.waitUntil(
        caches.open(CACHE_NAME)
        .then(cache => {
            console.log('Registrando Cache');
            return cache.addAll(urls);
        })
        .catch(err =>console.log('Fallo Cache > ',err))
    )
});

self.addEventListener('activate',e=>{
    console.log('SW activo');
    const cacheList = [CACHE_NAME];
    e.waitUntil(
        caches.keys()
        .then(cachesNames => {
            // depuracion del cache
            return Promise.all(
                cachesNames.map(cacheName => {
                    if (cacheList.indexOf(cacheName) === -1){
                        return caches.delete(cacheName);
                    }
                })
            )
        })
        .then(()=>{
            console.log('Cache actualizado');
            return self.clients.claim();
        })
    )
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
        .then(function(response) {
            // Cache hit - return response
            if (response) {
                return response;
            }

            // IMPORTANT: Clone the request. A request is a stream and
            // can only be consumed once. Since we are consuming this
            // once by cache and once by the browser for fetch, we need
            // to clone the response.
            var fetchRequest = event.request.clone();

            return fetch(fetchRequest).then(
                function(response) {
                    // Check if we received a valid response
                    if(!response || response.status !== 200 || response.type !== 'basic') {
                        return response;
                    }

                    // IMPORTANT: Clone the response. A response is a stream
                    // and because we want the browser to consume the response
                    // as well as the cache consuming the response, we need
                    // to clone it so we have two streams.
                    var responseToCache = response.clone();

                    caches.open(CACHE_NAME)
                    .then(function(cache) {
                        if (event.request.method !=="POST"){
                            cache.put(event.request, responseToCache);
                        }else{
                            return true;
                        }
                    });

                    return response;
                }
            );
        })
    );
});


// self.addEventListener('push', function(event) {
//     console.log('[Service Worker] Push Received.');
//     console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);
//
//     var data = JSON.parse(event.data.text());
//
//     const title = data.title;
//     const options = {
//         body: data.message_1+'\n'+data.message_2,
//         badge: './src/icons/badge.png',
//         icon: './src/icons/icon-128x128.png',
//         vibrate: [300, 100,300],
//         data:{info:data.data},
//         tag: data.tag,
//         actions: [
//             {
//                 action: 'Ver',
//                 title: 'Ver',
//             },
//             {
//                 action: 'Cerrar',
//                 title: 'Cerrar',
//             },
//         ]
//     };
//     event.waitUntil(self.registration.showNotification(title, options));
// });

// self.addEventListener('notificationclose',function(event){
//     var notification = event.notification;
//     var primary = notification.data.primaryKey;
//     console.log('Closed notification '+primary);
// });

//
// self.addEventListener('notificationclick', event => {
//     const rootUrl = new URL('/', location).href;
//     var data = event.notification.data;
//     console.warn(data);
//     var action = event.action;
//     switch (action) {
//         case 'Ver':
//             clients.openWindow('https://www.edusiva.com/edusiva.html');
//             break;
//         case 'Cerrar':
//             notification.close();
//             break;
//         default:
//             event.notification.close();
//             // Enumerate windows, and call window.focus(), or open a new one.
//             event.waitUntil(
//                 clients.matchAll().then(matchedClients => {
//                     for (let client of matchedClients) {
//                         if (client.url === rootUrl) {
//                             return client.focus();
//                         }
//                     }
//                     clients.openWindow("edusiva.html?"+JSON.stringify(data.info));
//                     return false;
//                 })
//             );
//             break;
//     }
// });
