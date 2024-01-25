<div>

            <button wire:click="$set('open', true)" class="flex justify-center rounded-md bg-green-600 w-full mt-5 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm ">Registrar claves</button>



        <x-dialog-modal wire:model="open" class="fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
            style="background: rgba(0,0,0,.7);">
            <x-slot name="title">
                Registrar clave del libro
            </x-slot>
            <x-slot name="content">
                <x-label value="Ingresar clave del libro unico"/>
                <x-input wire:model="ejemplar.clave" type="text" class="w-full" />
                <x-label value="Seleccina el nombre del libro"/>
                
                <select wire:model.defer="ejemplar.librodetalle_id">
                    <option value="">Selecciona un libro</option>
                    @foreach ($mislibros as $libro)
                        <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                    @endforeach
                </select>


            </x-slot>
            <x-slot name="footer">
            <button wire:click="add_ejemplar" class="flex justify-center rounded-md bg-green-600 mt-5 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm ">Registrar ejemplar</button>
            </x-slot>
        </x-dialog-modal>
</div>

