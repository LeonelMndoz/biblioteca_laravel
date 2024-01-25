
<button wire:click="openModalPopover({{ $id }})" wire:key="'showpdf-{{ $id }}'" class="p-1 text-red-600 rounded hover:bg-blue-600 hover:text-white">
    <i class="fas fa-trash-alt text-xl"></i>
</button>
@if ($open)
    @if ($ID == $id)
            @include('livewire.admin.eliminar.eliminar-ejemplar')
    @endif
@endif
