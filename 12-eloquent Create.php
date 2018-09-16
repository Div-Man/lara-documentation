<?php

/*
 * Данные из базы, помещаются в коллекцию
 */
 
 /*
  * Сохранение методом save()
  */

 public function add($image, $description)
{
    $fileName = $image->store('uploads');
    $this->image = $fileName;
    $this->description = $description;
    $this->id_user = Auth::id();
}

$this->imageClass->add($image, $description);

$this->imageClass->save();

$idNewImage = $this->imageClass->id;


 /*
  * Тут будет добавление в то поле
  * которое указано ($this->description)
  */

 
/////////////////////////////////////////

/*
 * Для того что бы использовать метод create
 * обязательно нужно заполнить массив fillable
 * это обязательный поля для заполнения
 */

protected $fillable = ['image', 'description', 'id_user'];

   public function add($image, $description)
    {
        $fileName = $image->store('uploads');
       
        $post = self::create([
            'image' => $fileName,
            'description' => $description,
            'id_user' => Auth::id()
                ]);
        
       return $post->id;
    }

 $idNewImage = $this->imageClass->add($image, $description);
 dd($idNewImage ) //сюда вернётся id;

 
 ////////////////////////////////////////////////// 
 /*
  * Если использовать метод create
  * то Eloquent будет автоматически вставлять в бд строки
  * created_at и updated_at
  * Если эти данные не нужны, то можно их отменить
  * свойством $timestamps
  */
 
protected $fillable = ['name'];
public $timestamps = false;

Category::create($request->all());
 
/////////////////////////////////////

/*
 * Найти нужную запись 
 */

 $post = Image::find($id);
 
 /*
  * Найти все записи
  */
 
 $category = Category::all();
 
 /*
  * Удалить запись
  */
 
 $image = Image::find($id);
 $this->destroy($image->id);
 
 ////////////////////////////////////
 Category::find($id)->delete(); 
 
 /////////////////////////////////////////////
 DB::table('category_image')->where('image_id', $image->id)->delete();
 
 ////////////////////////////////////////
 
 /* Обновление */
 
 $category = Category::find($id);
 $category->update(['name' => $request->name]);
 
 /* Можно просто перезаписать*/
 
public function update(Request $request, $id)
{
    $imgOld = $this->imageClass::find($id);
    $imgOld->description = $request->description;
    $imgOld->save();
}
