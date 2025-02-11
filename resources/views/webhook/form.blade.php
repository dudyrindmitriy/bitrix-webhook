<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание лида</title>
</head>
<body>
    <h1>Создание лида</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('webhook.submit') }}" method="POST">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <button type="submit">Отправить</button>
    </form>
</body>
</html>