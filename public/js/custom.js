function toggle(event) {
    var parent = event.parentNode;
    var toggle = parent.nextElementSibling;
    toggle.classList.toggle("hide");
}