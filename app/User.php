<?php

namespace App;

use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'password',
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

    public $timestamps = false;

    public function hasPermission($route){
        $routes = $this->routes();
        
        return in_array($route, $routes) ? true : false;
    }

    //các route đã được gán cho người dùng
    public function routes(){
        $data = [];
        foreach($this->getRoles as $role){
            $permission = json_decode($role->permissions);
            foreach ($permission as $per){
                if (!in_array($per,$data)) {
                    array_push($data, $per);
                }
            }
            
        }
        return $data;
    }

    public function getRoles(){
        return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
    }

    
}
