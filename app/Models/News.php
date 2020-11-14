<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\News
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $category
 * @property string $title
 * @property string $body
 * @property int $likes
 * @property string $img_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereTitle($value)
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereSlug($value)
 */
class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';


}
