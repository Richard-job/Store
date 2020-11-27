<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    #region basic

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    #endregion

    #region accessors and mutators

    /**
    * Get the user's first name.
    *
    * @param  string  $value
    * @return string
    */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
    * Set the user's first name.
    *
    * @param  string  $value
    * @return void
    */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    /**
    * Get the user's last name.
    *
    * @param  string  $value
    * @return string
    */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
    * Set the user's last name.
    *
    * @param  string  $value
    * @return void
    */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtolower($value);
    }

    /**
    * Get the user's full name.
    *
    * @return string
    */
    public function getFullNameAttribute()
    {
        return ucwords("{$this->first_name} {$this->last_name}");
    }

    /**
    * Get the user's email.
    *
    * @param  string  $value
    * @return string
    */
    public function getEmailAttribute($value)
    {
        return ucfirst($value);
    }

    /**
    * Set the user's email.
    *
    * @param  string  $value
    * @return void
    */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
    * Get the user's email_verified_at.
    *
    * @param  datetime  value
    * @return datetime
    */
    public function getEmailVerifiedAtAttribute($value)
    {
        if(!is_null($value)){
            $date = new Carbon($value);
            return $date->format('d-m-Y H:i:s a');
        }
    }

    /**
    * Get the user's phone.
    *
    * @param  string  $value
    * @return string
    */
    public function getPhoneAttribute($value)
    {
        return ucfirst($value);
    }

    /**
    * Set the user's phone.
    *
    * @param  string  $value
    * @return void
    */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = strtolower($value);
    }


    /**
    * Get the user's is admin.
    *
    * @param  boolean  value
    * @return string
    */
    public function getIsAdminAttribute($value)
    {
        return ucfirst($value?'yes':'no');
    }

    /**
    * Get the user's created at.
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
    * Get the user's updated at.
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
    * Scope a query to order by asc first name users.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeByFirstNameAsc($query)
    {
        return $query->orderBy('first_name', 'asc');
    }

    /**
    * Scope a query to order by desc first name users.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeByFirstNameDesc($query)
    {
        return $query->orderBy('first_name', 'desc');
    }

    /**
    * Scope a query to order by asc last name users.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeByLastNameAsc($query)
    {
        return $query->orderBy('last_name', 'asc');
    }

    /**
    * Scope a query to order by desc last name users.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeByLastNameDesc($query)
    {
        return $query->orderBy('last_name', 'desc');
    }

    /**
    * Scope a query where is admin users is true.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeWhereIsAdminTrue($query)
    {
        return $query->where('is_admin', true);
    }

    /**
    * Scope a query where is admin users is false.
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeWhereIsAdminFalse($query)
    {
        return $query->where('is_admin', false);
    }

    #endregion

}
