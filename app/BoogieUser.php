<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BoogieUser extends Authenticatable implements JWTSubject
{
    protected $table = 'boogie_user';
    protected $guarded = ['id'];
    public $timestamps = false;
    // protected $hidden =	['userpassword'];


    // use Notifiable;

    /*
    |-----------------------------------------
    | GET JWT IDENTIFIER
    |-----------------------------------------
    */
    public function getJWTIdentifier(){
    	// body
    	return $this->getKey();	
    }

    /*
    |-----------------------------------------
    | GET JWT CUSTOM CLAIMS
    |-----------------------------------------
    */
    public function getJWTCustomClaims(){
    	// body
    	return [];	
    }
}

