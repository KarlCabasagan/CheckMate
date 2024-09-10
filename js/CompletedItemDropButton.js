export function completedListToggleShow() {
    const dropBtn = document.getElementById("completed-item-drop-button");
    const dropContent = document.getElementById("completed-item-inner-wrapper");

    dropBtn.classList.toggle("show");
    dropContent.classList.toggle("show");
}