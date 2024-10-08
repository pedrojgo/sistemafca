@php
  $tableTitles = ['Nombre', 'Materia', 'Maestro', 'Laboratorio', 'Hora']; 
@endphp

<x-app-layout>
    @vite('resources/css/assistances.css')
        <div class="header">
            <div class="logo-title">
                <img  width="48" src="{{ asset('/logofcatransparente.png') }}" alt="Logo">
                <h1>Sistema de Asistencias Laboratorios FCA</h1>
            </div>
            <div class="date-time" id="date-time"></div>
        </div>
        <div class="main-content">
            <div class="sidebar shadow-app">
                <div class="filters">
                <form action="{{ route('assistance-search') }}" method="GET">
                    @csrf
                    <label for="name" class="text-black pl-3">Nombre</label>
                    <input type="text" id="name" name="name" class="text-black pl-3">
                   
                    <label for="date-initial" class="text-black pl-3">Fecha inicial</label>
                    <input type="datetime-local" id="date-initial" name="date-initial" class="text-black pl-3">
                   
                    <label for="date-final" class="text-black pl-3">Fecha final</label>
                    <input type="datetime-local" id="date-final" name="date-final" class="text-black pl-3">
                   
                    <button type="submit">Buscar</button>
                    <button type="button" class="clear">Borrar filtros</button>
                    </form>
                </div>
            </div>
            <div class="content">
                <h2 class="text-5xl font-bold pl-20">Asistencias</h2>
                <div>
                    <div class="p-16 text-base">
                        <div class="card py-4 px-8 shadow-app">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-blue-500">
                                    <tr class="px-6 py-3 text-center text-lg font-bold text-white uppercase tracking-wider">
                                      @foreach($tableTitles as $title )
                                        <th class="px-6 py-3">{{$title}}</th>
                                      @endforeach
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-400">
                                    @foreach ($assistances as $assistance)
                                    <tr>
                                    <td>
                                            @if ($assistance->student)
                                            {{ $assistance->student->name }}
                                        @else
                                            <strong>sin Estudiante asignado</strong>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                                        @if ($assistance->material)
                                            {{ $assistance->material->name }}
                                        @else
                                            <strong>sin Materia asignada</strong>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                                        @if ($assistance->teacher)
                                            {{ $assistance->teacher->name }}
                                        @else
                                            <strong>sin profesor asignado</strong>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                                        @if ($assistance->lab)
                                            {{ $assistance->lab->name }}
                                        @else
                                            <strong>sin Laboratorio asignado</strong>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                                        @if ($assistance->created_at)
                                            {{ $assistance->created_at }}
                                        @else
                                            <strong>sin Fecha de ingreso </strong>
                                        @endif
                                    </td>
                                        </tr>
                                    @endforeach
                                    <div class="pagination">
                                        {{ $assistances->links() }}
                                    </div>
                                </tbody>
                            </table>
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
                <button class="text-base text-white m-4" onclick="location.href='{{ route('studentsView') }}'">
                    Alumnos
                </button>
                <button class="text-base text-white m-4"   onclick="location.href='{{ route('usersView') }}'">
                    Usuarios
                </button>
    
            </nav>
        </div>
    </div>
    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const date = now.toLocaleDateString('es-ES', options);
            const time = now.toLocaleTimeString('es-ES');
            document.getElementById('date-time').textContent = `${date} ${time}`;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime(); // Llamar de inmediato para evitar retraso en la actualización inicial

        document.querySelector('.clear').addEventListener('click', function() {
        document.getElementById('name').value = '';
        document.getElementById('date-initial').value = '';
        document.getElementById('date-final').value = '';
           
        // Redirigir a una ruta específica después de limpiar los filtros
        window.location.href = "{{ route('assistanceView') }}"; // Reemplaza 'ruta-deseada' por la ruta que desees
    });
    </script>
</x-app-layout>