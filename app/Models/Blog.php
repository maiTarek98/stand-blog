<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [ 'admin_id', 'title','slug','description',
        'category_id','status',
    ];
  
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
  public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(BlogTag::class);
    }
    public function blogcomments()
    {
        return $this->hasMany(BlogComment::class);
    }

}
