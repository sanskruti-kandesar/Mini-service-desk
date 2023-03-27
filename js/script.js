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