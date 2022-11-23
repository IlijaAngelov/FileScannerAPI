function toggle(event) {
    var parent = event.parentNode;
    var toggle = parent.nextElementSibling;
    toggle.classList.toggle("hide");
}

function copyContent(event) {

    if (!navigator.clipboard) {
        fallbackCopyTextToClipboard(text);
        return;
    }
    let copyText = event.getAttribute("data-value");

    navigator.clipboard.writeText(copyText).then(function() {
        console.log("Async: Coping to clipboard was successful!");
    }, function(err) {
        console.error('Async: Could not copy text: ', err);
    });

}