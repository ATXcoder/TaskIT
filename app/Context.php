<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Context extends Model {

	protected $table = 'context';
	
	protected $fillable = ['title','user_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];
	
	protected $primaryKey = 'id';
	
	
	public static function getContext($userID)
	{
		$contexts = Context::where('user_id','=',$userID)->get();
		return $contexts;
	}	
	
	public static function getContextID($userID, $name)
	{
		$context = Context::whereRaw('user_id = ? and title = ?',[$userID, $name])->first();
		
		return $context->id;
	}
	
}
