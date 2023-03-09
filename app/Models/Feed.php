<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/** properties
 * @property string $feed_id
 * @property string $type
 * @property string $image
 * @property string $gradient
 * @property string $title
 * @property string $subtitle
 * @property string $time
 * @property timestamp $timestamp
 * @property timestamp $created_at = $this->timestamp
 * @property timestamp $updated_at = $this->timestamp
 */
class Feed extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_content';
    protected $table = 'feed';
    protected $fillable = [
        'feed_id',
        'type',
        'image',
        'gradient',
        'title',
        'subtitle',
        'time',
        'timestamp',
    ];
}
