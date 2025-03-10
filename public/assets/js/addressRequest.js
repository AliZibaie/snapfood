function updatePlaceholder() {
    var filterSelect = document.getElementById('filterSelect');
    var searchInput = document.getElementById('searchInput');

    if (filterSelect.value === 'title') {
        searchInput.placeholder = 'Search by title';
        searchInput.setAttribute("name", "title");
    } else if (filterSelect.value === 'address') {
        searchInput.placeholder = 'Search by address';
        searchInput.setAttribute("name", "address");
    } else if (filterSelect.value === 'longitude') {
        searchInput.placeholder = 'Search by longitude';
        searchInput.setAttribute("name", "longitude");
    } else if (filterSelect.value === 'latitude') {
        searchInput.placeholder = 'Search by latitude';
        searchInput.setAttribute("name", "latitude");
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
