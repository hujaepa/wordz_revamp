<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bookmark;
class Bookmark extends Model
{
    use HasFactory;
    protected $table = "Bookmark";
    protected $guarded = [];
    public function users() {
        return $this->belongTo(User::class);
    }
}
