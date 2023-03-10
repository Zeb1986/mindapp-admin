<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** properties
 * @property string $user_id
 * @property string $provider
 * @property string $email
 * @property string $name
 * @property string $picture
 * @property string $locale
 * @property bool $is_premium
 */
class UserProperties extends Model
{
    use HasFactory;
    protected $table = 'user_properties';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
