<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetImage extends Model
{
    use HasFactory;
    protected $table="asset_images";
    protected $fillable=['aid'];
    public function asset(){
        return $this->belongsTo(Asset::class);
    }

}
