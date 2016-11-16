<?php namespace LaravelNews\CallRequest\Models;

use \Illuminate\Database\Eloquent\Model;


class CallRequest extends Model
{

	protected $table='shorts';
	protected $fillable  = ['*'];
	public $timestamps = false;
}