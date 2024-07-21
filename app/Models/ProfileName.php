<?php






namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileName extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['user_id', 'age', 'birthday', 'city', 'country', 'address', 'github', 'telegram', 'whatsapp', 'skype', 'website'];

    public function user() {

        return $this->belongsTo(User::class, 'user_id','id')
                    ->withDefault(['name' => 'No Title']);

    }

}

