<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SubCategory extends Model
{

    #region basic

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id'
    ];

    #endregion

    #region accessors and mutators

    /**
    * Get the sub category's name.
    *
    * @param  string  $value
    * @return string
    */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
    * Set the sub category's name.
    *
    * @param  string  $value
    * @return void
    */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

        /**
    * Get the sub category's created at.
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
    * Get the sub category's updated at.
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
    * Scope a query to order by asc name sub categories.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeByNameAsc($query)
    {
        return $query->orderBy('name', 'asc');
    }

    /**
    * Scope a query to order by desc name sub categories.
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
     * Get the category that owns the sub category.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    #endregion

}
