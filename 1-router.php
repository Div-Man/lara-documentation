<?php

/** Route - путиводитель */


/** У этого компонента, есть метод get 
 * который отрабатывает по адресу (URL).
 * Первый аргумент, должен быть адресом,
 * второй функцией
*/

Route::get('/', 'imagesController@index');


/*
 * Ещё можно передавать аргументы, 
 * которые будут находиться в скобках
 */

Route::get('/edit/{id}', 'imagesController@edit');

//////////////////////////////////////////////////////

/*
 * Ещё можно именовать маршруты, для того, что бы
 * использовать хелпер route
 */

 Route::get('/posts/create', 'PostsController@create')->name('posts.create');
 
 /*
  * <a href="{{route('posts.create')}}" class="btn btn-success">Добавить</a>
  */


///////////////////////////////////////////////////////
 
 /*
  * Если есть много маршрутов
  * у которых название начинается одинаково
  * их можно группировать
  */
 
 Route::group(['as' => 'admin.', 'namespace'=>'Admin', 'prefix' => 'admin'], function() {
	Route::get('/', 'HomeController@index');
        Route::get('/posts', 'PostsController@index')->name('posts');
        Route::delete('/posts/{d}', 'PostsController@destroy');
  
});



