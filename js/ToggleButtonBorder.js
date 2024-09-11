const buttons = document.querySelectorAll('.lists-wrapper button:not([form])'); // Select all buttons except inside forms
const hiddenInput = document.getElementById('list-id');
const listName = document.getElementById('list-name');
let listId = null;

function setActiveButton(button) {
    const allMenuList = document.querySelectorAll('.main-list-wrapper div');
    const allMenuListCompleted = document.querySelectorAll('.completed-item-inner-wrapper div');

    allMenuList.forEach(menuList => menuList.style.display = 'none');
    allMenuListCompleted.forEach(menuListCompleted => menuListCompleted.style.display = 'none');

    buttons.forEach(btn => btn.style.borderBottom = 'none');
    button.style.borderBottom = 'solid #5cafe3 2px';
    
    hiddenInput.value = button.value;
    listName.textContent = button.dataset.listName;

    const menuLists = document.getElementsByClassName('menu-list-' + button.value);
    for (let i = 0; i < menuLists.length; i++) {
        menuLists[i].style.display = "flex";
        Array.from(menuLists[i].children).map(child => child.style.display = "flex");
    }
}

buttons.forEach(button => button.addEventListener('click', () => setActiveButton(button)));

buttons[0].click();