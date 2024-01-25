@can('Editar libro')
    <button wire:click="delete_libro({{ $id }})" wire:key="'delete_role-{{ $id }}'"
        class="p-1 text-red-600 rounded hover:bg-blue-600 hover:text-white">
        <i class="fas fa-trash-alt text-xl"></i>
    </button>
    @if ($open)
        @if ($ID == $id)
            @include('livewire.admin.eliminar.eliminar-libro')
        @endif
    @endif
@endcan
@can('Eliminar libro')
    <button wire:click="edit_libro({{ $id }})" wire:key="'edit-'{{ $id }}"
        class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded"><svg class="w-5 h-5" fill="currentColor"
            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
            </path>
        </svg></button>
    @if ($open1)
        @if ($ID1 == $id)
            @include('livewire.admin.editar.editar-libro')
        @endif
    @endif
@endcan
