<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    const ROLE_MANAGER = 99;
    const ROLE_ADMIN = 1;
    const ROLE_SALE = 2;

    const IS_ACTIVE = 1;
    const IS_INACTIVE = 0;
    const RESET_PASSWORD_LIFE_TIME = 60;//minutes

    const ROLE_AVAILABLE = [User::ROLE_MANAGER, User::ROLE_ADMIN, User::ROLE_SALE];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $appends = [
        'role_name'
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lang',
        'name',
        'user_name', 'password', 'reset_password_code',
        'reset_password_code_at',
        'email', 'full_name', 'role_id', 'outlet_id', 'factory_id', 'phone', 'avatar', 'is_active', 'remember_token', 'created_at', 'updated_at'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];


    public function hasPermission($actionName): bool
    {
        $permissions = config("roles.permissions")[$this->role_id];
        if (is_null($permissions)) {
            return true;
        }

        $permissions = array_merge(config("roles.none_authorize_actions"), $permissions);
        if (in_array($actionName, $permissions)) {
            return true;
        }

        // If action name is a.b, we should check if user has permission a.*
        $actionArray = explode('.', $actionName);
        $key = $actionArray[0];
        $actionAllItem = count($actionArray) > 1 ? $key . ".*" : null;
        return in_array($actionAllItem, $permissions);
    }


    public static function isSuperAdmin($roleId): bool
    {
        if ($roleId != User::ROLE_MANAGER) {
            return false;
        }

        return true;
    }

    public static function isAdmin($roleId): bool
    {
        if ($roleId != User::ROLE_ADMIN) {
            return false;
        }

        return true;
    }

    public static function isSale($roleId): bool
    {
        if ($roleId != User::ROLE_SALE) {
            return false;
        }

        return true;
    }


    public static function rolesArr(): array
    {
        return [
            self::ROLE_MANAGER => 'Manager',
            self::ROLE_ADMIN => 'Admin',
            self::ROLE_SALE => 'Sale',
        ];
    }


    public function scopeFilterIndexData($query, $request)
    {

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('users.user_name', 'LIKE',getFuzzySearchText($request->search))
                    ->orWhere('users.email', 'LIKE',getFuzzySearchText($request->search))
                    ->orWhere('users.phone', 'LIKE',getFuzzySearchText($request->search));
            });
        }

        if ($request->has('role_id') && !empty($request->role_id) && in_array($request->role_id, array_keys(User::rolesArr()))) {
            $query->where('users.role_id', $request->role_id);
        }

        return $query;
    }

    public function getRoleNameAttribute()
    {
        $role = $this->role_id;
        $roleList = User::rolesArr();
        if (!in_array($role, self::ROLE_AVAILABLE)) {
            return "";
        }

        return $roleList[$role];
    }
}
