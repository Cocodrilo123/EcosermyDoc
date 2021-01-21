@extends('components.modals.modal_base')
@section('content')
    <div class="mb-4">
        <label class="block text-blue-900 text-sm font-bold mb-2">Nombre:</label>
        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-800"  placeholder="Ingrese el nombre" wire:model="name">
        @error('name') <span class="text-xs italic text-red-500">{{$message}}</span>@enderror
    </div>
    <div class="mb-4">
        <label class="block text-blue-900 text-sm font-bold mb-2">Descripcion:</label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-800" wire:model="description" placeholder="Ingrese la descripción"></textarea>
        @error('description') <span class="text-xs italic text-red-500">{{$message}}</span>@enderror
    </div>
@endsection
@section('buttons')
    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
        @component('components/buttons.btn_accept')
            @slot('function', 'store()')
        @endcomponent
    </span>
    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
        @component('components/buttons.btn_cancel')
            @slot('function', 'closeModal()')
        @endcomponent
    </span>
@endsection
