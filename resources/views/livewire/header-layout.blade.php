<div
    class="fixed w-full z-50 bg-white dark:bg-[#252525] text-gray-800 dark:text-gray-50 flex justify-end lg:justify-between items-center px-4 py-4 shadow-md">
    <div class="hidden lg:flex items-center">
        <img src="/img/logo.png" alt="logo" class="w-8 ml-2" />
        <h1 class="font-header font-semibold text-lg ml-2">
            <span class="text-primary-gold">DWIPA</span>
            <span class="text-secondary-green">NUSANTARA</span>
            <span class="text-tertiary-red">NIAGA</span>
        </h1>
    </div>
    <div class="relative flex items-center">
        <!-- Profile Toggle Button -->
        <button wire:click='profileToggle' class="focus:outline-none">
            <i class="fa-solid fa-circle-user text-3xl"></i>
        </button>

        <!-- Dropdown Menu -->
        @if ($isProfileButtonVisible)
            <div
                class="absolute top-10 right-0 mt-2 w-52 bg-white dark:bg-[#252525] text-gray-800 dark:text-gray-50 border dark:border-[#3c3c3c] rounded shadow-lg z-50">
                <div class="py-2">
                    <div class="px-4 pt-1 pb-2">
                        <div class="flex items-center space-x-2 pl-1 py-1">
                            <i class="fa-solid fa-circle-user text-2xl"></i>
                            <span class="font-semibold">
                                @if (Auth::check())
                                    {{ Auth::user()->name }}
                                @else
                                    User
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="border-t border-gray-200/80 dark:border-[#3c3c3c] flex justify-center">
                        <div class="mx-4 my-2">
                            <div class="flex z-50 space-x-1">
                                <div class="rounded-md cursor-pointer hover:text-gray-500 px-7 py-2 duration-100"
                                    @click="
                                         darkMode = false;
                                         localStorage.setItem('darkMode', false);
                                         document.documentElement.classList.remove('dark');
                                         $wire.profileToggle();
                                     "
                                    :class="darkMode ? 'text-text-primary dark:text-text-dark-primary' :
                                        'bg-neutral-100 text-secondary'">
                                    <i class="fa-regular fa-lightbulb text-lg"></i>
                                </div>
                                <div class="rounded-md cursor-pointer hover:text-gray-500 px-7 py-2 duration-100"
                                    @click="
                                         darkMode = true;
                                         localStorage.setItem('darkMode', true);
                                         document.documentElement.classList.add('dark');
                                         $wire.profileToggle();
                                     "
                                    :class="darkMode ? 'bg-[#303030] text-secondary' : 'text-text-primary'">
                                    <i class="fa-solid fa-lightbulb text-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200/80 dark:border-[#3c3c3c]">
                        <div class="mx-1 pt-2">
                            <div wire:click='logout'
                                class="hover:bg-gray-100 dark:hover:bg-[#373636] px-4 py-2 rounded-md flex items-center space-x-2 text-sm cursor-pointer">
                                <i class="fa-solid fa-right-from-bracket text-xl"></i>
                                <span>Keluar</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
