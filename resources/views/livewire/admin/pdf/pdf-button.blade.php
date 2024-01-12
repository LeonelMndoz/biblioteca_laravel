
<button wire:click="openModalPopoverV4({{ $id }})" wire:key="'showpdf-{{ $id }}'" class="p-1 text-blue-600 rounded hover:bg-blue-600 hover:text-white">
    <i class="fas fa-file-pdf text-xl"></i>
</button>
@if ($open3)
    @if ($ID3 == $id)
            @include('livewire.admin.pdf.contenido')
    @endif
@endif