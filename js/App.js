import {completedListToggleShow} from "./CompletedItemDropButton.js";
import { toggleModalVisibility } from "./ShowModal.js";

document.addEventListener("DOMContentLoaded", (event) => {
    const dropButton = document.getElementById("completed-item-drop-button");

    dropButton.addEventListener("click", (event) => {
        completedListToggleShow();
    });

    const modalButton = document.getElementById("modal-button");
    modalButton.addEventListener("click", (event) => {
        toggleModalVisibility();
        console.log("hi");
    });

    const listControlModal = document.getElementById("list-control-modal");
    listControlModal.addEventListener('click', (event) => {
        if (event.target !== listControlModal) return;
        toggleModalVisibility();

        setTimeout(function() {
            listControlModal.style.visibility = "hidden";
          }, 200);
    });
});