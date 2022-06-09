<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $guarded = [];

    public function getResumeUrlAttribute(){
        return asset('storage/uploads/resume/'.$this->resume);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function statusApply_context(){
        $statusApply = $this->statusApply;
        $html = '';
        switch ($statusApply){
            case 0:
                $html = '<span class="text-muted">Pending</span>';
                break;
            case 1:
                $html = '<span class="text-success">Accept</span>';
                break;
            case 2:
                $html = '<span class="text-danger">Denied</span>';
                break;
        }
        return $html;
    }
}
