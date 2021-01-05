
<div id="content" class="bg-blue-50 mt-24 w-full min-w-ful mx-5 pb-5">
    @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="border border-blue-800 bg-white flex flex-nowrap justify-between  mb-1 mx-5 p-3 shadow rounded-lg overflow-hidden">
        @component('components/searchs.search')
            @slot('var', 'search')
            @slot('dato', 'nombre')
        @endcomponent
        @component('components/buttons.btn_create')
            @slot('function', 'create()')
        @endcomponent
    </div>

    <div class="border border-blue-800 mx-5 bg-white shadow rounded-lg overflow-hidden ">
        <table class=" bg-white table-fixed text-left border-b ">
            <thead class="border-b  bg-green-50 -mx-3">
                <tr>
                    <th class=" py-2 w-1/16 text-center">ID</th>
                    <th class=" py-2 w-1/4">Nombre</th>
                    <th class=" py-2 w-1/2">Descripcion</th>
                    <th class=" py-2 w-1/2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ecosermyCharges as $ecosermyCharge)
                    <tr>
                        <td class="border-b px-3 py-3 text-center text-blue-900">{{$ecosermyCharge->id}}</td>
                        <td class="border-b px-4 py-3 text-sm text-blue-900">{{$ecosermyCharge->name}}</td>
                        <td class="border-b px-4 py-3 text-xs text-blue-900">{{$ecosermyCharge->description}}</td>
                        <td class="border-b px-4 py-3 flex justify-center flex flex-wrap">
                            @component('components/buttons.btn_edit')
                                @slot('function', "edit($ecosermyCharge->id)")
                            @endcomponent
                            @component('components/buttons.btn_delete')
                                @slot('function', "deleteModal($ecosermyCharge->id)")
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-white py-2 px-4 bg-green-50">
            {{$ecosermyCharges->links()}}
        </div>
    </div>
    @if($isOpen)
        @include('livewire.charges/modals/general-create')
    @endif
    @if($isOpenDelete)
        @include('livewire.charges/modals/general-delete')
    @endif
</div>

