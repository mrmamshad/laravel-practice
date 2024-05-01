
    <ul class="" >

        <!-- x-nav.blade.php -->
        <li>
            <a href="{{ $href }}" {{ $attributes }} class="nav-link hover:text-green-300 transition duration-200 ease-in-out">{{ $slot }}</a>
        </li>


    </ul>


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
<style>
    .nav-link {
        @apply inline-block px-4 py-2 text-gray-800 hover:bg-red-800 transition-colors duration-200;
    }

    .navbar ul {
        list-style-type: none;
        background-color: #344955;
        padding: 3px;
        margin: 0;
        overflow: hidden;
        display: flex;
        justify-content:  space-evenly;
        border-radius: 20px;
    }

    .navbar a {


        text-decoration: none;
        color: #8492a6;
        padding: 3px ;
        display: flex;
        text-align: center;

    }
    .nav-link.active {
        color: aliceblue;
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
