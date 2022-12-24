var banner = document.querySelector('.banner__link');
var arrImg = [];
var link = ['public/layout/images/banner_logo/banner1.jpg', 'public/layout/images/banner_logo/banner2.png', 'public/layout/images/banner_logo/banner3.png', 'public/layout/images/banner_logo/banner4.jfif', 'public/layout/images/banner_logo/banner5.png', 'public/layout/images/banner_logo/banner6.jfif', 'public/layout/images/banner_logo/banner7.png'];

function loadAnh() {
    for (var i = 0; i < 7; i++) {
        arrImg[i] = new Image();
        arrImg[i].src = link[i];
    }
    // console.log(1);
}
// loadAnh()


var index = 0;
function next() {
    // console.log(arrImg[index].src);
    if (index < 6) {
        index++;
    }
    else index = 0;
    banner.style.backgroundImage = "url('"+ arrImg[index].src +"')";
}

function back() {
    if (index > 0) {
        index--;
    }
    else index = 6;
    banner.style.backgroundImage = 'url(' + arrImg[index].src + ')';
}

