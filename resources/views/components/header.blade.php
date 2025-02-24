@php
use Illuminate\Support\Facades\Auth;
$expanded = $expanded ?? false;
@endphp
<header class="py-4 bg-black sm:py-6">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            {{-- Logo --}}
            <div class="shrink-0">
                <a href="/" title="" class="flex">
                    <img class="w-auto h-11" src="Images/logo-light3-1.webp" alt="logo" />
                </a>
            </div>

            {{-- Hamburger Button --}}
            <div class="flex md:hidden">
                <button type="button" class="text-white" id="hamburgerButton"
                    aria-expanded="{{ $expanded ? 'true' : 'false' }}" aria-label="Toggle menu">
                    {{-- Hamburger Icon --}}
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" id="hamburgerIcon">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"
                            id="closeIcon" class="hidden" />
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="1.5" d="M4 6h16M4 12h16M4 18h16"
                            id="menuIcon" />
                    </svg>
                </button>
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

                @auth
                <div class="relative group">
                    <button type="button" class="relative inline-flex items-center justify-center px-6 py-2 text-base font-normal text-white bg-black border border-transparent rounded-full focus:outline-none z-11" id="user-menu-button">
                        {{ Auth::user()->name }}
                    </button>

                    {{-- Dropdown Menu --}}
                    <div id="user-menu" class="absolute mt-2 right-0 top-full w-40 bg-black text-white border border-transparent rounded-lg shadow-lg hidden group-hover:block transition-all duration-200 z-30">
                        <div class="absolute rounded -inset-px bg-gradient-to-r from-cyan-500 to-purple-500 group-hover:shadow-lg group-hover:shadow-cyan-500/50"></div>
                        <div class="relative bg-black rounded">
                            @if (!Auth::user()->hasVerifiedEmail())
                            {{-- If the email is not verified, only show Verify Email & Logout --}}
                            <a href="{{ url('/verify-email-reminder') }}" class="block px-6 py-2 text-white hover:bg-gray-800 rounded transition-all duration-200">
                                Verify Email
                            </a>
                            @else
                            {{-- If email is verified, show respective dashboards or profile --}}
                            @if (Auth::user()->user_type === 'super_admin')
                            <a href="{{ url('/access/super-admin/dashboard') }}" class="block px-6 py-2 text-white hover:bg-gray-800 rounded transition-all duration-200">
                                Dashboard
                            </a>
                            @elseif (in_array(Auth::user()->user_type, ['admin', 'editor', 'secretary']))
                            <a href="{{ url('/access/admin/dashboard') }}" class="block px-6 py-2 text-white hover:bg-gray-800 rounded transition-all duration-200">
                                Dashboard
                            </a>
                            @elseif (Auth::user()->user_type === 'user')
                            <a href="{{ route('profile') }}" class="block px-6 py-2 text-white hover:bg-gray-800 rounded transition-all duration-200">
                                My Profile
                            </a>
                            @endif
                            @endif

                            {{-- Logout Button (Always Show) --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left block px-6 py-2 text-white hover:bg-gray-800 rounded transition-all duration-200">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <x-custom-link href="/login" class="relative inline-flex items-center justify-center px-6 py-2 text-base font-normal text-white bg-black border border-transparent rounded-full">
                    Account Login
                </x-custom-link>
                @endauth
            </div>
        </div>

        {{-- Mobile Navigation --}}
        <nav class="{{ $expanded ? 'block' : 'hidden' }} md:hidden space-y-4 p-4 bg-black">
            <x-custom-link href="/" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block">
                Home
            </x-custom-link>
            <x-custom-link href="/about" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block">
                About
            </x-custom-link>
            <x-custom-link href="/pricing" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block">
                Pricing
            </x-custom-link>
            <x-custom-link href="/contact" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block">
                Contact
            </x-custom-link>
            <x-custom-link href="/bookingform" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block">
                Apply Now
            </x-custom-link>

            @auth
            {{-- Profile Link for Logged-in Users --}}
            <x-custom-link href="{{ route('profile') }}" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block">
                My Profile
            </x-custom-link>

            {{-- Logout Button --}}
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block w-full text-left">
                    Logout
                </button>
            </form>
            @else
            {{-- Show Login Button for Guests --}}
            <x-custom-link href="/login" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block">
                Login
            </x-custom-link>

            {{-- Show Sign-Up Button for Guests --}}
            <x-custom-link href="/register" class="text-base font-normal text-gray-400 transition-all duration-200 hover:text-white block">
                Sign Up
            </x-custom-link>
            @endauth
        </nav>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const button = document.getElementById("user-menu-button");
        const menu = document.getElementById("user-menu");

        if (!button || !menu) return; // Prevent errors if elements are missing

        button.addEventListener("click", function() {
            menu.classList.toggle("hidden");
        });

        document.addEventListener("click", function(event) {
            if (
                !button.contains(event.target) &&
                !menu.contains(event.target)
            ) {
                menu.classList.add("hidden");
            }
        });
    });
</script>