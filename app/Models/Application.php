<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $time_preferences = [
        1 => '6:30am to 7:15am',
        2 => '2:45pm to 3:30pm',
        3 => '8:30pm to 9:15pm'
    ];



    public $data_columns = [
        'columns' => ['id', 'photo', 'first_name', 'last_name', 'email', 'phone', 'gender', 'age'],
        'searchable' => ['first_name', 'last_name', 'email'],
        'render' => [
            0 => ['key' => 'id', 'label' => '#', 'searchable' => false, 'orderable' => false],
            1 => ['key' => 'photo', 'label' => 'Photo', 'searchable' => false, 'orderable' => false, 'render' => null],
            2 => ['key' => 'first_name', 'label' => 'First Name'],
            3 => ['key' => 'last_name', 'label' => 'Last Name'],
            4 => ['key' => 'email', 'label' => 'Email'],
            5 => ['key' => 'phone', 'label' => 'Phone', 'searchable' => false, 'orderable' => false],
            6 => ['key' => 'gender', 'label' => 'Gender'],
            7 => ['key' => 'age', 'label' => 'Age'],
        ]
    ];

    protected static function boot()
    {
        parent::boot();

        static::retrieved(function ($model) {
            $model->data_columns['render'][1]['render'] = '<img src="' . $model->photo() . '" width="40">';
        });
    }


    public function hasPhoto()
    {
        if ($this->photo && Storage::exists($this->photo)) {
            return true;
        }

        return false;
    }

    public function photo()
    {
        if ($this->hasPhoto()) {
            return Storage::url($this->photo);
        } else {
            return asset('images/man.svg');
        }
    }

    public function fullName()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getAge()
    {
        if ($this->dob) {
            $dob =  Carbon::createFromFormat('d-m-Y', $this->dob);

            if (!$dob) {
                return 'NULL';
            }

            return $dob->diff(Carbon::now())->format('%y Years');
        }
    }

    public function getTimePreference()
    {
        return $this->time_preferences[$this->time_preference];
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function hasAdmissionFee($status = null)
    {
        if ($status) {
            return $this->payments()->exists() && $this->payments()->where(['type' => 1, 'status' => $status])->count() > 0;
        } else {
            return $this->payments()->exists() && $this->payments()->where(['type' => 1])->count() > 0;
        }
    }

    public function admissionFee($status = null)
    {
        if ($status) {
            if ($this->hasAdmissionFee()) {
                return $this->payments()->where(['type' => 1, 'status' => $status])->first();
            }
        } else {
            if ($this->hasAdmissionFee()) {
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
        if ($this->codes()->exists() && $this->codes()->where('status', 1)->count() > 0) {
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
