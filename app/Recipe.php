<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use League\CommonMark\CommonMarkConverter;

class Recipe extends Model
{
    use Notifiable;

    protected $fillable = ['title', 'body'];

    public static function getBodyAttribute($value) {
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false
        ]);
        return $converter->convertToHtml($value);
    }

    protected $dispatchesEvents = [
        'saved' => \App\Events\RecipeEvent::class
    ];
}
