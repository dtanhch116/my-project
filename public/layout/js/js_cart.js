var icon_choosed = document.querySelectorAll('.chon-sp-icon');
// var get_sp_choosed = '';
var input_sp_choosed_dl = document.querySelectorAll('.choosed-cart-dl');
var input_sp_choosed_order = document.querySelectorAll('.choosed-cart-order');
var all_sp = document.querySelector('.all-sp');
for (const i of icon_choosed) {
    i.onclick = function () {
        if (this.classList.contains('choosed')) {
            this.classList.remove('choosed');
            set_sp_choosed();
        }
        else {
            this.classList.add('choosed');
            set_sp_choosed();
        }
    }

}

all_sp.addEventListener('click', function () {
    for (var i = 0; i < icon_choosed.length; i++) {
        // console.log('test:', icon_choosed[i]);
        if (icon_choosed[i].classList.contains('choosed')) {
            icon_choosed[i].classList.remove('choosed');
        }
        else {
            icon_choosed[i].classList.add('choosed');
            // console.log(input_sp_choosed[i].value);
        }
    }
    set_sp_choosed();
})

function set_sp_choosed() {
    for (var i = 0; i < icon_choosed.length; i++) {
        // console.log(input_sp_choosed[i]);
        if (icon_choosed[i].classList.contains('choosed')) {
            input_sp_choosed_dl[i].value = icon_choosed[i].id;
            input_sp_choosed_order[i].value = icon_choosed[i].id;
            // console.log('input'+i+':',input_sp_choosed[i]);
            // console.log('=============================');
        }
        else {
            input_sp_choosed_dl[i].value = '';
            input_sp_choosed_order[i].value = '';
        }
    }
    console.log('ok');
}
console.log(1);


