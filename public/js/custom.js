function toggle(event) {
    document.querySelectorAll('.sub')
    .forEach(function(event) {
        event.classList.toggle("hide");
        event.style.marginLeft = "20px";
    })
}