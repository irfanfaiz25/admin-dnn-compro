<div
    class="h-fit w-full p-4 bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">
            Pencapaian
        </h3>
    </div>

    {{-- headline --}}
    <div class="mb-5 flex justify-center">
        <div class="border border-gray-300 dark:border-gray-700 min-w-1/2 rounded-md relative">
            @if ($isShowHeadlineForm)
                <form wire:submit.prevent='handleSaveHeadline' class="p-4">
                    <div class="mb-2">
                        <input type="text" id="productHeadlineTitle" wire:model='headlineTitle'
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-200 block w-full p-2.5"
                            placeholder="Judul">
                    </div>
                    <div class="mb-2">
                        <textarea id="productHeadlineSubtitle" rows="2" wire:model='headlineSubtitle'
                            class="block p-2.5 w-full text-sm text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-[#252525] rounded-md border border-gray-300 dark:border-gray-600 focus:outline-gray-400"
                            placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="mt-1 flex justify-end gap-1">
                        <button type="button" wire:click='handleCloseHeadlineForm'
                            class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                            Batal
                        </button>
                        <button type="submit"
                            class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                            Simpan
                        </button>
                    </div>
                </form>
            @else
                <div class="p-8 flex flex-col justify-center items-center text-center">
                    <h1 class="text-4xl font-bold font-display mb-1 dark:text-gray-100">
                        {{ $headline->title }}
                    </h1>
                    <div class="w-24 h-1.5 bg-primary-gold mt-5 mb-8 rounded-full"></div>
                    <p class="text-sm font-medium dark:text-gray-300">
                        {{ $headline->subtitle }}
                    </p>
                    <button wire:click='handleOpenHeadlineForm' type="button"
                        class="absolute top-1 right-1 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 dark:text-gray-300 hover:text-white text-xs rounded-sm inline-flex items-center">
                        <i wire:loading.remove wire:target="handleOpenHeadlineForm"
                            class="fa fa-pencil text-[11px] pr-1 text-gray-600 dark:text-gray-300 group-hover:text-white"></i>
                        <span wire:loading wire:target="handleOpenHeadlineForm"
                            class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                        </span>
                        <span>
                            Edit
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    @if (!$isShowContentForm)
        <div class="flex justify-end">
            <button type="button" wire:click='handleOpenContentForm'
                class="mb-2 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 dark:text-gray-300 hover:text-white text-xs rounded-sm inline-flex items-center">
                <i wire:loading.remove wire:target="handleOpenContentForm"
                    class="fa fa-pencil text-[11px] pr-1 text-gray-600 dark:text-gray-300 group-hover:text-white"></i>
                <span wire:loading wire:target="handleOpenContentForm"
                    class="animate-spin rounded-full h-3 w-3 border-[1px] border-primary-gold border-t-transparent">
                </span>
                <span>
                    Edit
                </span>
            </button>
        </div>
    @endif

    {{-- form --}}
    <div wire:show='isShowContentForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white dark:bg-[#252525] backdrop-blur-md border border-gray-300 dark:border-gray-700 rounded-md shadow-md">
        <form wire:submit.prevent='handleSaveContent'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 capitalize">
                    Edit Konten
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseContentForm'
                        class="text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Batal
                        </span>
                        <span wire:loading wire:target='handleCloseContentForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Simpan
                        </span>
                        <span wire:loading wire:target='handleSaveContent'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-3 gap-3">
                    <div class="">
                        <label for="branches"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Cabang <span
                                class="text-red-500">*</span></label>
                        <input type="number" id="branches" wire:model='branchCount'
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan jumlah cabang">
                        @error('branchCount')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="employees"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Karyawan <span
                                class="text-red-500">*</span></label>
                        <input type="number" id="employees" wire:model='employeeCount'
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan jumlah karyawan">
                        @error('employeeCount')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="customers"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-100">Customer <span
                                class="text-red-500">*</span></label>
                        <input type="number" id="customers" wire:model='customerCount'
                            class="bg-gray-50 dark:bg-[#252525] border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 text-sm rounded-md focus:outline-gray-400 block w-full p-2.5"
                            placeholder="Masukkan jumlah customer">
                        @error('customerCount')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Display --}}
    <div
        class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 border border-gray-300 dark:border-gray-700 p-4 rounded-md relative">
        @foreach ($stats as $stat)
            <div class="group hover:-translate-y-2 transition-all duration-300">
                <div
                    class="h-auto py-10 bg-white dark:bg-neutral-700 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 px-4 md:px-6 flex flex-col justify-center items-center relative overflow-hidden">
                    <div
                        class="{{ $stat['color'] }} h-16 w-16 rounded-full flex justify-center items-center transform group-hover:scale-110 transition-transform duration-300 mb-4">
                        <div
                            class="{{ $stat['iconColor'] }} transform group-hover:rotate-12 transition-transform duration-300">
                            <i class="{{ $stat['icon'] }}"></i>
                        </div>
                    </div>
                    <div class="relative z-10 text-center">
                        <h1 class="text-3xl md:text-4xl font-bold font-display text-gray-800 dark:text-gray-100 mb-1">
                            {{ $stat['count'] }}{{ $stat['suffix'] ?? '+' }}
                        </h1>
                        <p class="text-lg font-medium text-gray-600 dark:text-gray-300">
                            {{ $stat['label'] }}
                        </p>
                    </div>
                    <div
                        class="absolute -right-12 -bottom-12 w-48 h-48 bg-gray-100/50 dark:bg-neutral-800/50 rounded-full transform group-hover:scale-150 transition-transform duration-500">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
