<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{

    #region basic

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    #endregion

    #region accessors and mutators

    /**
    * Get the category's name.
    *
    * @param  string  $value
    * @return string
    */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
    * Set the category's name.
    *
    * @param  string  $value
    * @return void
    */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

        /**
    * Get the category's created at.
    *
    * @param  datetime  $value
    * @return datetime
    */
    public function getCreatedAtAttribute($value)
    {
        $date = new Carbon($value);
        return $date->format('d-m-Y H:i:s a');
    }

    /**
    * Get the category's updated at.
    *
    * @param  datetime  $value
    * @return datetime
    */
    public function getUpdatedAtAttribute($value)
    {
        $date = new Carbon($value);
        return $date->format('d-m-Y H:i:s a');
    }

    #endregion

    #region scopes

    /**
    * Scope a query to order by asc name categories.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeByNameAsc($query)
    {
        return $query->orderBy('name', 'asc');
    }

    /**
    * Scope a query to order by desc name categories.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeByNameDesc($query)
    {
        return $query->orderBy('name', 'desc');
    }

    #endregion

    #region relationships

    /**
     * Get the sub catgories for the category.
     */
    public function subCategories()
    {
        return $this->hasMany('App\SubCategory');
    }

    #endregion

}
