<!-- component -->
<div class="flex items-center justify-center p-12">
  <div class="mx-auto w-full bg-whit">
    <div>
      <h2 class="font-semibold text-xl text-gray-600">Agregar Usuarios</h2>
      <p class="text-gray-500 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias pariatur, quis laudantium vitae magnam expedita dolorum nesciunt sint beatae eius. Doloribus modi in, ullam laudantium sunt voluptatum minima amet dolores!</p>

      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-1">
          <div class="text-gray-600">
            <p class="font-medium text-lg mt-5">Informacion del usuario</p>
          </div>

          <div class="lg:col-span-2 grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
            
            <div class="md:col-span-3">
              <label for="naame">Nombre Completo</label>
              <input type="text" wire:model="user_.name" name="naame" id="naame" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar nombre del usuario nuevo" />
            </div>

            <div class="md:col-span-3">
              <label for="email">Correo Electronico</label>
              <input type="email" wire:model="user_.email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresa correo electronico" />
            </div>

            <div class="md:col-span-3">
              <label for="password">Contraseña</label>
              <input type="password" wire:model="user_.password" name="password" id="password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar contraseña para usuario" />
            </div>
            <div class="md:col-span-3">
              <label for="apellidop">Apellido Parteno</label>
              <input type="apellidop" wire:model="user_.apellidop" name="apellidop" id="apellidop" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar el apellido paterno del usuario" />
            </div>
            <div class="md:col-span-3">
              <label for="apellidom">Apellido Materno</label>
              <input type="apellidom" wire:model="user_.apellidom" name="apellidom" id="apellidom" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar el apellido materno del usuario" />
            </div>
            <div class="md:col-span-3">
              <label for="telefono">Telefono</label>
              <input type="telefono" wire:model="user_.telefono" name="telefono" id="telefono" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar el telefono del usuario" />
            </div>
            <div class="md:col-span-3">
              <label for="direccion">Direccion</label>
              <input type="direccion" wire:model="user_.direccion" name="direccion" id="direccion" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar la direccion del usuario" />
            </div>

            <div class="md:col-span-3">
              <label for="direccion">Rol</label>
              <select wire:model="rol_user" name="" id="">
                <option value="">Seleciona el rol</option>
                @foreach ($roles as $rol)
                <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                @endforeach>
              </select>
            </div>
          </div>

          <div>
            <button wire:click="add_user()" type="button" class="flex w-full justify-center rounded-md bg-indigo-600 mt-5 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm ">Agregar Usuario</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
