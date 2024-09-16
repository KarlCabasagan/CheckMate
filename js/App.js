import {completedListToggleShow} from "./CompletedItemDropButton.js";
import { toggleModalVisibility } from "./ShowModal.js";
import "./CheckFunction.js";
import "./UpdatePurchasedCount.js";
import "./DeleteItem.js";
import "./ToggleButtonBorder.js";
import "./SearchFunction.js"

document.addEventListener("DOMContentLoaded", (event) => {
    const buttons = document.querySelectorAll('.lists-wrapper button:not([form])');
    buttons[0].click();

    const dropButton = document.getElementById("completed-item-drop-button");

    dropButton.addEventListener("click", (event) => {
        completedListToggleShow();
    });

    const modalButton = document.getElementById("modal-button");
    modalButton.addEventListener("click", (event) => {
        toggleModalVisibility();
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