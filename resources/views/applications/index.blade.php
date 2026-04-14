<!DOCTYPE html>
<html>
<head>
    <title>Мои заявки</title>
    
</head>
<body>
    <div class="header">
        <h2 style="display: inline-block;">Мои заявки</h2>
        
        <a href="/logout" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="float: right;">
            Выйти
        </a>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    
    <a href="/applications/create">+ Новая заявка</a>
    
    @foreach($applications as $app)
        <div class="app">
            <h3>{{$app->course_name}}</h3>
            <p>Дата: {{$app->start_date}} | Статус: {{$app->status}} | Оплата: {{$app->payment_method}}</p>
            @if(!$app->review)
                <form method="POST" action="/applications/{{$app->id}}/review">
                    @csrf
                    <textarea name="review" placeholder="Ваш отзыв"></textarea>
                    <button>Оставить отзыв</button>
                </form>
            @else
                <p>Отзыв: {{$app->review}}</p>
            @endif
        </div>
    @endforeach
</body>
</html>