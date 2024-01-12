<div class="fixed z-50 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
    <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-transition:enter="ease-out duration-900"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative bg-gray-100 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
            <!--Cerrar modal-->
            <button wire:click="closeModalPopoverV3()" type="button"
                class="text-red-400 hover:text-red-500 focus:outline-none focus:text-red-500 transition ease-in-out duration-150">
                <svg class="h-6 w-6 animate-ping" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <!--Cerrar Modal-->
        </div>

        <!--VALIDACION-->
        <div class="w-full mt-3 text-center">
            @if (empty($portada)) <!--Valida si es null y declarado-->
                <div class="h-64 pt-24">
                    <img src="{{ asset('storage/LogoCategoria/sin-imagen.jpg') }}" class="w-42 h-32 animate-bounce">
                </div>
            @elseif(isset($portada)) <!--Valida si esta declarado-->
                <img src="{{ asset($portada) }}" class="w-1/2 " />
            @endif
        </div>
        <!--VALIDACION-->
    </div>
</div>