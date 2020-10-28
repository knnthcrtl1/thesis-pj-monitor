// if ("serviceWorker" in navigator) {
//     window.addEventListener("load", function() {
//       navigator.serviceWorker
//         .register("../../serviceWorker")
//         .then(res => console.log("service worker registered"))
//         .catch(err => console.log("service worker not registered", err))
//     })
// }

window.onload = () => {  
    'use strict';     
    if ('serviceWorker' in navigator) {     
    navigator.serviceWorker  
    .register('../../serviceWorker'); 
    } 
}