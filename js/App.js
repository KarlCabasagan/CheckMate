import {completedListToggleShow} from "./CompletedItemDropButton.js";
import { toggleModalVisibility } from "./ShowModal.js";
import "./ToggleButtonBorder.js";
import "./CheckFunction.js";

document.addEventListener("DOMContentLoaded", (event) => {
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