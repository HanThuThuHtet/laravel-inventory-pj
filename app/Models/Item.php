<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    //protected $table = "items"; //incase table is not plural
    protected $fillable = ["name","price","stock"]; //must include when using model static method create()
}
//php artisan make:model Item => model name=>singular
//mysql -u root
//create database inventory_project;
//fill db in .env
//database/migrate (manipulating tables)
//php artisan make:migration create_items_table => plural
//=>run migration
//php artisan migrate
//php artisan migrate:fresh => empty


//php artisan make:controller CategoryController --resource
//Route::resource('category', CategoryController::class);
//view -> categroy -> 4 blade
//php artisan make:model Category -m    //m->migration
//migrate -> add column
//php artisan migrate
//php artisan migrate:status
//php artisan migrate:fresh
