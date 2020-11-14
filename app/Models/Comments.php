<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Comments
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comments query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $news_id
 * @property string $comment_body
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comments whereCommentBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comments whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comments whereUserId($value)
 */
class Comments extends Model
{
     protected $table = 'comments';
     protected $fillable = [ 'user_id', 'news_id', 'comment_body' ];
     public $timestamps = false;
}
