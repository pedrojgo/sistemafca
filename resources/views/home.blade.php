<x-app-layout>
    @vite(['resources/css/home.css','resources/js/home.js'])
    <div class="header">
        <div class="title">
             <img width="48" src="{{ asset('/logofcatransparente.png') }}" alt="fca icon">
             <h1 class="text-base font-bold">Sistema de Asistencias Laboratorios FCA</h1>
        </div>
        <div  class="date-time text-sm" id="date-time"></div>
    </div>
    
    <div class="flex w-full 500">
        <div class="sidebar">
            <button 
             onclick="location.href='{{ route('userView') }}'"
             class="btn-custom px-6 py-3 text-white font-bold shadow-lg transition duration-300 ease-in-out transform hover:scale-95"
             >
                Alumnos
            </button>
            <button class="btn-custom px-6 py-3 text-white font-bold shadow-lg transition duration-300 ease-in-out transform hover:scale-95">
                Asistencias
            </button>
            <button class="btn-custom px-6 py-3 text-white font-bold shadow-lg transition duration-300 ease-in-out transform hover:scale-95">
                Usuarios
            </button>
        </div>

        <div class="w-3/4 mx-auto p-16">
          <x-attendance-table :attendances="$attendances" />

          <div class="w-2/3	 m-auto bg-white shadow-app rounded-xl p-6">
            <h2 class="text-2xl mb-2">Generar Reporte</h2>
            <form action="{{route('pdfView')}}" method="Get">
             <div class="flex space-x-4 mb-4">
                    <input type="datetime-local" id="date_initial" name="date_initial" placeholder="Fecha inicial" class="flex-1 px-4 py-2 border border-gray-300 shadow-lg rounded-xl">
                    <input type="datetime-local" id="date_final" name="date_final" placeholder="Fecha final" class="flex-1 px-4 py-2 border border-gray-300 rounded-xl shadow-lg ">
             </div>
             <button class="bg-green-400 text-white px-8 py-3  rounded-xl shadow-sm hover:bg-green-600">Generar</button>
            </form>
        </div>
        </div>
    </div>

    <div class="footer">
        © 2024 Sistema de Asistencias Laboratorios FCA
    </div>
</x-app-layout>