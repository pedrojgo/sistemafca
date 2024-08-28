@php
  $tableTitles = ['Nombre','Email','Carrera']   
@endphp

<div class="p-16 text-base">
    <div class="card py-4 px-8 shadow-app">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-500">
                <tr class="px-6 py-3 text-center text-lg font-bold text-white uppercase tracking-wider">
                    @foreach($tableTitles as $title )
                    <th class="px-6 py-3">{{$title}}</th>
                    @endforeach
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-400">
                @foreach ($students as $student)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                        @if ($student->name)
                            {{ $student->name }}
                        @else
                            <strong>sin Nombre asignado</strong>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                        @if ($student->email)
                        {{ $student->email }}
                        @else
                            <strong>sin Email asignado</strong>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-center">
                        @if ($student->course)
                        {{ $student->course->name }}
                        @else
                            <strong>sin Carrea asignado</strong>
                        @endif
                    </td>
                    <td class="px-6 py-4 flex gap-4 justify-center align-baseline">
                        <button 
                           class="download-button-code p-3 bg-blue-500 rounded-full"
                           data-param-id-user="{{ $student->id ?? '' }}"
                           data-param-name="{{ $student->name ? $student->name . '-uid' : '' }}"
                        >
                            <x-download-icon />
                        </button>
                    </td>
                    </tr>
                    @endforeach
                    <div class="pagination">
                        {{ $students->links() }}
                    </div>
                </tbody>
            </table>
        </div>
        @vite('resources/js/btn-download-code.js')
</div>
