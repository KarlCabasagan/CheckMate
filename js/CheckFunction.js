document.addEventListener('DOMContentLoaded', (event) => {
    const checkboxes = document.querySelectorAll(".product-checkbox");
    const mainListWrapper = document.getElementById('main-list-wrapper');
    const completedItemInnerWrapper = document.getElementById('completed-item-inner-wrapper');

    const buttons = document.querySelectorAll('.lists-wrapper button:not([form])');
   
    buttons.forEach(button => button.addEventListener('click', (event) => {
        const listId = button.value;

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', (event) => {
                const purchasedCount = document.getElementById("purchased-count");

                if (checkbox.checked) {
                    completedItemInnerWrapper.prepend(checkbox.parentElement.parentElement)

                    const products = document.querySelectorAll(`.completed-item-inner-wrapper .menu-list-${listId}`);
                    purchasedCount.textContent = `Checked (${products.length})`;
                    // checkbox.parentElement.parentElement.remove;
                    const productId = checkbox.dataset.productId;

                    fetch(`/CheckMate/data-handling/check-item.php?product-id=${productId}`)
                    .catch(error => {
                        console.error('Failed sending data');
                    });

                } else {
                    mainListWrapper.append(checkbox.parentElement.parentElement)
                    // checkbox.parentElement.parentElement.remove;

                    const products = document.querySelectorAll(`.completed-item-inner-wrapper .menu-list-${listId}`);
                    purchasedCount.textContent = `Checked (${products.length})`;
                    
                    const productId = checkbox.dataset.productId;

                    fetch(`/CheckMate/data-handling/uncheck-item.php?product-id=${productId}`)
                    .catch(error => {
                        console.error('Failed sending data');
                    });
                }
            }); 
        });
    }));
});