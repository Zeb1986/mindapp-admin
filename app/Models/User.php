<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** properties
 * @property string $user_id
 * @property string $provider
 * @property string $access_token
 * @property timestamp $access_token_expiry
 * @property string $refresh_token
 * @property timestamp $registration_time
 * @property timestamp $last_synced
 */
class User extends Model
{
    use HasFactory;
    protected $table = 'users';
}
