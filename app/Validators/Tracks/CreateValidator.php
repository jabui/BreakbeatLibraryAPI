<?php

namespace App\Validators\Tracks;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class CreateValidator
{
    use ProvidesConvenienceMethods;

    /** @var array */
    protected static $rules = [
        'artist_id' => 'int|nullable',
        'title' => 'string|required',
        'description' => 'string|required',
        'drummer' => 'string|nullable',
        'album' => 'string|required',
        'album_artwork_url' => 'url|required',
        'label' => 'string|required',
        'year' => 'date_format:Y',
        'sample_url' => 'string|required',
        'artwork_url' => 'url|required',
    ];

    /**
     * @param Request $request
     * @return bool
     * @throws ValidationException
     */
    public function validate(Request $request): bool
    {
        $validator = $this->getValidationFactory()->make($request->all(), static::$rules);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }

        return true;
    }
}
