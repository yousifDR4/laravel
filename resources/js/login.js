
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
fetch("sanctum/csrf-cookie", {
    method: "GET",
    headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
    },
    credentials: "include"
}).then(response => {
    if (response.ok) {
        console.log("CSRF cookie set successfully");
        // Now read the CSRF token from the cookie
        const csrfToken = getCookie('XSRF-TOKEN');
        console.log("CSRF Token:",decodeURIComponent (csrfToken));
    } else {
        console.error("Failed to set CSRF cookie");
    }
}).catch(error => {
    console.error("Error:", error);
});



