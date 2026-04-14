<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <style>
        input { display: block; margin: 10px 0; padding: 8px; width: 250px; }
    </style>
</head>
<body>
    <h2>Авторизация</h2>
    
    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif
    
    <form method="POST" action="/login">
        @csrf
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form>
    
    <p>Нет аккаунта? <a href="/register">Зарегистрироваться</a></p>
</body>
</html>