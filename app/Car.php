<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Car extends Model implements StaplerableInterface
{
  use EloquentTrait;
  protected $fillable = ['avatar', 'name'];

  public function __construct(array $attributes = array()) {
    $this->hasAttachedFile('avatar', [
        'styles' => [
            'medium' => '300x300',
            'thumb' => '100x100'
        ]
    ]);

    parent::__construct($attributes);
  }
}
