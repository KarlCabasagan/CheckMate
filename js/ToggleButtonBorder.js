const buttons = document.querySelectorAll('.lists-wrapper button:not([form])');
const hiddenInput = document.getElementById('list-id');
const listName = document.getElementById('list-name');
const renameList = document.getElementById('rename-list');
const deleteList = document.getElementById('delete-list');

function setActiveButton(button) {
    const allMenuList = document.querySelectorAll('.main-list-wrapper div');
    const allMenuListCompleted = document.querySelectorAll('.completed-item-inner-wrapper div');

    allMenuList.forEach(menuList => menuList.style.display = 'none');
    allMenuListCompleted.forEach(menuListCompleted => menuListCompleted.style.display = 'none');

    renameList.href = `rename-list.php?list-id=${button.value}`;
    deleteList.href = `./data-handling/delete-list.php?list-id=${button.value}`;

    buttons.forEach(btn => btn.style.borderBottom = 'none');
    button.style.borderBottom = 'solid #5cafe3 2px';
    
    hiddenInput.value = button.value;
    listName.textContent = button.dataset.listName;

    const menuLists = document.getElementsByClassName('menu-list-' + button.value);
    for (let i = 0; i < menuLists.length; i++) {
        menuLists[i].style.display = "flex";
        Array.from(menuLists[i].children).map(child => child.style.display = "flex");
    }

    const listId = button.value;

    const purchasedCount = document.getElementById("purchased-count");
    const products = document.querySelectorAll(`.completed-item-inner-wrapper .menu-list-${listId}`);

    purchasedCount.textContent = `Checked (${products.length})`;
}

buttons.forEach(button => button.addEventListener('click', () => setActiveButton(button)));