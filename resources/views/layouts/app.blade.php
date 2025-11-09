<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CRUD Estudiantes</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
  <!-- Navbar -->
  <nav class="bg-blue-600 text-white px-6 py-3 shadow-md">
    <div class="max-w-5xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold">CRUD Estudiantes</h1>
      <a href="{{ route('students.index') }}" class="hover:underline">Inicio</a>
    </div>
  </nav>

  <!-- Contenido -->
  <main class="flex-1 p-6 max-w-5xl mx-auto">
    {{-- Mensajes flash y errores (opcional, recomendado) --}}
    @if (session('success'))
      <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
      <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
      </div>
    @endif

    @yield('content')
  </main>

  <footer class="bg-blue-600 text-white text-center py-3">
    Laravel 12 + Tailwind · {{ date('Y') }}
  </footer>
</body>
</html>
