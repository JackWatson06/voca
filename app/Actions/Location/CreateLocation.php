<?php

namespace App\Actions\Location;

use App\Actions\ModelExecutable;
use App\Models\Location;
use App\Validators\Location\CreateLocationValidator;

use Illuminate\Database\Eloquent\Model;

class CreateLocation implements ModelExecutable
{
    
    /**
     * validator
     *
     * @var mixed
     */
    private $validator;
    
    

    /**
     * Create a new document creation service. Pass the correct validator to do so.
     *
     * @param  mixed $validator
     * @return void
     */
    public function __construct(CreateLocationValidator $validator)
    {
        $this->validator = $validator;
    }
    

    
    /**
     * Create a new document. This needs to take in the model we want to add a document to. What do we do in the case
     * where we reallie on a specific model id. For instance this works fine for polymorphic relaitonships but what
     * do we do in the case where it is just a simple one -> many relationship. For example the organization_id in the
     * users table for CREDIT. Like we want to make sure it is a valid organization_id which the only way to do that 
     * would be through a validator, except that the validator only runs before hand... Will have to think about this.
     * The action would have to happen before the validation.
     *
     * @return void
     */
    public function execute(Model $model)
    {
        $validated = $this->validator->getData();

        $location = Location::firstOrCreate(
            [
                'city'  => $validated['city'],
                'state' => $validated['state']
            ]
        );

        $model->location_id = $location->id;
        $model->save();

        return $location;
    }
}