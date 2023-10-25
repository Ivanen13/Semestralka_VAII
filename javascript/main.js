const panelLeft = document.querySelector('.panelLeft');
const panelRight = document.querySelector('.panelRight');
var song = document.getElementById('hudba');

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
