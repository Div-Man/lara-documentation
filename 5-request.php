<?php

/* Request - отправленные данные с формы */


/*
 * Что бы получить данные нужного поля
 * можно использовать метод input
 * у экземпляра Request
 */

public function store(Request $request)
{
    $name = $request->input('name');
    
    /* другой способ */
    
    $name = $request->name;
    
}


/* Получение всех данных, кроме файлов */

$input = $request->all(); 

//////////////////////////////////////////////


/* Проверить, отправились ли данные нужного поля*/

if ($request->has('name')) { } 

if ($request->has(['name', 'email'])) { } 

///////////////////////////////////////////

/* Получение старого ввода */

 $username = $request->old('username'); 
 
 //////////////////////////////////////////////////////
 
  
  