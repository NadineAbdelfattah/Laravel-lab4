<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 * @method static create(array $all)
 */
class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;


    protected $fillable = [
        'title',
        'description',
        'post_creator',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'post_creator');
    }


    public function sluggable(): array
    {
        return [
           'slug' => [
               'source' => 'title'
           ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
