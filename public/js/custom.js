function changeTab(tabId) {
    // Get all tab elements
    let tabs = document.querySelectorAll(".nav-item");
    
    // Remove 'active' class from all tabs
    tabs.forEach(function(tab) {
        tab.classList.remove("active");
    });

    // Add 'active' class to the clicked tab
    document.getElementById(tabId).classList.add("active");
}

