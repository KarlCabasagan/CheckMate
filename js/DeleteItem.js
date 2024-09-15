document.addEventListener('DOMContentLoaded', (event) => {
    const deleteButtons = document.querySelectorAll('.delete-button');

    const buttons = document.querySelectorAll('.lists-wrapper button:not([form])');
   
    buttons.forEach(button => button.addEventListener('click', (event) => {
        const listId = button.value;
        
        deleteButtons.forEach(deleteButton => {
            deleteButton.addEventListener('click', (event) => {
                fetch(`/CheckMate/data-handling/delete-item.php?product-id=${deleteButton.dataset.productId}`)
                .catch(error => {
                    console.error("Failed sending data");
                });
                const menuList = deleteButton.parentElement.parentElement;
                menuList.remove();

                const purchasedCount = document.getElementById("purchased-count");
                const products = document.querySelectorAll(`.completed-item-inner-wrapper .menu-list-${listId}`);
                purchasedCount.textContent = `Checked (${products.length})`;
            });
        });
    }));
});