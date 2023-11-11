<?php
namespace App\Traits;

trait ProfileTrait
{
    protected static function booted()
    {
        static::creating(function ($model) {
            if (auth()->check() && !auth()->user()->isSuperAdmin()) {
                $model->profile_id = $model->profile_id ?? auth()->user()->profile->id;
            }
        });
    }
}