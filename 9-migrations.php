<?php

/* Migrations - класс для работы с базой*/

/*Создание php artisan make:migration create_users_table */


/*
 * Класс миграции содержит два метода: up и down . 
 * Метод up используется для добавления новых таблиц, 
 * столбцов или индексов в вашу базу данных, тогда как 
 * метод down должен отменить операции, выполняемые методом up
 */

public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
    
    
    /* Запуск миграции  - php artisan migrate */
    
    
    
    ///////////////////////////////////////////
    
    
    /*
     * Чтобы отменить последнюю операцию миграции, 
     * вы можете использовать команду rollback . 
     * Эта команда откатывает последнюю «пакетную» миграции, 
     * которая может включать в себя несколько файлов миграции:
     */
    
    php artisan migrate:rollback 
        
    //////////////////////////////
        
      /* откатить несколько миграций */  
        
     php artisan migrate:rollback --step=5
            
    //////////////////////////////////
            
    /* Откатить все миграции */
    
    php artisan migrate:reset 
        
     
     //////////////////////////////////////////////////////
     
     Для добавление столбцов, используется метод table
     вместо create 
     
    class AddDesciptionToImages extends Migration
    {
    
        public function up()
        {
        Schema::table('images', function($table) {
            $table->string('description');
        });
    }

    public function down()
        {
        Schema::table('images', function($table) {
            $table->dropColumn('description');
        });
        }
     }

     
     /*
      * Значение по умолчанию
      */
     
      $table->string('image')->default('uploads/users/ava.png');

    
    