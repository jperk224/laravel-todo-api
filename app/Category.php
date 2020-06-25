<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    // primary key 'id' is assumed by Eloquent, as well as
    // created_at and updated_at fields for the todos table

    // Fields that are allowed mass assignment
    protected $fillable = [
        'category',
    ];

    // Category-Todo relationship
    public function todos() 
    {   
        return $this->hasMany(Todo::class);
    }
    
    // Eloquent won't automatically delete record relationships for
    // the record being deleted, we must manually do that before deleting the record
    // boot() function adapted from ivanhoe's stackoverflow post
    // https://stackoverflow.com/questions/14174070/automatically-deleting-related-rows-in-laravel-eloquent-orm
    public static function boot() {
        parent::boot();

        static::deleting(function($category) { // before delete() method call this
             $category->todos()->delete();
        });
    }
}
