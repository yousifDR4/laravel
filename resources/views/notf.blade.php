<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    {{-- <div
    x-init="Echo.join('store.1').here((users)=>{
    console.log(users);
    })"

    ></div> --}}
    {{-- <div
    x-init="
    const channel=Echo.private('chat');
    setTimeout(()=>{
    channel.whisper('typing',{
    id:1
    })

    },1000)
   "
    ></div> --}}
    <script >
    //    Echo.channel("example-channel")
    // .listen("ExampleEvent", (e) => {
    //     console.log(e);
    // });

    // Echo.channel('example-channel')
    // .listen('.ExampleEvent', (e) => {
    //     console.log('Event received:', e);
    // });
    //     window.Echo.channel('example-channel')
    // .listen('.ExampleEvent', (e) => {
    //     console.log('Event received:', e);
    // });
    // function getCookie(name) {
    //     const value = `; ${document.cookie}`;
    //     const parts = value.split(`; ${name}=`);
    //     if (parts.length === 2) return parts.pop().split(';').shift();
    // }

    // fetch("sanctum/csrf-cookie", {
    //     method: "GET",
    //     headers: {
    //         "Content-Type": "application/json",
    //         "Accept": "application/json"
    //     },
    //     credentials: "include"
    // }).then(response => {
    //     if (response.ok) {
    //         console.log("CSRF cookie set successfully");
    //         // Now read the CSRF token from the cookie
    //         const csrfToken = getCookie('XSRF-TOKEN');
    //         const decoded = decodeURIComponent(csrfToken);
    //         console.log("CSRF Token:", decoded);
    //         login(decoded);
    //     } else {
    //         console.error("Failed to set CSRF cookie");
    //     }
    // }).catch(error => {
    //     console.error("Error:", error);
    // });

    // function login(token) {
    //     console.log(token);
    //     return fetch("/login", {
    //         method: "POST",
    //         headers: {
    //             "Content-Type": "application/json",
    //             "Accept": "application/json",
    //             "X-XSRF-TOKEN": token
    //         },
    //         credentials: "include",
    //         body: JSON.stringify({
    //             "email": "dd@example.com",
    //             "password": "password"
    //         })
    //     }).then(response => {
    //         if (response.ok) {
    //             return response.json();
    //         } else {
    //             throw new Error('Login failed');
    //         }
    //     }).then(data => {
    //         console.log("Login successful", data);
    //     }).catch(error => {
    //         console.error("Error:", error);
    //     });
    // }
    </script>
</body>
</html>
