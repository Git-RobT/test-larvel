<header class="py-4 bg-black sm:py-6">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            {{-- Logo --}}
            <div class="shrink-0">
                <a href="/" title="" class="flex">
                    <img class="w-auto h-11" src="Images/logo-light3-1.webp" alt="logo" />
                </a>
            </div>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex md:space-x-10 lg:space-x-12">
                <x-custom-link href="/"
                    class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white">Home</x-custom-link>
                <x-custom-link href="/about"
                    class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white">About</x-custom-link>
                <x-custom-link href="/pricing"
                    class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white">Pricing</x-custom-link>
                <x-custom-link href="/contact"
                    class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white">Contact</x-custom-link>
            </nav>

            {{-- Account Login Button --}}
            <div class="relative hidden md:justify-center md:items-center md:inline-flex group">
                <div class="absolute transition-all duration-200 rounded-full -inset-px bg-gradient-to-r from-cyan-500 to-purple-500 group-hover:shadow-lg group-hover:shadow-cyan-500/50"></div>

                <div class="relative group"></div>
                <button type="button" class="relative inline-flex items-center justify-center px-6 py-2 text-base font-normal text-white bg-black border border-transparent rounded-full focus:outline-none z-11" id="user-menu-button">
                    User Name
                </button>

                {{-- Dropdown Menu --}}
                <div id="user-menu" class="absolute mt-2 right-0 top-full w-40 bg-black text-white border border-transparent rounded-lg shadow-lg hidden group-hover:block transition-all duration-200 z-30">
                    <div class="absolute rounded -inset-px bg-gradient-to-r from-cyan-500 to-purple-500 group-hover:shadow-lg group-hover:shadow-cyan-500/50"></div>
                    <div class="relative bg-black rounded">
                        <a href="#" class="block px-6 py-2 text-white hover:bg-gray-800 rounded transition-all duration-200">
                            Dashboard
                        </a>
                        <a href="#" class="block px-6 py-2 text-white hover:bg-gray-800 rounded transition-all duration-200">
                            My Profile
                        </a>
                        <form method="POST" action="#">
                            <button type="submit" class="w-full text-left block px-6 py-2 text-white hover:bg-gray-800 rounded transition-all duration-200">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>