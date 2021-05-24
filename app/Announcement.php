<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';
    protected $fillable = [
        'from', 
        'to_id', 
        'to_group_id',
        'title',
        'contents',
        'status'
	];
	
	public function getId() {
		return $this->id;
	}
	
    public function getFrom() {
        return $this->belongsTo('App\Employee', 'from');
    }

    public function getToId() {
    	return $this->to_id;
    }

    public function getToGroupId() {
    	return $this->to_group_id;
    }

    public function getTitle() {
    	return $this->title;
    }

    public function getContents() {
    	return $this->contents;
    }

    public function getTimeSent() {
    	return date('M d, Y / H:i a', strtotime($this->created_at));
	}
	
    public function getList($id, $groupId, $keyword = null) {
        if ($keyword == null && $keyword == '') {
    	   return Self::where('to_id', $id)
                ->orWhere('to_group_id', $groupId)
    			->orWhere('to_group_id', 6)
    			->paginate(config('app.items_per_page'));
        } else {
            return Self::where(function($query) use ($groupId, $id) {
                        $query->where('to_id', $id);
                        $query->orWhere('to_group_id', $groupId);
                        $query->orWhere('to_group_id',6);
                    })
                
                    ->where(function($query) use ($keyword) {
                        $query->where('title', 'iLike', '%' . $keyword . '%');
                        $query->orWhere('contents', 'iLike', '%' . $keyword . '%');
                    })
                    ->paginate(config('app.items_per_page'));
        }
	}

    public function getAll($keyword = null) {
        if ($keyword == null && $keyword == '') {
           return Self::paginate(config('app.items_per_page'));
        } else {
            return Self::where(function($query) use ($keyword) {
                        $query->where('title', 'iLike', '%' . $keyword . '%');
                        $query->orWhere('contents', 'iLike', '%' . $keyword . '%');
                    })
                    ->paginate(config('app.items_per_page'));
        }
    }
	
	public function isActive() {
		return ($this->status == 1);
	}

}
