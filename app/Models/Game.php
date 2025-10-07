<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Game extends Model
{
    protected $fillable = ['title', 'description', 'release_date', 'platform', 'cover_img'];

    // This function gets the platform enum options from the database and caches them
    public static function getPlatformOptions(): array
    {
        static $cache = null; // so we only query once per request
        if ($cache !== null) return $cache;

        $type = DB::select("SHOW COLUMNS FROM games WHERE Field = 'platform'")[0]->Type;
        preg_match("/^enum\((.*)\)$/", $type, $matches);
        $values = str_getcsv(str_replace("'", "", $matches[1]));
        return $cache = $values;
    }
}
