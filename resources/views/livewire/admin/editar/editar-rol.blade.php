<div class="fixed z-50 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
    <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-transition:enter="ease-out duration-900" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative bg-gray-100 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
            <button wire:click="closeModalPopover1()" type="button" class="text-red-400 hover:text-red-500 focus:outline-none focus:text-red-500 transition ease-in-out duration-150">
                <svg class="h-6 w-6 animate-ping" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="w-full mt-3 text-center">
            <h3 class="text-lg leading-6 font-bold text-gray-900">
                {{ __('EDITAR PERMISOS') }}
                <br>
            </h3>
            <div class="">
                <div class="flex flex-col items-center justify-center">
                        <div class="flex flex-col">

                        @foreach ($this->allPermisos as $key=> $allPermisos)
                        <label class="inline-flex items-center mt-3">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" value="{{$allPermisos->name}}"><span class="ml-2 text-gray-700">{{$allPermisos->name}}</span>
            </label>
            @endforeach
                    </div>
                </div>
                <div class="mt-10 flex justify-center">
                    <span class="mr-2">
                        <button wire:click="closeModalPopover1()" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                            Cancelar
                        </button>
                    </span>
                    <span wire:click="closeModalPopover1()">
                        <button wire:click="storeEdit()" class="mb-2 md:mb-0 bg-green-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-600" wire:loading.attr="disabled">
                            Guardar
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>



<!--

    
    <div class="flex items-start mb-6">
        @foreach ($this->allPermisos as $key=> $allPermisos)
            <input type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded" value="{{$allPermisos->name}}" wire:model="permisos.{{$key}}"> Evento
            <label for="remember" class="font-medium text-gray-900" >{{$allPermisos->name}}</label>
        @endforeach
</div>
-->



