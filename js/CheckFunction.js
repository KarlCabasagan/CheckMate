document.addEventListener('DOMContentLoaded', (event) => {
    const checkboxes = document.querySelectorAll(".product-checkbox");
    const mainListWrapper = document.getElementById('main-list-wrapper');
    const completedItemInnerWrapper = document.getElementById('completed-item-inner-wrapper');

    checkboxes.forEach(checkbox => {
       checkbox.addEventListener('change', (event) => {
            if (checkbox.checked) {
                completedItemInnerWrapper.prepend(checkbox.parentElement.parentElement)
                // checkbox.parentElement.parentElement.remove;
                const productId = checkbox.dataset.productId;

                fetch(`/CheckMate/data-handling/check-item.php?product-id=${productId}`)
                .catch(error => {
                    console.error('Failed sending data');
                });

            } else {
                mainListWrapper.prepend(checkbox.parentElement.parentElement)
                // checkbox.parentElement.parentElement.remove;
                const productId = checkbox.dataset.productId;

                fetch(`/CheckMate/data-handling/uncheck-item.php?product-id=${productId}`)
                .catch(error => {
                    console.error('Failed sending data');
                });
            }
       }); 
    });
});