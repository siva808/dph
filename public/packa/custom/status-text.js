function toggleStatusText(labelId, checkbox) {
    const label = document.getElementById(labelId);
    if (checkbox.checked) {
        label.textContent = 'Active';
    } else {
        label.textContent = 'Inactive';
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


