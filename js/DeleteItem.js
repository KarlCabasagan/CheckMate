document.addEventListener('DOMContentLoaded', (event) => {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(deleteButton => {
        deleteButton.addEventListener('click', (event) => {
            fetch(`/CheckMate/data-handling/delete-item.php?product-id=${deleteButton.dataset.productId}`)
            .catch(error => {
                console.error("Failed sending data");
            });
            const menuList = deleteButton.parentElement.parentElement;
            menuList.remove();
        });
    });
});