<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class LoginUser extends Model
    {
        use HasFactory;

        protected $table = 'li_user';

        protected $primaryKey = 'li_user_id';

        protected $fillable = ['email', 'password'];

        public function userDetails()
        {
            return $this->hasOne(UserDetails::class, 'li_user_id');
        }
    }
?>