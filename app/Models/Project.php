<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=["title", "slug", "author", "date", "preview"];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(){
        return "slug";
    }
}
