<div wire:keydown.escape="closeModal()" wire:keydown.escape="closeModalDelete()" wire:keydown.enter="store()" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75">
            </div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">
        </span>​
        <div class="inline-block border border-blue-900 align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form >
                <div class="bg-white m-4 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    @yield('content')
                </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    @yield('buttons')
                </div>
            </form>
        </div>
    </div>
</div>