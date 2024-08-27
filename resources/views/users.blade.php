@php
    $tableTitles = ['Nombre', 'Email'];
@endphp

<x-app-layout>
    @vite('resources/css/users.css')
    @vite('resources/js/users.js')
    <div class="header">
        <div class="logo-title">
            <img src="logofcatransparente.png" alt="Logo">
            <h1>Sistema de Asistencias Laboratorios FCA</h1>
        </div>
        <div class="date-time" id="date-time"></div>
    </div>
    <div class="main-content">
        <div class="sidebar">
            <div class="filters">
                <label for="fecha-inicial">Fecha inicial</label>
                <input type="date" id="fecha-inicial" name="fecha-inicial">
                <label for="fecha-final">Fecha final</label>
                <input type="date" id="fecha-final" name="fecha-final">
                <button type="button">Buscar</button>
                <button type="button" class="clear">Borrar filtros</button>
            </div>
        </div>
        <div class="content">
            <h2 class="text-5xl font-bold pl-20 ">Usuarios</h2>
            <div class="icon-container" id="button-open-modal">
                <div
                    class="bg-green-500 text-white font-bold py-5 px-5 rounded-full shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 mr-20 mt-10">
                    <x-plus-icon />
                </div>
            </div>

            <div class="table-container">
                <div class="p-16 text-base">
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
                    @vite('resources/js/btn-download-code.js')
                </div>
            </div>
        </div>
    </div>
            </div>
            <
        </div>
    </div>
    <div class="footer">
        <p>© 2024 Sistema de Asistencias Laboratorios FCA</p>
        <nav>
            <button class="text-base text-white m-4" onclick="location.href='{{ route('homeView') }}'">
                Dashboard
            </button>
            <button class="text-base text-white m-4" onclick="location.href='{{ route('homeView') }}'">
                Asistencias
            </button>
            <button class="text-base text-white m-4" onclick="location.href='{{ route('homeView') }}'">
                Usuarios
            </button>
        </nav>
    </div>
    <div id="modal" class="modal fixed inset-0  items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="modal-content bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Registro de Usuarios</h2>
            {{-- <form action="{{ route('create-user') }}" method="POST"> --}}
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
</x-app-layout>
