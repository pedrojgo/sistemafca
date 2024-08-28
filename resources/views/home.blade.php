<x-app-layout>
    @vite(['resources/js/home.js', 'resources/css/app.css'])
    <div class="flex justify-between items-center text-white bg-app p-4 shadow-md">
        <div class="flex items-center space-x-4">
            <img width="48" src="{{ asset('/logofcatransparente.png') }}" alt="fca icon">
            <h1 class="text-lg font-bold">Sistema de Asistencias Laboratorios FCA</h1>
        </div>
        <div class="text-sm" id="date-time"></div>
    </div>
    <div class="flex w-full absolute">
        <div class="flex flex-col space-y-4 bg-white p-6 shadow-app h-[105vh]">
            <button 
                onclick="location.href='{{ route('studentsView') }}'"
                class="btn-custom px-10 md:px-12 lg:px-16 py-1 lg:py-2 text-white font-bold shadow-lg rounded-3xl"
            >
                Alumnos
            </button>
            <button 
                onclick="location.href='{{ route('assistanceView') }}'"
              class="btn-custom px-10 md:px-12 lg:px-16 py-1 lg:py-2 text-white font-bold shadow-lg  rounded-3xl"
            >
                Asistencias
            </button>
            <button 
             class="btn-custom px-10 md:px-12 lg:px-16 py-1 lg:py-2 text-white font-bold shadow-lg  rounded-3xl"
              onclick="location.href='{{ route('usersView') }}'"
            >
                Usuarios
            </button>
            <button 
            class="btn-custom px-10 md:px-12 lg:px-16 py-1 lg:py-2 text-white font-bold shadow-lg  rounded-3xl"
                  onclick="location.href='{{ route('categoriesView') }}'"
             >
              Categorías 
           </button>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button 
                 type="submit"
                 class="bg-red-600 px-10 md:px-12 lg:px-16 py-1 lg:py-2 text-white font-bold shadow-lg  rounded-3xl"
                >
            </form>
                cerrar seccion
            </button>
        </div>
        <div class="flex-1 mx-auto mb-5 md:p-6 lg:p-8 xl:p-10">
            <x-attendance-table :attendances="$attendances" />
            <div class="w-2/3 m-auto bg-white shadow-md rounded-xl p-4 mt-8">
                <h2 class="text-2xl mb-4">Generar Reporte</h2>
                <form action="{{ route('pdfView') }}" method="GET">
                    <div class="flex space-x-4 mb-4">
                        <input 
                            type="datetime-local" 
                            id="date_initial" 
                            name="date_initial" 
                            placeholder="Fecha inicial" 
                            class="flex-1 px-4 py-2 border border-gray-300 shadow-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        <input 
                            type="datetime-local" 
                            id="date_final" 
                            name="date_final" 
                            placeholder="Fecha final" 
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                    </div>
                    <button 
                        class="bg-green-500 text-white px-8 py-3 rounded-xl shadow-md hover:bg-green-600 transition-colors duration-200"
                    >
                        Generar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="fixed bottom-0 left-0 right-0 text-center py-4 bg-blue-600 text-white text-sm">
        © 2024 Sistema de Asistencias Laboratorios FCA
    </div>  
</div> 
</x-app-layout>