<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;
use LogicException;

trait Translatable
{
    protected $defaultLocale = 'ru';

    public function __($originFieldName)
    {
        $locale = App::getLocale() ?? $this->defaultLocale;
        if ($locale === 'en') {
            $fieldName = $originFieldName .'_en';
        } else {
            $fieldName = $originFieldName;
        }
         if (!array_key_exists($fieldName, $this->attributes)) {
             throw new LogicException('no such attribute for model ' . get_class($this));
        }

        if ($locale === 'en' && is_null($this->$fieldName) || empty($this->$fieldName)) {
            return $this->$originFieldName;
        }

        return $this->$fieldName;
    }
}
