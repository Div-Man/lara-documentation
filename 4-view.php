<?php
 /*
  *в yield подгрузиться шаблон с названием
  * и в этом подгрузившемся шаблоном 
  * содержимое должно быть в @section
  * 
  * extends определяет, что этот шаблон расширяется (от этого)
  */
 
</nav>
        @yield('content') //будет искать шаблон, который назван content в аргументе @section
    </body>
</html>

////////////////////////////

@extends('layout')

@section('content')



<div class="container">
    <h1 align="center">My Gallery</h1>
</div>

@endsection
    
///////////////////////////////////////////////
         
 /*
 * В фигурных скобках обрабатыввается 
 * php код для его вывода
 * обрабатываются атак XSS
 * например, что бы такой код не сработал
 * <script>alert(1111)</alert>
 * теги заменятся на символы
 */

Hello, {{ $name }}.



Вы можете создавать инструкции if с помощью
@if, @elseif, @else и @endif .
Эти директивы работают одинаково с их PHP-образцами:



<ul class = "navbar-nav mr-auto">
    @if (Auth::check())
        <li class = "nav-item">
            <a class = "nav-link" href = "">
            {{ Auth::user()->name}} вы находитель в группе {{$userRole}}
            </a>
        </li>

        <li class = "nav-item">
            <a class = "nav-link" href = "/create">Добавить картинку</a>
        </li>
        <li class = "nav-item">
            <a href = "/logout"
            onclick = "event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                    "class = "nav-link">
            Выйти
            </a>
            <form id = "logout-form" action = "{{route('logout')}}" method = "POST" style = "display: none;">
            {{csrf_field()}}
            </form>
        </li>

    @else
        Привет {{$userRole}}
        <li class = "nav-item">
        <a class = "nav-link" href = "/login">Войти</a>
        </li>
    @endif
</ul>
                
                
////////////////////////////////////////
                
/* Можно использовать цикл */
                
 @foreach($imagesInView as $image)
      
        <div class="col-sm-3 gallery-item">
            <div>
                <img src="/{{$image->image}}" class="img-thumbnail">
                <p style="text-align: center;">{{$image->description}}<p>
            </div>
          <a href="/show/{{$image->id}}" class="btn btn-info my-button">Show</a>
          <a href="/edit/{{$image->id}}" class="btn btn-warning my-button">Edit</a>
          <a href="/delete/{{$image->id}}" onclick="return confirm('Точно удалить?')"class="btn btn-danger my-button">Delete</a>
        </div>
 @endforeach
              
              