const panelLeft = document.querySelector('.panelLeft');
const panelRight = document.querySelector('.panelRight');
var song = document.getElementById('hudba');
var hlasitost = document.getElementById('hlasitost');
var pauzaButton = document.getElementById('pause/contiue');
var icon = document.getElementById('icon');

document.addEventListener('mousemove', (e) => {
    if (e.clientX <= 200) {
        panelLeft.style.left = '0px';
    } else {
        panelLeft.style.left = '-300px';
    }

})

document.addEventListener('mousemove', (e) => {
    if (e.clientX >= 1500) {
        panelRight.style.right= '0px';
    } else
        panelRight.style.right = '-300px';
})

function play() {
    song.play();
}

window.addEventListener('load', play);

document.addEventListener('DOMContentLoaded', function () {
    hlasitost.value = 0.30;
    song.volume = hlasitost.value;

    hlasitost.addEventListener('input', function () {
        song.volume = hlasitost.value;
    });
});

song.addEventListener('ended', function () {
    song.currentTime = 0;
    song.play();
});

document.addEventListener('DOMContentLoaded', function () {
    pauzaButton.addEventListener('click', function () {
        var teraz = icon.classList.value;

        if (teraz.includes('fa-pause')) {
            icon.classList.remove('fa-pause');
            icon.classList.add('fa-play');
            song.pause();
        } else {
            icon.classList.remove('fa-play');
            icon.classList.add('fa-pause');
            song.play();

        }
    });
});