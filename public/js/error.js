"use strict"
let seconds = 5;

function updateCountdown() {
    document.getElementById('countdown').innerText = "Pero tranquilo, en " + seconds + " segundos volverás al inicio";

    if (seconds === 0) {
        window.location.href = '../../public/index.php';
    } else {
        seconds--;
        setTimeout(updateCountdown, 1000);
    }
}

updateCountdown();