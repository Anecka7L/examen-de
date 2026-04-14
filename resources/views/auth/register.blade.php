<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <style>
        input { display: block; margin: 10px 0; padding: 8px; width: 250px; }
       
    </style>
</head>
<body>
    <h2>Регистрация</h2>
    
    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    
    <form method="POST" action="/register">
        @csrf
        <input type="text" name="login" placeholder="Логин (латиница, цифры, >=6)" required>
        <input type="password" name="password" placeholder="Пароль (>=8)" required>
        <input type="text" name="full_name" placeholder="ФИО (кириллица)" required>
        <input type="text" name="phone" placeholder="8(XXX)XXX-XX-XX" required>
        <input type="email" name="email" placeholder="Email" required>
        <button onclick="alert('Проверьте правильность ввода!')">Зарегистрироваться</button>    
    </form>
    
    <p>Уже есть аккаунт? <a href="/login">Войти</a></p>
    
</body>
</html>