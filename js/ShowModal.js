export function toggleModalVisibility() {
    const modal = document.getElementById("list-control-modal");
    modal.classList.toggle("open");
    modal.style.visibility = "visible";
}   