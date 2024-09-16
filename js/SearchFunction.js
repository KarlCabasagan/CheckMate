document.addEventListener('DOMContentLoaded', (event) => {
    const buttonssss = document.querySelectorAll('.lists-wrapper button');

    buttonssss.forEach(button => button.addEventListener('click', (event) => {
        let listId = button.value;
        const form = document.querySelector('.search-bar-wrapper form');
        const searchInput = document.getElementById('search-bar-input');
        const listItems = document.querySelectorAll(`.main-list-wrapper .menu-list-${listId}`);
        button.removeEventListener('click', event);

        let items = {}

        for (let i = 0; i < listItems.length; i++) {
            items[listItems[i].dataset.productId] = {
                id: listItems[i].dataset.productId,
                name: listItems[i].dataset.productName
            };
        }

        if (searchInput.value.length >= 3) {
            const searchTerm = searchInput.value.toLowerCase();
            const filtereditems = Object.values(items).filter(item => item.name.toLowerCase().includes(searchTerm));
            

            listItems.forEach(listItem => {
                listItem.style.display = "none";
                // console.log(listItem);
            });

            for (let i = 0; i < listItems.length; i++ ) {
                for (let x = 0; x < filtereditems.length; x++ ) {
                    if (listItems[i].id == `product-${filtereditems[x].id}`) {
                        listItems[i].style.display = "flex";
                    }
                    // console.log(listItems[i].dataset.productName);
                }
            }
        } else {
            listItems.forEach(listItem => {
                    listItem.style.display = "flex";
            })
        }

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            if (searchInput.value.length >= 2) {
                const searchTerm = searchInput.value.toLowerCase();
                const filtereditems = Object.values(items).filter(item => item.name.toLowerCase().includes(searchTerm));
                

                listItems.forEach(listItem => {
                    listItem.style.display = "none";
                    // console.log(listItem);
                });

                for (let i = 0; i < listItems.length; i++ ) {
                    for (let x = 0; x < filtereditems.length; x++ ) {
                        if (listItems[i].id == `product-${filtereditems[x].id}`) {
                            listItems[i].style.display = "flex";
                        }
                        // console.log(listItems[i].dataset.productName);
                    }
                }
            } else {
                listItems.forEach(listItem => {
                    if (listItem.className == `menu-list-${listId}`) {
                        listItem.style.display = "flex";
                    }
                })
            }
        });

        // searchInput.addEventListener('enter', (event) => {
            // listId = null;
            // console.log(listId);
        // });



        // form.addEventListener('submit', (event) => {
        //     event.preventDefault();

        //     listItems.forEach(listItem => {
        //         if (listItem.className == `menu-list-${listId}`) {
        //             if (listItem.dataset.productName(`${searchInput.}`)) {
        //                 console.log(listItem.dataset.productName);
        //             }
                    
        //         }
        //     });
        // });

    }));
});