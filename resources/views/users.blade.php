@php
    $tableTitles = ['Nombre', 'Email'];
@endphp

<x-app-layout>
    @vite(['resources/css/users.css','resources/js/users.js'])
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
                <form action="{{ route('user-search') }}" method="GET">
                <label class="pl-4 text-black" for="name">Nombre</label>
                <input class="text-black" type="text" id="name" name="name">

                <label  class="pl-4  text-black"for="email">Correo</label>
                <input  class="text-black"type="email" id="email" name="email">
                
                <button class="text-white" type="submit">Buscar</button>
                <button class="text-white clear" type="button">Borrar filtros</button>
                </form>
            </div>
        </div>
        <div class="content">
            <h2 class="text-5xl font-bold pl-14 ">Usuarios</h2>
            <div class="icon-container" id="button-open-modal">
                <div
                    class="bg-green-500 text-white font-bold py-5 px-5 rounded-full shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 mr-20 mt-10">
                    <x-plus-icon />
                </div>
            </div>

                <div class="text-base p-16">
                    <div class="card py-4 px-8 shadow-app">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-blue-500">
                                <tr class="px-6 py-3 text-center text-lg font-bold text-white uppercase tracking-wider">
                                    @foreach ($tableTitles as $title)
                                        <th class="px-6 py-3">{{ $title }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-400">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                                            {{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap  text-base text-center">
                                            {{ $user->email }}</td>
                                            <x-download-icon />
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>© 2024 Sistema de Asistencias Laboratorios FCA</p>
        <nav>
            <button class="text-base text-white m-4" onclick="location.href='{{ route('homeView') }}'">
                Dashboard
            </button>
            <button class="text-base text-white m-4" onclick="location.href='{{ route('assistanceView') }}'">
                Asistencias
            </button>
            <button class="text-base text-white m-4" onclick="location.href='{{ route('studentsView') }}'">
                Alumnos
            </button>
        </nav>
    </div>
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50  hidden">
        <div class="modal-content bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Registro de Usuarios</h2>
            <form action="{{ route('create-users') }}" method="POST">
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
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">contraseña</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button id="button-close-modal"
                        class="cancel bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-red-400">Cancelar</button>
                    <button type="submit"
                        class="save bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-green-400">
                        Guardar
                    </button>
                </div>
        </div>
    </div>
    <script>
        document.querySelector('.clear').addEventListener('click', function() {
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        window.location.href = "{{ route('usersView') }}";
    });
    </script>
</x-app-layout>
