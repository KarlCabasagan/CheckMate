// document.addEventListener('DOMContentLoaded', (event) => {
//    const buttons = document.querySelectorAll('.lists-wrapper button:not([form])');
   
//    buttons.forEach(button => button.addEventListener('click', (event) => {
//       const listId = button.value;
//       const checkboxes = document.querySelectorAll(".product-checkbox");


//       const purchasedCount = document.getElementById("purchased-count");
//       const products = document.querySelectorAll(`.completed-item-inner-wrapper .menu-list-${listId}`);

//       checkboxes.forEach(checkbox => {
//          checkbox.addEventListener('change', (event) => {
//             const products = document.querySelectorAll(`.completed-item-inner-wrapper .menu-list-${listId}`);

//             if (checkbox.checked) {
//                purchasedCount.textContent = `Checked (${products.length})`;
//             } else {
//                purchasedCount.textContent = `Checked (${products.length})`;
//             }
//          });
//       });
//    }));
// });