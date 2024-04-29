<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <style>
        .nav-link {
            @apply inline-block px-4 py-2 text-gray-800 hover:bg-red-800 transition-colors duration-200;
        }

        .navbar ul {
            list-style-type: none;
            background-color: #344955;
            padding: 0;
            margin: 0;
            overflow: hidden;
            display: flex;
            justify-content:  space-evenly;
        }

        .navbar a {


            text-decoration: none;
            color: #8492a6;
            padding: 3px ;
            display: flex;
            text-align: center;

        }
        .nav-link.active {
            background-color: #2d3748;
            border-radius: 20px;
            transition: background-color 0.6s ease, transform 0.3s ease;


            /* Add any other styles you want for the active state */
        }
        .navbar li a{
            display: flex;
            justify-content: center;
            align-items: center;
            padding-left: 15px;
            padding-right: 15px;
        }



    </style>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-800">
<nav class="navbar bg-[#344955]  mx-auto rounded-full max-w-80 mt-6 py-1   flex  items-center justify-center shadow-xl">
    <ul class="" >

        <li><a href="/" class="nav-link hover:text-green-500 transition duration-300 " >Home</a></li>
        <li><a href="/about" class="nav-link  hover:text-green-500 transition duration-300 " >About</a></li>
        <li><a href="/contact" class="nav-link hover:text-green-500 transition duration-300 " >Contact</a></li>
        <li><a href="/add" class="nav-link hover:text-green-500 transition duration-300 " >Add</a></li>
    </ul>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navLinks = document.querySelectorAll(".nav-link");

        // Function to remove active class from all links
        function removeActiveClass() {
            navLinks.forEach(function(link) {
                link.classList.remove("active");
            });
        }

        navLinks.forEach(function(navLink) {
            navLink.addEventListener("click", function(event) {
                event.preventDefault();

                // Remove active class from all links
                removeActiveClass();

                // Add active class to the clicked link
                this.classList.add("active");

                // Navigate to the href of the clicked link
                window.location.href = this.getAttribute("href");
            });

            // Check if the current URL matches the href of any navigation link
            if (window.location.pathname === navLink.getAttribute("href")) {
                // Add active class to the link whose href matches the current URL
                navLink.classList.add("active");
            }
        });
    });
</script>

<?= $slot ?>
</body>
</html>
