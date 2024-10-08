<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class UserDetails extends Model
    {
        use HasFactory;

        protected $table = 'user_info';
    
        protected $fillable = ['login_info_id', 'first_name', 'middle_name', 'last_name', 'brithdate', 'height',
            'weight', 'gender', 'profile_pic',];
    
        public function loginUser()
        {
            return $this->belongsTo(LoginUser::class, 'li_user_id');
        }
    }
?>