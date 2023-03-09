<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/** properties
 * @property string $user_feed_id
 * @property string $user_id
 * @property string $provider
 * @property string $feed_id
 * @property string $state
 * @property timestamp $timestamp
 */
class UserFeed extends Model
{
    use HasFactory;
    protected $connection = 'pgsql_users';
    protected $table = 'user_feed';
    protected $primaryKey = 'user_feed_id';
}
