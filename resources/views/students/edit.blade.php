@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4 text-center">Editar Estudiante</h2>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $student->nombre) }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">No. Control</label>
            <input type="text" name="numero_control"
                   inputmode="numeric" pattern="\d{6,12}" maxlength="12"
                   title="Debe ser un número de entre 6 y 12 dígitos"
                   value="{{ old('numero_control', $student->numero_control) }}"
                   required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Carrera</label>
            <select name="career_id" required class="w-full border rounded px-3 py-2">
                @foreach($careers as $career)
                    <option value="{{ $career->id }}" {{ $career->id == $student->career_id ? 'selected' : '' }}>
                        {{ $career->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Semestre</label>
            <input type="number" name="semestre" min="1" max="12" required value="{{ old('semestre', $student->semestre) }}" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full">Actualizar</button>
    </form>
</div>
@endsection
