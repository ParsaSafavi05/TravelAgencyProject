

function changeTab(tabId) {
    document.addEventListener('DOMContentLoaded', function() {
        // Get the pathname and split it into segments
        const pathSegments = window.location.pathname.split('/').filter(Boolean); // Filter Boolean removes any empty strings from the array, which can occur if there's a trailing slash
        
        // Check if we have at least two segments, and if so, get the last two
        const lastTwoSegments = pathSegments.length >= 2 
            ? pathSegments.slice(-2).join('/') 
            : pathSegments.join('/'); // If there are not enough segments, fall back to whatever is available
    
        document.querySelectorAll('.nav-item').forEach(function(navItem) {
            // For each navigation item, get its pathname, split into segments, and then check the last two segments
            const itemPathSegments = new URL(navItem.href).pathname.split('/').filter(Boolean); // Similarly, filter out any empty strings
            const itemLastTwoSegments = itemPathSegments.length >= 2 
                ? itemPathSegments.slice(-2).join('/') 
                : itemPathSegments.join('/'); // Fallback for nav items with less than two path segments
    
            // Compare the last two segments of the current URL with those of the nav item
            if (itemLastTwoSegments === lastTwoSegments) {
                navItem.classList.add('active');
            } else {
                navItem.classList.remove('active');
            }
        });
    });
}

