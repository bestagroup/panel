<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuPanel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'label', 'slug', 'icon'];

    public function submenus(): HasMany
    {
        return $this->hasMany(SubmenuPanel::class, 'menu_id');
    }
}
