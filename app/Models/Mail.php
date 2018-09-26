<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Mail extends Model
{
    use Translatable;

    protected $translatable = ['subject', 'body'];

}
