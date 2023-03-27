
var menu_list = document.getElementById('menu_list');
var list_item = document.getElementById('app__header-list-item');

function openMenu() {  
    var menu = document.getElementById('menu');
    var cancel = document.getElementById('cancel');
    var list = document.getElementById('list');

    if(menu.style.display == 'block'){
        cancel.style.display = 'block';
        menu.style.display = 'none';
        list.style.display = 'block';
    }else{
        cancel.style.display = 'none';
        menu.style.display = 'block';
        list.style.display = 'none';
    }
}

// for (var i=0; i<list_item.length; i++) {
//     list_item[i].addEventListener('click', function() {
//         var active = document.getElementsByClassName('active');
//         active[0].className = active[0].className.remove(" active");
//         this.classList.add('active');
//         // for (var j=0; j<active.length; j++) {
//         //     active[j].classList.remove('active');
//         // }
//     });
// }