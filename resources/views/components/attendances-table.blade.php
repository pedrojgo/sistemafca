@php
  $tableTitles = ['Nombre','Materia','Maestro','Laboratorio','Hora']   
@endphp

<div class="p-8 text-base ">
    <div class="card py-4 px-10 shadow-app rounded-3xl">
        <h3 class="text-2xl mb-2">Últimos registros</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-app">
                <tr class="px-6 py-3 text-center text-lg font-bold text-white uppercase tracking-wider">
                  @foreach($tableTitles as $title )
                    <th class="px-6 py-3">{{$title}}</th>
                  @endforeach
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-400">
                @foreach ($attendances as $attendance)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-base text-center">{{ $attendance->student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap  text-base text-center">{{ $attendance->material->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap  text-base text-center">{{ $attendance->teacher->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap  text-base text-center">{{ $attendance->lab->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap  text-base text-center">{{ $attendance->created_at }}</td>
                    </tr>
                @endforeach
                <div class="pagination">
                    {{ $attendances->links() }}
                </div>
            </tbody>
        </table>
    </div>
</div>
