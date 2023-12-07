function updatePlaceholder() {
    var filterSelect = document.getElementById('filterSelect');
    var searchInput = document.getElementById('searchInput');

    if (filterSelect.value === 'hour') {
        searchInput.placeholder = 'Search by hour';
        searchInput.setAttribute("name", "hour");
    } else if (filterSelect.value === 'day') {
        searchInput.placeholder = 'Search by day';
        searchInput.setAttribute("name", "day");
    } else if (filterSelect.value === 'week') {
        searchInput.placeholder = 'Search by week';
        searchInput.setAttribute("name", "week");
    } else if (filterSelect.value === 'month') {
        searchInput.placeholder = 'Search by month';
        searchInput.setAttribute("name", "month");
    } else {
        searchInput.placeholder = 'Search for the tool you like';
    }
}

function submitForm(event) {
    event.preventDefault();
    var filterSelect = document.getElementById('filterSelect');
    var searchInput = document.getElementById('searchInput');
    var filterType = filterSelect.value;
    var searchData = searchInput.value;
    // Implement your form submission logic here
    console.log('Form submitted:', filterType, searchData);
}
