document.addEventListener('DOMContentLoaded', function () {
    const myElement = document.getElementById("bnr_btn");
    myElement.onclick = function () {
        window.open("https://play.google.com/store/apps/details?id=uz.uzinfocom.mygov&hl=ru&gl=US");
    };
    if (/android/i.test(navigator.userAgent)) {
        myElement.onclick = function () {
            window.open("https://play.google.com/store/apps/details?id=uz.uzinfocom.mygov&hl=ru&gl=US");
        };
    }
    if (/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream) {
        myElement.onclick = function () {
            window.open("https://apps.apple.com/uz/app/mygov/id1544175166");
        };
    }
});