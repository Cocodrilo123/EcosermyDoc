@extends('components.modals.modal_base')
@section('content')
    <div class="mb-2">
        <label class="block text-blue-900 text-sm font-bold mb-2">¿Seguro que desea eliminar a: ?:</label>
        <input type="text" disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-800" wire:model="last_name">
        @error('last_name') <span class="text-xs italic text-red-500">{{$message}}</span>@enderror
    </div>
@endsection
@section('buttons')
    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
        @component('components/buttons.btn_accept')
            @slot('function', 'delete()')
        @endcomponent
    </span>
    <span class="flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
        @component('components/buttons.btn_cancel')
            @slot('function', 'closeModalDelete()')
        @endcomponent
    </span>
@endsection
