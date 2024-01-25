<!-- component -->
<div class="flex items-center justify-center p-12">
  <div class="mx-auto w-full bg-whit">
    <div>
      <h2 class="font-semibold text-xl text-gray-600">Agregar Libro</h2>
      <p class="text-gray-500 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias pariatur, quis laudantium vitae magnam expedita dolorum nesciunt sint beatae eius. Doloribus modi in, ullam laudantium sunt voluptatum minima amet dolores!</p>

      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-1">
          <div class="text-gray-600">
            <p class="font-medium text-lg mt-5">Detalles del libro</p>
          </div>

          <div class="lg:col-span-2 grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
            <div class="md:col-span-3">
              <label for="Título">Título</label>
              <input type="text" wire:model="milibro.titulo" name="Título" id="Título" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar título del libro" />
            </div>

            <div class="md:col-span-3">
              <label for="Autor">Autor</label>
              <input type="text" wire:model="milibro.autor" name="Autor" id="Autor" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar autor" />
            </div>

            <div class="md:col-span-2">
              <label for="añopublicacion">Año de publicación</label>
              <input type="number" wire:model="milibro.añopublicacion" name="añopublicacion" id="añopublicacion" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar año de publicación" />
            </div>

            <div class="md:col-span-2">
              <label for="editoria">Editorial</label>
              <input type="text" wire:model="milibro.editorial" name="editoria" id="editoria" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar la editorial correspondiente " />
            </div>

            <div class="md:col-span-2">
              <label for="existencia">Existencias</label>
              <input type="number" wire:model="milibro.existencia" name="existencia" id="existencia" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingresar la cantidad existente del titulo" />
            </div>
          </div>
<!--
          <div class="md:col-span-3">
              <label for="existencia">Portada</label>
              <input type="text" wire:model="milibro.portada" name="existencia" id="existencia" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="portada" />
            </div>
          </div>
-->
<div class="lg:col-span-2 grid gap-4 gap-y-2 text-sm grid-cols-2 md:grid-cols-2">
  <!-- First Section -->
  <div class="lg:w-full mb-6 md:col-span-1">
    <label class="mb-5 block text-xl font-semibold text-[#07074D]">
      <p class="font-medium text-lg mt-5">Agregar portada del libro</p>
    </label><br>
    <div class="mb-8">
      <input wire:model="portada" type="file" name="file_portada" id="file_portada" class="sr-only" />
      <label for="file_portada" class="relative w-full flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
        <div>
          <span class="mb-2 block text-xl font-semibold text-[#07074D]">Arrastra el archivo</span>
          <span class="mb-2 block text-base font-medium text-[#6B7280]">O</span>
          <span class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">Búscala en tu dispositivo</span>
        </div>
      </label>
    </div>
  </div>

  <!-- Second Section -->
  <div class="lg:w-full mb-6 md:col-span-1">
    <label class="mb-5 block text-xl font-semibold text-[#07074D]">
      <p class="font-medium text-lg mt-5">Agregar archivo pdf del libro</p>
    </label><br>
    <div class="mb-8">
      <input wire:model="pdf" type="file" name="file_pdf" id="file_pdf" class="sr-only" />
      <label for="file_pdf" class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
        <div>
          <span class="mb-2 block text-xl font-semibold text-[#07074D]">Arrastra el archivo</span>
          <span class="mb-2 block text-base font-medium text-[#6B7280]">O</span>
          <span class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">Búscala en tu dispositivo</span>
        </div>
      </label>
    </div>
  </div>
</div>



          
<div class="lg:col-span-2 grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-1">
    
    <button wire:click="guardar_libro()" type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 mt-5 mb-5 px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm md:col-span-3">AGREGAR LIBRO</button>
</div>



        </div>
      </div>
    </div>
  </div>
</div>
