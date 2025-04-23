<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubmenuPanel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'label', 'menu_id', 'user_id'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(MenuPanel::class, 'menu_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function permissions(): hasMany
    {
        return $this->hasMany(SubmenuPermission::class);
    }
}
