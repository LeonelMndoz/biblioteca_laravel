
<div class="fixed z-50 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
    <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-transition:enter="ease-out duration-900"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative bg-gray-100 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
            <button wire:click="closeModalPopover()" type="button"
                class="text-red-400 hover:text-red-500 focus:outline-none focus:text-red-500 transition ease-in-out duration-150">
                <svg class="h-6 w-6 animate-ping" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="w-full mt-3 text-center">
            <div class="flex items-center justify-center content-center">

                <span
                    class="mb-4 inline-flex justify-center items-center w-[82px] h-[82px] rounded-full border-4 border-blue-50 bg-blue-100 text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 flex items-center text-red-500"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>

            </div>
            <h3 class="text-lg leading-6 font-bold text-gray-900">
                {{ ('ELIMINAR USUARIO') }}
                <br>
                <a class="text-red-500">{{$name}}</a>
            </h3>
            <div class="mt-2">
                <div class="mt-3 text-gray-700">
                    {{ ('Esta Seguro?')}}
                </div>
                <div class="mt-10 flex justify-center">
                    <span class="mr-2">
                        <button wire:click="closeModalPopover()"
                            class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                            Cancelar
                        </button>
                    </span>
                    <span wire:click="closeModalPopover()">
                        <button wire:click="delete_user('{{ $id }}')"
                            class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Eliminar
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>