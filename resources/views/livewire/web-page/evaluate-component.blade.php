<div>
    <header class="header__evaluar">

        <div class="bg-blue-900 bg-opacity-50 absolute flex flex-col w-96 p-10 mt-48 ml-12 mr-12 md:mt-50 md:w-5/12">
            <h1 class="m-2 text-white underline text-4xl font-serif">
                Encontrar trabajo
            </h1>
            <input wire:model="search" type="search" placeholder="Empleo, palabra clave ..."
                class="border border-indigo-500 block bg-gray-200 focus:outline-none focus:bg-white focus:shadow-md text-gray-700 font-bold rounded-full h-13 mt-1 w-full md:w-full pl-4 pr-4 ">
            <p class="m-2 mb-8 text-2xl text-white text-justify sm:visible ">
                ¡Tenemos {{$callsCount}} ofertas de trabajo para ti!
            </p>
        </div>
    </header>
    <div class="bg-white-100">
        <div class="bg-white shadow-2xl mx-auto w-9/12 my-10">
            <h1 class="text-2xl p-10">Vacantes Disponibles</h1>

            <div class="flex flex-wrap px-10 pb-10 justify-between">
                @foreach($calls as $call)
                <div class="shadow-xl bg-white p-5 md:w-80 md:mb-0 my-2 mx-1 flex flex-col border border-indigo-300 rounded-xl">
                    <div class="flex-grow mb-4">
                        <h2 class=" text-xl title-font font-medium mb-3">{{$call->name}}</h2>
                        <p class="leading-relaxed text-sm text-justify">{{$call->description}}</p>
                    </div>
                    <button type="button" class="md:w-auto w-52 border border-blue-900 text-white  rounded-md px-4 py-2 m-2 transition duration-500 ease select-none bg-blue-900 hover:text-blue-900 hover:bg-white focus:outline-none focus:shadow-outline">
                        Postularme al puesto
                    </button>
                </div>
                @endforeach
            </div>

            <div class="bg-white py-2 px-4 bg-green-50">
                {{$calls->links()}}
            </div>
        </div>
    </div>
</div>
