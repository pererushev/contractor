<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;
    
    const TABLE = 'contractors';
    
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'inn',
        'email'
    ];

    public function id(): string
    {
        return (string) $this->id;
    }

    public function name(): string
    {
        return (string) $this->name;
    }
    public function inn(): string
    {
        return (string) $this->inn;
    }
    public function email(): string
    {
        return (string) $this->email;
    }
}
