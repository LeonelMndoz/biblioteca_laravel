<div class="fixed z-50 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
    <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-transition:enter="ease-out duration-900" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-gray-100 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
            <button wire:click="closeModalPopover()" type="button" class="text-red-400 hover:text-red-500 focus:outline-none focus:text-red-500 transition ease-in-out duration-150">
                <svg class="h-6 w-6 animate-ping" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="w-full mt-3 text-center">
            <h3 class="text-lg leading-6 font-bold text-gray-900">
                {{ __('EDITAR PRESTAMO') }}
                <br>
            </h3>
            <div class="mt-2">
                <div class="ml-10 mr-10 mb-10 mt-10">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-1">
                        <div>

                            <label for="fechadevolucion" class="block text-sm font-semibold leading-6 text-black">FECHA DE DEVOLUCIÓN</label>
                            <div class="mt-2.5">
                                <input type="date" wire:model="fechadevolucion" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                            </div>
                            <x-input-error for="fechadevolucion" />
                        </div>
                        <label for="fechaprestamo" class="block text-sm font-semibold leading-6 text-black">FECHA DE PRESTAMO</label>
                        <div class="mt-2.5">
                            <input type="date" wire:model="fechaprestamo" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
                        </div>
                        <x-input-error for="fechaprestamo" />
                    </div>

                    

                    <div class="md:col-span-2">
                        <label for="name">User</label>
                        <select wire:model="user_id">
                            <option value="">Selecciona</option>
                            @foreach ($usuario as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="md:col-span-2">
                        <label for="name">Clave de libro</label>
                        <select wire:model="ejemplare_id">
                            <option value="">Selecciona</option>
                            @foreach ($ejemplare as $e)
                            <option value="{{ $e->id }}">{{ $e->clave }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mt-10 flex justify-center">
                <span class="mr-2">
                    <button wire:click="closeModalPopover()" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Cancelar
                    </button>
                </span>
                <span wire:click="closeModalPopover()">
                    <button wire:click="storeEdit()" class="mb-2 md:mb-0 bg-green-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-600" wire:loading.attr="disabled">
                        Guardar
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
</div>