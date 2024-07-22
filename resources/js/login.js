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
            console.log(response);
            const csrfToken = getCookie('XSRF-TOKEN');
            console.log(window.document.cookie);

            const decoded = decodeURIComponent(csrfToken);
            console.log("CSRF Token:", decoded);
            login(decoded);
        } else {
            console.error("Failed to set CSRF cookie");
        }
    }).catch(error => {
        console.error("Error:", error);
    });

    function login(token) {
        console.log(token);
        return fetch("/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-XSRF-TOKEN": token
            },
            credentials: "include",
            body: JSON.stringify({
                "email":  "yousifd39@gmail.com",
                "password": "Password"


            })
        }).then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Login failed');
            }
        }).then(data => {
            console.log("Login successful", data);
        }).catch(error => {
            console.error("Error:", error);
        });
    }
