function toggleStatusText(labelId, checkbox) {
    const label = document.getElementById(labelId);
    if (checkbox.checked) {
        label.textContent = 'Active';
    } else {
        label.textContent = 'Inactive';
    }
}
