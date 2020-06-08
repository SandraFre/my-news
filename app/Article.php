<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Article
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $content
 * @property string|null $poster
 * @property int|null $user_id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article wherePoster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\User|null $author
 */
class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'poster',
        'user_id',
        'active',
    ];

    /**
     * @return HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
