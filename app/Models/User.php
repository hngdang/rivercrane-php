<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    const STATUS_PUBLIC = 1;
    const STATUS_BLOCK = -1;

    protected $status = [
        1 => [
            'name' => 'Đang hoạt động',
            'class' => 'text-success'
        ],
        -1 => [
            'name' => 'Tạm khóa',
            'class' => 'text-danger'
        ]
    ];

    public function getStatus(){
        return Arr::get($this->status, $this->is_active);
    }

    public function group(){
        return $this->belongsTo(Group::class,'group_role');
    }
}
