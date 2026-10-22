<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
    <h1>GESTOR DE TAREAS</h1>

    @if(session('success'))
        <p class="success"> {{ session('success') }} </p>
    @endif

    @if($errors->any())
        <div class="error">
            <p>Errores: </p>
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif


    <h2>Añadir tarea</h2>
    
   <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label for="title">Título</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            maxlength="100"
            required
        >

        <label for="description">Descripción</label>
        <textarea
            id="description"
            name="description"
            rows="3"
            maxlength="1000"
        >{{ old('description') }}</textarea>

        <button type="submit">Añadir tarea</button>
    
   </form> 


   <div class="list"></div>

    <h2>Lista de tareas</h2>

    @forelse($tasks as $task)
    
    <div class="task">
        <h3 class={{ $task->title }}></h3>
        <p>{{ $task->description ?: 'Tarea sin descripción' }}</p>
        <p>Estado:
            <strong class={{ $task->status }}>
                {{ $task->status === 'pending' ? 'Pendiente' : 'Completada' }}
            </strong> 
        </p>

        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
            @csrf
            @method('PUT')

            <button type="submit">
                {{ $task->status === 'pending' ? 'Completada' : 'Pendiente' }}
            </button>

        </form>
    </div>

    @empty
        <p>Aún no hay tareas</p>
    @endforelse

</body>
</html>