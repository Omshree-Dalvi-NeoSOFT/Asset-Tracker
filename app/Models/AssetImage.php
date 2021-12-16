<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetImage extends Model
{
    use HasFactory;
    protected $tabe="asset_images";
    public function asset(){
        return $this->belongsTo(Asset::class);
    }
}
