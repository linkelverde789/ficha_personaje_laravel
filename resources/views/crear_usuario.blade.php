<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
<body>
<div class="general">
    <h2 style="color: rebeccapurple;">Registrar Usuario</h2>
    
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/usuarios') }}" method="POST">
        @csrf <!-- Token CSRF obligatorio para proteger la petición -->
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" required>
        <br><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" required>
        <br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br><br>

        <input type="submit" value="Registrar"></input>
    </form>
</div>
</body>
</html>
