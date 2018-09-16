<?php

/* Middleware - дополнительный проверки*/


/* Создание - php artisan make:middleware CheckAge 
 * Создаться в папке app/Http/Middleware
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            return $next($request);
        }
        abort(404); //Вызов ошибки
    }
}


/*Что бы добавить эту проверку, для конкретного роута
 * надо этот класс добавить в массив $routeMiddleware (app/Http/Kernel.php)
 */

protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'user' =>  \App\Http\Middleware\UserMiddleware::class,
        
    ];

/* Вызов */

/* Теперь страница для создания статьи, 
 * откроется только для авторизированнного пользователя 
 */

Route::get('/create', 'imagesController@create')->middleware('user');

/////////////////////////////////////////////

/* Ещё пример, проверка на админа */

class AdminOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user == null){
             abort(404);
        }
          if($user != null){
            if ($user->role !== "admin") {
             abort(404);
            }
        }
        
         return $next($request);

    }
}


/* protected $routeMiddleware */
'admin' =>  \App\Http\Middleware\AdminOnlyMiddleware::class


/* Вызов */

Route::group(['as' => 'admin.', 'namespace'=>'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function() {
     Route::get('categories/edit/{d}', 'CategoriesController@edit')->name('categories.edit');
     Route::put('categories/update/{d}', 'CategoriesController@update')->name('categories.update');
     Route::delete('categories/destroy/{d}', 'CategoriesController@destroy')->name('categories.destroy');
    });
}
