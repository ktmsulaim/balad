<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationVerificationCode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function generateCode()
    {
        $number = mt_rand(100000, 999999);

        if($this->codeAvailable($number)) {
            return $this->generateCode();
        }

        return $number;
    }

    private function codeAvailable($code) {
        return $this->where('code', $code)->exists();
    }
}
