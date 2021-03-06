<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['name', 'surname', 'email', 'cellphone',
        'telephone', 'resume', 'itwarp_resume', 'original_resume', 'created_by',
        'current_salary', 'intended_salary', 'sources_id', 'experience_year',
        'is_active', 'addresses_id', 'candidateworkstatus_id'];

    protected $table = 'candidates';

    public function address()
	{
		return $this->belongsTo('App\Address', 'addresses_id');
	}

	public function recruiter()
	{
		return $this->belongsTo('App\User', 'created_by');
	}
	
	public function source()
	{
		return $this->belongsTo('App\Source', 'sources_id');
	}

	public function workStatus()
	{
		return $this->belongsTo('App\CandidateWorkStatus', 'candidateworkstatus_id');
	}

	public function notes()
	{
		return $this->hasMany('App\Note', 'candidate');
	}

	public function profiles()
	{
		return $this->hasMany('App\RelCandidateProfile', 'candidates_id');
	}

	public function offers()
	{
		return $this->hasMany('App\RelOfferCandidate', 'candidates_id');
	}

	public function comments()
	{
		return $this->hasMany('App\CandidateComment', 'candidates_id');
	}
}
