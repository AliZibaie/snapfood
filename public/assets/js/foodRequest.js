    function updatePlaceholder() {
    var filterSelect = document.getElementById('filterSelect');
    var searchInput = document.getElementById('searchInput');

    if (filterSelect.value === 'name') {
    searchInput.placeholder = 'Search by name';
    searchInput.setAttribute("name", "name");
} else if (filterSelect.value === 'category') {
    searchInput.placeholder = 'Search by category';
    searchInput.setAttribute("name", "category");
} else if (filterSelect.value === 'price') {
    searchInput.placeholder = 'Search by price';
    searchInput.setAttribute("name", "price");
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
