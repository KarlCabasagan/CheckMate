document.addEventListener('DOMContentLoaded', (event) => {
    const checkboxes = document.querySelectorAll(".product-checkbox");
    
    checkboxes.forEach(checkbox => {
       checkbox.addEventListener('change', (event) => {
            console.log(checkbox.parentElement);
       }); 
    });
});