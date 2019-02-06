// iniciando servicios
// alert(2)
 service_worked = ((d,w,n,c,base_url)=>{
    // alert(3)
    // evitando que registre el service worked
    // return false;
    // const applicationServerPublicKey = 'BLabQUs9H3WI9BkuPSj9P3ncA_H4i1kBSuRCIQdpKQTUr50WqqReozX3hIO_Nj0k16hwh7RRAxQgE03g8pfI3uk';
    // https://web-push-codelab.glitch.me/
    if ('serviceWorker' in navigator && 'PushManager' in window) {
        console.log('Service Worker and Push is supported');

        navigator.serviceWorker.register(base_url+'source/_apps/voicesurvey/js/sw.js')
        .then(function(swReg) {
            console.log('Service Worker is registered', swReg);

            // let swRegistration = swReg;
            // initialiseUI();
        })
        .catch(function(error) {
            console.error('Service Worker Error', error);
        });
    } else {
        console.warn('Push messaging is not supported');
        // pushButton.textContent = 'Push Not Supported';
    }

    function initialiseUI() {
        // Set the initial subscription value
        if (swRegistration)
        navigator.serviceWorker.ready
        .then(serviceWorkerRegistration => swRegistration.pushManager.getSubscription())
        .then(function(subscription) {
            isSubscribed = !(subscription === null);
            if (isSubscribed) {
                console.log('User IS subscribed.');
                // console.log(JSON.stringify(subscription));
            } else {
                console.log('User is NOT subscribed.');
                subscribeUser();
            }
        });
    }

    function subscribeUser() {
        console.warn('>>>> '+applicationServerPublicKey);
        const applicationServerKey = urlB64ToUint8Array(applicationServerPublicKey);
        // console.warn('>>>> '+applicationServerKey);
        // console.log(swRegistration);
        swRegistration.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: applicationServerKey
        })
        .then(function(subscription) {
            console.log('User is subscribed +');
            const key = subscription.getKey('p256dh');
            const token = subscription.getKey('auth');
            const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0];

            var s_ = JSON.stringify({
                endpoint: subscription.endpoint,
                publicKey: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('p256dh')))) : null,
                authToken: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('auth')))) : null,
                contentEncoding,
            });
            console.warn(JSON.stringify(subscription));
            script_server('_server_usuario.php',{opcion:'subscripcion_notificacion',suscripcion_notificacion:s_},
                (a)=>{
                    console.log(a);
                }
            )
            isSubscribed = true;
        })
        .catch(function(err) {
            console.log('Failed to subscribe the user: ', err);
        });
    }

    function urlB64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4);
        const base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);

        for (let i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }
        return outputArray;
    }


    if (w.Notification && Notification.permission !=="denied"){
        Notification.requestPermission(function(result) {
            if (result === 'granted') {
                c('Notificaciones permitidas');
            }else{
                c('Notificaciones Denegadas');
            }
        });

    }
});
