<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'image',
    ];

    public function profileImage()
    {

        $imagePath = ($this->image) ? $this->image : 'profile/6Jp3vtSYPhm3hPTpowoEDYykUMAevFXPKsloU9vM.png';
        return '/storage/' . $imagePath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
