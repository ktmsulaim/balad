<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasPhoto()
    {
        if($this->photo && Storage::exists($this->photo)) {
            return true;
        }

        return false;
    }

    public function fullName()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function hasAdmissionFee($status = null)
    {
        if($status) {
            return $this->payments()->exists() && $this->payments()->where(['type' => 1, 'status' => $status])->count() > 0;
        } else {
            return $this->payments()->exists() && $this->payments()->where(['type' => 1])->count() > 0;
        }
    }

    public function admissionFee($status = null)
    {
        if($status) {
            if($this->hasAdmissionFee()) {
                return $this->payments()->where(['type' => 1, 'status' => $status])->first();
            }
        } else {
            if($this->hasAdmissionFee()) {
                return $this->payments()->where(['type' => 1])->first();
            }
        }
    }

    public function codes()
    {
        return $this->hasMany(ApplicationVerificationCode::class);
    }

    public function getCode()
    {
        if($this->codes()->exists() && $this->codes()->where('status', 1)->count() > 0) {
            return $this->codes()->where('status', 1)->first()->code;
        } else {
            // check the code is exists
            $code = (new ApplicationVerificationCode)->generateCode();

            $this->codes()->create([
                'code' => $code,
                'status' => 1,
            ]);
            
            return $code;
        }
    }
}
