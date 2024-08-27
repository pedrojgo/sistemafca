<x-app-layout>
    @vite(['resources/css/students.css', 'resources/js/students.js'])
    <div class="header">
        <div class="logo-title">
            <img  width="48" src="{{ asset('/logofcatransparente.png') }}" alt="Logo">
            <h1>Sistema de Asistencias Laboratorios FCA</h1>
        </div>
        <div class="date-time" id="date-time"></div>
    </div>
    <div class="main-content">
        <div class="sidebar">
            <div class="filters">
                <form action="{{ route('students-search') }}" method="GET">
                 @csrf
                <label for="name" class="text-black font-bold p-2">Nombre</label>
                <input type="text" id="filtro-name" name="name">
            
                <label for="email" class="text-black font-bold p-2">Correo</label>
                <input type="email" id="filtro-emial" name="email">
                
                <label for="carrera" class="text-black font-bold p-2">Carrera:</label>
                <select id="filtre-course_id" name="course_id"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Selecciona una carrera</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            
                <button type="submit">Buscar</button>
                <button type="button" class="clear">Borrar filtros</button>
            </form>
            </div>
        </div>
        <div class="content">
            <h2 class="text-5xl font-bold pl-20 ">Alumnos</h2>
            <div class="icon-container" id="button-open-modal">
                <div
                    class="bg-green-500 text-white font-bold py-5 px-5 rounded-full shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 mr-20 mt-10">
                    <x-plus-icon />
                </div>
            </div>
            <x-students-table :students="$students" />
        </div>
    </div>
    <div class="footer">
        <p class="text-white">© 2024 Sistema de Asistencias Laboratorios FCA</p>
        <nav>
            <button class="text-base text-white m-4" onclick="location.href='{{ route('homeView') }}'">
                Dashboard
            </button>
            <button class="text-base text-white m-4" onclick="location.href='{{ route('assistanceView') }}'">
                Asistencias
            </button>
            <button class="text-base text-white m-4">
                Usuarios
            </button>

        </nav>
    </div>
    </div>
    <div id="modal" class="modal fixed inset-0  items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="modal-content bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Registro de Alumnos</h2>
            <form action="{{ route('create-student') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nombre-completo" class="block text-sm font-medium text-gray-700 mb-1">Nombre
                        completo:</label>
                    <input type="text" id="nombre-completo" name="name"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo
                        Electrónico:</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="mb-4">
                    <label for="carrera" class="block text-sm font-medium text-gray-700 mb-1">Carrera:</label>
                    <select id="carrera" name="course_id"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        required>
                        <option value="">Selecciona una carrera</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button id="button-close-modal"
                        class="cancel bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-red-400">Cancelar</button>
                    <button type="submit"
                        class="save bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-green-400">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.querySelector('.clear').addEventListener('click', function() {
            document.getElementById('filtro-name').value = '';
            document.getElementById('filtro-emial').value = '';
            document.getElementById('filtre-course_id').value = '';
            window.location.href = "{{ route('studentsView') }}";
        });
    </script>
</x-app-layout>
