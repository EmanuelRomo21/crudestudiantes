@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold tracking-tight">Estudiantes</h2>
            <p class="text-gray-500 text-sm">Instituto Tecnológico de Aguascalientes</p>
        </div>
        <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Nuevo</a>
    </div>

    <form method="GET" action="{{ route('students.index') }}" class="mb-4">
        <input type="text" name="q" placeholder="Buscar por nombre o No. Control" value="{{ request('q') }}" class="w-1/3 border rounded px-3 py-2">
        <button type="submit" class="ml-2 bg-gray-700 text-white px-3 py-2 rounded">Buscar</button>
    </form>

    @if($noResults)
        <p class="text-center text-gray-500 mt-4">No se encontraron registros que coincidan con la búsqueda.</p>
    @elseif($students->isEmpty())
        <p class="text-center text-gray-500 mt-4">No hay estudiantes registrados.</p>
    @else
        <table class="min-w-full border text-sm">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">No. Control</th>
                    <th class="px-4 py-2 border">Carrera</th>
                    <th class="px-4 py-2 border">Semestre</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $student->nombre }}</td>
                    <td class="px-4 py-2 border">{{ $student->numero_control }}</td>
                    <td class="px-4 py-2 border">{{ $student->career->nombre }}</td>
                    <td class="px-4 py-2 border">{{ $student->semestre }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('students.edit', $student) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este estudiante?')" class="text-red-600 hover:underline ml-2">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
