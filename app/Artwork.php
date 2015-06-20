<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Artwork extends Model implements SluggableInterface{

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'style_id',
        'width',
        'height',
        'dept',
        'material_id',
        'is_auction',
        'selling_price',
        'description',
        'status_id',
        'slug'
    ];

    public function scopeActive($query)
    {
        return $query->where('status_id', '=', 1);
    }

    public function user(){
        $this->belongsTo('App\User');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

}
