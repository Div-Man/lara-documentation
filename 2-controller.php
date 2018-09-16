<?php

/*
 * Что бы разгрузить логику в route
 * для этого можно использовать контроллер
 */


/*
 * Можно указывать дополнительные проверки
 */

Route::get('/create', 'imagesController@create')->middleware('user');


/*
 * Что бы быстро сделать типичный контроллер
 * для этого можно использовать композер с командой
 *  php artisan make:controller CategoriesController --resource 
 * он создаст типичный CRUD
 */


class CategoriesController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}


/////////////////////////////////////////////


/*
 * Контроллер может автоматически создавать объекты
 * с помощью инъекции в конструкторе
 */

class ImagesController extends Controller
{
    
    private $imageClass;
    private $role;
    
    public function __construct(Image $imageClass, User $role) { 
        $this->imageClass = $imageClass;
        $this->role = $role;
    }
    
     public function index()      
    {
        $userRole = $this->role->isRole();
            
       return view('welcome', [
           'userRole' => $userRole
               ]);
    }
}

////////////////////////////////

/*
 * Ещё имеются методы: post, put и delete
 */

/*post используется для отправки форм*/
Route::post('/store', 'imagesController@store');

/*put используется для обновления*/
 Route::put('/posts/update/{d}', 'PostsController@update')->name('posts.update');
 
 /*delete используется для удаления*/
 Route::delete('users/destroy/{d}', 'UsersController@destroy')->name('users.destroy');
