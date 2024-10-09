function toggleStatusText(labelId, checkbox) {
    const label = document.getElementById(labelId);
    if (checkbox.checked) {
        label.textContent = 'Active';
    } else {
        label.textContent = 'In-Active';
    }
}
function toggleVisibleText(labelId, checkbox) {
    const label = document.getElementById(labelId);
    if (checkbox.checked) {
        label.textContent = 'Yes';
    } else {
        label.textContent = 'No';
    }
}


function initializeSelect2(selector) {
    $(selector).select2();
}

$(document).ready(function () {
    initializeSelect2('.select-dropdown');
});



