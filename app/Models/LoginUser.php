<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class LoginUser extends Model
    {
        use HasFactory;

        protected $table = 'users';

        protected $primaryKey = 'user_id';

        protected $fillable = ['email', 'password'];

        public function userDetails()
        {
            return $this->hasOne(UserDetails::class, 'user_id');
        }
    }
?>