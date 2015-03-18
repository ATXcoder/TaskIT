<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tag';
	
	protected $fillable = ['title', 'user_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];
	
	protected $primaryKey = 'id';
	
	public static function getTags()
	{
		$userID = Auth::User()->id;
		$tags = Tag::where('user_id','=',$userID)->get();
		return $tags;
	}
	

}
