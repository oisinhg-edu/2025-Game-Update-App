<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'founded', 'country', 'logo_img'];

    // developer can have many games
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
