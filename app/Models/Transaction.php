<?php

namespace App\Models;


use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'transaction_date', 'amount', 'description','user_id'];
    protected $casts = ['transaction_date' =>'datetime'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function setAmountAttribute($value){
        $this->attributes['amount'] = $value*100;
    }
    protected static function booted(): void
    {
        if (auth()->check()){
            static::addGlobalScope('by_user', function (Builder $builder) {
                $builder->where('user_id', auth()->id());
            });
        }
    }
}
