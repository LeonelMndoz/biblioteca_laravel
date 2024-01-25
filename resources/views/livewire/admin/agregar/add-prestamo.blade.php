<!-- component -->
<div class="flex items-center justify-center p-12">
  <div class="mx-auto w-full max-w-[650px] bg-whit">
    <div>
      <h2 class="font-semibold text-xl text-gray-600">Realizar Prestamo</h2>
      <p class="text-gray-500 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias pariatur, quis laudantium vitae magnam expedita dolorum nesciunt sint beatae eius. Doloribus modi in, ullam laudantium sunt voluptatum minima amet dolores!</p>

      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-1">
          <div class="text-gray-600">
            <p class="font-medium text-lg mt-5">Informacion del prestamo a realizar</p>
          </div>

          <div class="lg:col-span-2 grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-2">

            <div class="md:col-span-2">
              <label for="name">Clave del libro correspondiente</label>
              <select wire:model="prestamo.ejemplare_id">
                <option value="">Selecciona un la clave del libro</option>
                @foreach ($ejempr as $libropr)
                <option value="{{ $libropr->id }}">{{ $libropr->clave }}</option>
                @endforeach
              </select>
            </div>


            <div class="md:col-span-2">
              <label for="name">Clave del libro correspondiente</label>
              <select wire:model="prestamo.user_id">
                <option value="">Selecciona al usuario</option>
                @foreach ($usuariopr as $usuariopr)
                <option value="{{ $usuariopr->id }}">{{ $usuariopr->name }}</option>
                @endforeach
              </select>
            </div>

            <label for="">Fecha de prestamo</label>
            <input wire:model="prestamo.fechaprestamo" class="md:col-span-2 w-full" type="date">


          </div>

          <div>
            <button wire:click="add_prestamo()" type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 mt-5 py-3 text-sm font-semibold leading-6 text-white shadow-sm md:col-span-2">Realizar Prestamo</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>