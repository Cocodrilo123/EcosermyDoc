<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75">

            </div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
        </span>​

        <div class="inline-block border border-blue-900 align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white  px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
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
                </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
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
                </div>
            </form>
        </div>
    </div>
</div>
