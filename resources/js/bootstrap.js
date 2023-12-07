/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from '@ably/laravel-echo';
//
// window.Ably = require('ably');
//
// // Create new echo client instance using ably-js client driver.
// window.Echo = new Echo({
//     broadcaster: 'ably',
// });
//
//
// // Register a callback for listing to connection state change
// window.Echo.connector.ably.connection.on((stateChange) => {
//     console.log("LOGGER:: Connection event :: ", stateChange);
//     if (stateChange.current === 'disconnected' && stateChange.reason?.code === 40142) { // key/token status expired
//         console.log("LOGGER:: Connection token expired https://help.ably.io/error/40142");
//     }
// });
// window.Echo.private('food')
//     // .subscribed(function(){
//     //     console.log('subscribed To Channel')
//     // })
//     // .listenToAll(function(){
//     //     console.log('listening to channel')
//     // })
//     .listen('FilterFoodEvent', (data) => {
//         console.log(data);
//         updateFilters(event.food);
//     });
// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
