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
            @apply inline-block px-4 py-2 text-gray-800 hover:bg-red-800 transition-colors duration-300;
        }
    </style>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-800">
{{--<nav>--}}
{{--    <ul class="relative flex items-center gap-2 rounded-3xl bg-[#0000000a] px-2 py-1 dark:border dark:border-sub-color/50 dark:bg-sub-alt-color">--}}
{{--        <div class="absolute left-0 h-7 rounded-3xl bg-white shadow-[0px_0px_5px_0px_#0000000a] dark:bg-sub-color/40" style="width: 63px; transform: translateX(9px) translateZ(0px);"></div>--}}
{{--        <li class="text-stone-900 dark:text-text-color z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">Home</li>--}}
{{--        <li class="text-stone-900 dark:text-sub-color dark:hover:text-main-color z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">About</li>--}}
{{--        <li class="text-stone-900 dark:text-sub-color dark:hover:text-main-color z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">Projects</li>--}}
{{--        <li class="text-stone-900 dark:text-sub-color dark:hover:text-main-color z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">Media</li>--}}
{{--    </ul>--}}
{{--</nav>--}}
{{--    <nav>--}}
{{--        <ul class="relative flex items-center gap-2 rounded-3xl bg-[#0000000a] px-2 py-1 dark:border dark:border-sub-color/50 dark:bg-sub-alt-color">--}}
{{--            <div class="absolute left-0 h-7 rounded-3xl bg-white shadow-[0px_0px_5px_0px_#0000000a] dark:bg-sub-color/40"--}}
{{--                 data-projection-id="34" style="width: 63px; transform: translateX(9px) translateZ(0px);"></div>--}}
{{--            <a href="/">--}}
{{--                <li class="--}}
{{--                    text-stone-900 dark:text-text-color--}}
{{--                    z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out "  >Home--}}
{{--                </li>--}}
{{--            </a>--}}
{{--          <a href="/about" >--}}
{{--              <li class="--}}
{{--                    text-stone-900 dark:text-sub-color dark:hover:text-main-color--}}
{{--                    z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">About--}}
{{--              </li>--}}
{{--          </a>--}}
{{--         <a href="/contact">--}}
{{--             <li class="--}}
{{--                    text-stone-900 dark:text-sub-color dark:hover:text-main-color--}}
{{--                    z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">Projects--}}
{{--             </li>--}}
{{--         </a>--}}
{{--           <a href="/notes"  >--}}
{{--               <li class="--}}
{{--                    text-stone-900 dark:text-sub-color dark:hover:text-main-color--}}
{{--                    z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">Media--}}
{{--               </li>--}}
{{--           </a>--}}
{{--        </ul>--}}
{{--    </nav>--}}
<nav>
    <ul class="relative flex items-center gap-2 rounded-3xl bg-[#0000000a] px-2 py-1 dark:border dark:border-sub-color/50 dark:bg-sub-alt-color">
        <div id="background" class="absolute left-0 h-7 rounded-3xl bg-white shadow-[0px_0px_5px_0px_#0000000a] dark:bg-sub-color/40 transition-transform" style="width: 63px; transform: translateX(4px) translateZ(0px);"></div>
        <li class="nav-item text-stone-900 dark:text-text-color z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">Home</li>
        <li class="nav-item text-stone-900 dark:text-sub-color dark:hover:text-main-color z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">About</li>
        <li class="nav-item text-stone-900 dark:text-sub-color dark:hover:text-main-color z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">Projects</li>
        <li class="nav-item text-stone-900 dark:text-sub-color dark:hover:text-main-color z-10 cursor-pointer px-3 py-1 text-sm transition-colors duration-300 ease-in-out ">Media</li>
    </ul>
</nav>

<script>
    const navItems = document.querySelectorAll('.nav-item');
    const background = document.getElementById('background');

    navItems.forEach(item => {
        item.addEventListener('click', () => {
            const itemRect = item.getBoundingClientRect();
            const backgroundRect = background.getBoundingClientRect();
            const translateX = itemRect.left - backgroundRect.left;

            background.style.transform = `translateX(${translateX}px)`;
        });
    });
</script>

<?= $slot ?>
</body>
</html>
