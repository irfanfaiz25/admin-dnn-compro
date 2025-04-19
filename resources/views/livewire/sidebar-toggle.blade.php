<div x-data="{ isSidebarVisible: @entangle('isSidebarVisible') }">
    <!-- Toggle Button -->
    <button @click="isSidebarVisible = !isSidebarVisible" class="lg:hidden p-2 fixed top-4 left-4 z-50 dark:text-gray-50">
        <i class="fa-solid fa-bars"></i>
    </button>

    <!-- Overlay -->
    <div x-show="isSidebarVisible" @click="isSidebarVisible = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>

    <!-- Sidebar -->
    <div :class="isSidebarVisible ? 'translate-x-0' : '-translate-x-full'"
        class="bg-[#FAFAFA] dark:bg-[#1c1c1c] fixed top-0 left-0 min-h-screen w-72 duration-500 text-gray-100 px-3 z-40 pt-20 lg:pt-10 transform lg:translate-x-0">
        <div class="flex lg:hidden items-center mt-2">
            <img src="/img/logo.png" alt="logo" class="w-8 ml-2" />
            <h1 class="font-header font-semibold text-lg ml-2">
                <span class="text-primary-gold">DWIPA</span>
                <span class="text-secondary-green">NUSANTARA</span>
                <span class="text-tertiary-red">NIAGA</span>
            </h1>
        </div>
        <div class="mt-10 flex flex-col gap-2 relative text-gray-800 dark:text-gray-50">
            @foreach ($sidebarMenu as $menu)
                @if (isset($menu['children']))
                    <div x-data="{ isDropdownOpen: false }" class="relative">
                        <button @click="isDropdownOpen = !isDropdownOpen"
                            class="group flex justify-between items-center text-sm h-11 gap-3.5 font-medium p-2 pl-5 w-full hover:bg-[#f2f2f2] dark:hover:bg-[#252525] hover:text-primary-gold dark:hover:text-primary-gold rounded-md {{ request()->is($menu['request']) ? 'bg-[#f2f2f2] dark:bg-[#252525] text-primary-gold' : 'text-gray-800 dark:text-gray-50' }}">
                            <div class="flex gap-3.5">
                                <i class="{{ $menu['icon'] }} text-lg"></i>
                                <h2 class="whitespace-pre duration-300 capitalize flex-1">{{ $menu['name'] }}</h2>
                            </div>
                            <div>
                                <i :class="isDropdownOpen ? 'rotate-180' : ''"
                                    class="fa-solid fa-chevron-down transition-transform"></i>
                            </div>
                        </button>
                        <div x-show="isDropdownOpen" x-transition class="mt-1 pl-8 space-y-1">
                            @foreach ($menu['children'] as $child)
                                <a href="{{ route($child['route']) }}"
                                    {{ $child['route'] != 'sejarah.index' ? 'wire:navigate' : '' }}
                                    class="group flex items-center text-sm h-9 gap-3.5 font-medium p-2 pl-5 hover:bg-[#f2f2f2] dark:hover:bg-[#252525] hover:text-primary-gold dark:hover:text-primary-gold rounded-md {{ request()->is($child['request']) ? 'bg-[#f2f2f2] dark:bg-[#252525] text-primary-gold' : 'text-gray-800 dark:text-gray-50' }}">
                                    <i class="{{ $child['icon'] }} text-lg"></i>
                                    <h2 class="whitespace-pre duration-300 capitalize">{{ $child['name'] }}</h2>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ route($menu['route']) }}"
                        {{ $menu['route'] != 'revolusi.index' ? 'wire:navigate' : '' }}
                        class="group flex items-center text-sm h-11 gap-3.5 font-medium p-2 pl-5 hover:bg-[#f2f2f2] dark:hover:bg-[#252525] hover:text-primary-gold dark:hover:text-primary-gold rounded-md {{ request()->is($menu['request']) ? 'bg-[#f2f2f2] dark:bg-[#252525] text-primary-gold' : 'text-gray-800 dark:text-gray-50' }}">
                        <i class="{{ $menu['icon'] }} text-lg"></i>
                        <h2 class="whitespace-pre duration-300 capitalize">{{ $menu['name'] }}</h2>
                    </a>
                @endif
                @if ($menu['name'] == 'transaksi')
                    <hr class="border border-gray-200 dark:border-[#2f2f2f]">
                @endif
            @endforeach
        </div>
    </div>
</div>
