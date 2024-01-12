<button wire:click="openModalPopoverV3({{ $id }})" wire:key="'showImag-{{ $id }}'" class="p-1 text-blue-600 rounded hover:bg-blue-600 hover:text-white">
    <i class="fas fa-image text-xl"></i></button>
@if ($open2)
    @if ($ID2 == $id)
            @include('livewire.admin.img.portada')
    @endif
@endif