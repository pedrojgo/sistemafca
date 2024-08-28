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
        <div class="w-full">
            <h2 class="text-5xl font-bold pl-20 mt-2">Categorías</h2>
            <div class="icon-container" id="button-open-modal">
            </div>

            <div class="grid grid-cols-3 gap-6 mt-10 px-20">

                <div class= "overflow-y-auto max-h-96 bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Maestros</h2>
                        <div id="teacher-open-add-modal" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 cursor-pointer">
                            <x-plus-icon />
                        </div>
                    </div>
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-app sticky -top-3.5 z-10">
                                <th class="px-4 py-2">Id</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($teachers as $t)
                                <tr>
                                    <td class="border px-4 py-2">{{ $t->id }}</td>
                                    <td class="border px-4 py-2">{{ $t->name }}</td>
                                    <td class="border px-4 py-2 flex justify-center align-center">
                                        <form action="{{ route('teachers.delete', $t->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este maestro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white p-2 rounded-full shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 cursor-pointer">
                                                <x-close-icon />
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="teacher-add-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">Agregar Maestro</h2>
                        <form action="{{ route('teachers.add') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                            </div>
                           

                            <div class="flex justify-end space-x-4">
                                <button type="button" id="teacher-close-add-modal" class="cancel bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-red-400">Cancelar</button>
                                <button type="submit" class="save bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-green-400">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table 2 -->
                <div class="overflow-y-auto max-h-96 bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Carreras</h2>
                        <div id="course-open-add-modal" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 cursor-pointer">
                            <x-plus-icon />
                        </div>
                    </div>
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-app sticky -top-3.5 z-10">
                                <th class="px-4 py-2">Id</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $c)
                                <tr>
                                    <td class="border px-4 py-2">{{ $c->id }}</td>
                                    <td class="border px-4 py-2">{{ $c->name }}</td>
                                    <td class="border px-4 py-2 flex justify-center align-center">
                                        <form action="{{ route('courses.delete', $c->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta Carrera?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white p-2 rounded-full shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 cursor-pointer">
                                                <x-close-icon />
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>

                
                <div id="course-add-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">Agrear Carrera</h2>
                        <form action="{{ route('courses.add') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                            </div>
                           

                            <div class="flex justify-end space-x-4">
                                <button type="button" id="course-close-add-modal" class="cancel bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-red-400">Cancelar</button>
                                <button type="submit" class="save bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-green-400">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table 3 -->
                <div class="overflow-y-auto max-h-96 bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Materia</h2>
                        <div id="materials-open-add-modal" class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 cursor-pointer">
                            <x-plus-icon />
                        </div>
                    </div>
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-app sticky -top-3.5 z-10">
                                <th class="px-4 py-2">Id</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materials as $s)
                                <tr>
                                    <td class="border px-4 py-2">{{ $s->id }}</td>
                                    <td class="border px-4 py-2">{{ $s->name }}</td>
                                    <td class="border px-4 py-2 flex justify-center align-center">
                                        <form action="{{ route('materials.delete', $s->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta Matertia?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white p-2 rounded-full shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 cursor-pointer">
                                                <x-close-icon />
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>

                 
                <div id="materials-add-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">Agregar Materia</h2>
                        <form action="{{ route('materials.add') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                            </div>
                           

                            <div class="flex justify-end space-x-4">
                                <button type="button" id="materials-close-add-modal" class="cancel bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-red-400">Cancelar</button>
                                <button type="submit" class="save bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-green-400">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="overflow-y-auto max-h-96 bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">Laboratorios</h2>
                        <div id="labs-open-add-modal" class=" bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 cursor-pointer">
                            <x-plus-icon />
                        </div>
                    </div>
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-app sticky -top-3.5 z-10">
                                <th class="px-4 py-2">Id</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($labs as $l)
                                <tr>
                                    <td class="border px-4 py-2">{{ $l->id }}</td>
                                    <td class="border px-4 py-2">{{ $l->name }}</td>
                                    <td class="border px-4 py-2 flex justify-center align-center">
                                        <form action="{{ route('labs.delete', $l->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta Matertia?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white p-2 rounded-full shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 cursor-pointer">
                                                <x-close-icon />
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>


                <div id="labs-add-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">Agregar Laboratorio</h2>
                        <form action="{{ route('labs.add') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                                <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                            </div>
                           

                            <div class="flex justify-end space-x-4">
                                <button type="button" id="labs-close-add-modal" class="cancel bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-red-400">Cancelar</button>
                                <button type="submit" class="save bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-green-400">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
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
  
    </div>
    <script>
        document.getElementById('teacher-open-add-modal').addEventListener('click', function() {
        document.getElementById('teacher-add-modal').classList.remove('hidden');
        });

        document.getElementById('teacher-close-add-modal').addEventListener('click', function() {
            document.getElementById('teacher-add-modal').classList.add('hidden');
        });

        document.getElementById('course-open-add-modal').addEventListener('click', function() {
        document.getElementById('course-add-modal').classList.remove('hidden');
        });

        document.getElementById('course-close-add-modal').addEventListener('click', function() {
            document.getElementById('course-add-modal').classList.add('hidden');
        });

        document.getElementById('materials-open-add-modal').addEventListener('click', function() {
        document.getElementById('materials-add-modal').classList.remove('hidden');
        });

        document.getElementById('materials-close-add-modal').addEventListener('click', function() {
            document.getElementById('materials-add-modal').classList.add('hidden');
        });

        document.getElementById('labs-open-add-modal').addEventListener('click', function() {
        document.getElementById('labs-add-modal').classList.remove('hidden');
        });

        document.getElementById('labs-close-add-modal').addEventListener('click', function() {
            document.getElementById('labs-add-modal').classList.add('hidden');
        });
    </script>
</x-app-layout>
