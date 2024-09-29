<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="general">
        <form action="{{ url('login') }}" method="POST" id="formulario">
            @csrf
            <label for="username">Introduce tu nombre de usuario</label>
            <input type="text" name="username" id="username" style="width: 400px;"
                placeholder="Introduce el nombre de usuario" required>
            <label for="password">Introduce tu contraseña</label>
            <div class="password">
                <input type="password" name="password" id="password" placeholder="Introduce la contraseña" required>
                <button type="button" id="first">👀</button>
            </div>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <div>
            @if ($errors->any())
                <p id="errorMessage">{{ $errors->first() }}</p>
            @endif
        </div>
    </div>
    <script src="{{ asset('js/showPassword.js') }}"></script>
</body>

</html>