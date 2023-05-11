<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class Camp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'price',
    ];

    public function getisRegisteredAttribute(){
        if(!Auth::check()){
            return false;
        }

        return Checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
    }
}
