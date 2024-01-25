<div>
    <!-- component -->
<!-- This is an example component -->
<div class="w-full mx-auto">
    
    <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci est aliquid quaerat maiores eveniet quos omnis itaque dolor reiciendis ex, nemo ipsam consectetur in maxime dolorum odit quisquam pariatur modi!<a class="text-blue-600 hover:underline" href="#" target="_blank">Flowbite Documentation</a>.</p>
        <div class="mb-6">
            <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Nombre de rol</label>
            <input wire:model="role" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nombre de rol" required="">
        </div>
        <div class="flex items-start mb-6">
        @foreach ($this->allPermisos as $key=> $allPermisos)
            <input type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded" value="{{$allPermisos->name}}" wire:model="permisos.{{$key}}"> <!--Evento-->
            <label for="remember" class="font-medium text-gray-900" >{{$allPermisos->name}}</label>
        @endforeach
        </div>
        <button wire:click="add_role()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Crear rol</button>
</div>

</div>
