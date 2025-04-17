<div class="h-fit w-full p-4 bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
    <div class="pb-4 flex justify-between">
        <h3 class="text-lg font-semibold text-gray-600">
            Sejarah
        </h3>
    </div>

    {{-- form --}}
    <div wire:show='isShowForm' wire:cloak wire:transition
        class="mb-5 w-full bg-white backdrop-blur-md border border-gray-300 rounded-md shadow-md">
        <form wire:submit.prevent='handleSave'>
            <div class="px-4 py-3 flex justify-between items-center border-b border-gray-300">
                <h3 class="text-lg font-semibold text-gray-600 capitalize">
                    Edit {{ $formType }} Konten
                </h3>
                <div class="flex space-x-2 justify-end">
                    <button type="button" wire:click='handleCloseForm'
                        class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Batal
                        </span>
                        <span wire:loading wire:target='handleCloseForm'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                    <button type="submit"
                        class="text-white bg-secondary-green hover:bg-secondary-green focus:ring-2 font-medium rounded-md text-sm px-5 py-2.5 text-center inline-flex items-center">
                        <span>
                            Simpan
                        </span>
                        <span wire:loading wire:target='handleSave'
                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent ml-2">
                        </span>
                    </button>
                </div>
            </div>
            <div class="p-4">
                @if ($formType === 'visi')
                    <div class="w-full">
                        <div class="mb-4">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Visi</label>
                            <textarea id="description" rows="4" wire:model='visi'
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300  focus:outline-gray-400"
                                placeholder="Masukkan visi"></textarea>
                        </div>
                    </div>
                @else
                    <div class="w-full">
                        <div class="mb-3 w-full">
                            <label for="misi" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                Misi
                                <span class="text-xs text-red-500">
                                    *
                                </span>
                            </label>
                            @foreach ($misi as $index => $item)
                                <div class="flex items-center space-x-4 mb-2">
                                    <span class="text-sm text-gray-800 dark:text-gray-50 font-medium">
                                        {{ $index + 1 }}.
                                    </span>
                                    <div class="w-full">
                                        <input wire:model="misi.{{ $index }}" type="text" id="misi"
                                            class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 font-normal"
                                            placeholder="Masukkan misi {{ $index + 1 }}" />
                                    </div>
                                    @if (count($misi) > 1)
                                        <button wire:click="removeMisi({{ $index }})" type="button"
                                            wire:loading.remove wire:target='removeMisi({{ $index }})'
                                            class="text-rose-500 hover:text-rose-600">
                                            <i class="fa fa-solid fa-circle-xmark"></i>
                                        </button>
                                        <div wire:loading wire:target='removeMisi({{ $index }})'
                                            class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent">
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            <div class="mt-3 flex space-x-2 items-center">
                                <button wire:click='addMisi' type="button"
                                    class="px-4 py-2.5 flex items-center space-x-2 text-sm bg-gray-500 hover:bg-gray-600 text-gray-50 rounded-lg">
                                    <i class="fa fa-solid fa-circle-plus"></i>
                                    <span>Tambah</span>
                                </button>
                                <div wire:loading wire:target='addMisi'
                                    class="animate-spin rounded-full h-5 w-5 border-[2px] border-primary-gold border-t-transparent">
                                </div>
                            </div>
                            @error('misi')
                                <p class="text-red-500 text-xs mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>

    {{-- Display --}}
    <div class="mt-2 grid grid-cols-2 gap-3">
        <div class="p-8 border border-gray-300 rounded-lg shadow-md">
            <div class="space-y-5 relative">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-10 bg-secondary-green rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-800">Visi</h2>
                </div>
                @if ($formType !== 'visi')
                    <button type="button" wire:click='handleOpenForm("visi")'
                        class="absolute top-0 right-0 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-sm rounded-sm inline-flex items-center">
                        <i wire:loading.remove wire:target='handleOpenForm("visi")'
                            class="fa fa-pencil text-[11px] pr-1 text-gray-600 group-hover:text-white"></i>
                        <span wire:loading wire:target='handleOpenForm("visi")'
                            class="animate-spin rounded-full h-4 w-4 border-[2px] border-primary-gold border-t-transparent mr-2">
                        </span>
                        <span>
                            Edit
                        </span>
                    </button>
                @endif
                <p class="text-base text-gray-600 leading-relaxed pl-5">
                    {{ '"' . $visiData->content . '"' }}
                </p>
            </div>
        </div>
        <div class="p-8 border border-gray-300 rounded-lg shadow-md">
            <div class="space-y-5 relative">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-10 bg-secondary-green rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-800">Misi</h2>
                </div>
                @if ($formType !== 'misi')
                    <button type="button" wire:click='handleOpenForm("misi")'
                        class="absolute top-0 right-0 px-3 py-1.5 group border border-gray-600 hover:bg-gray-600 text-gray-600 hover:text-white text-sm rounded-sm inline-flex items-center">
                        <i wire:loading.remove wire:target='handleOpenForm("misi")'
                            class="fa fa-pencil text-[11px] pr-1 text-gray-600 group-hover:text-white"></i>
                        <span wire:loading wire:target='handleOpenForm("misi")'
                            class="animate-spin rounded-full h-4 w-4 border-[2px] border-primary-gold border-t-transparent mr-2">
                        </span>
                        <span>
                            Edit
                        </span>
                    </button>
                @endif
                <ul class="space-y-2 text-base text-gray-600 pl-6">
                    @foreach ($misiData as $misi)
                        <li class="flex items-start gap-2">
                            <span class="w-2 h-2 mt-2 bg-secondary-green rounded-full"></span>
                            <p>
                                {{ $misi->content }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
