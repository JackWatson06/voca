<?php

namespace App\Validators;

use App\Services\DataLoader\DataLoader;

use Illuminate\Support\Facades\Validator as LaravelValidator;

use InvalidArgumentException;

abstract class Validator
{

    /**
     * Data we are validating against
     *
     * @var array
     */
    protected array $data;


    /**
     * Validator constructor.
     * @param DataLoader $data
     */
    public function __construct(DataLoader $dataLoader)
    {
        // Get data from whatever datasource we want.
        $this->data = $dataLoader->getData();
        $this->validate();
    }


    
    /**
     * Get the validated data. This data is set after the constructor is finished.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }


        
    /**
     * We can override this pre processing method if we want to manipulate the data before validation. For example
     * we can add custom hashes, or random strings if we want to generate those before input. We use this for
     * documents.
     *
     * @param  mixed $data
     * @return void
     */
    protected function preProcessing(array &$data){ }


        
    /**
     * Process any of the validated data and turn it into a different format. We can utilize this for encrypting
     * passwords, or any other post processing needs.
     *
     * @param  mixed $data
     * @return void
     */
    protected function postProcessing(array &$data){ }
    


    /**
     * These are the rules associated with validating this action resuorce. We must fill out these rules.
     *
     * @return array
     */
    abstract protected function rules(): array;


        
    /**
     * Validate the input. This is called when the class is constructed.
     *
     * @return void
     */
    private function validate()
    {
        $this->preProcessing($this->data);


        $rules = $this->rules();
        // Take out any validators that may be inside of the rules.
        // These should be validated seperately. Does not matter if we validate them now or before.
        $subValidators = $this->removeValidatorsFromRules($rules);
        $this->validateSubValidators($subValidators);

        // Validate the main resource we are trying to validate against.s
        $validator = LaravelValidator::make(
            $this->data,
            $rules
        );

        // If we have any validation errors throw them as an invalid argument exception.
        if (!$validator->validate())
            throw new InvalidArgumentException(
                'Error: ' . $this->errors
            );

        $this->data = $validator->valid();

        $this->postProcessing($this->data);
    }


    
    /**
     * Extract any sub resource validators from the rules. We will validate these rules seperately from the 
     * main vlidation rules of the resource.
     *
     * @param  array $rules
     * @return void
     */
    private function subResourceValidator(array &$rules)
    {
        $subResourceValidators = [];

        foreach($rules as $attribute => $rule)
        {
            // If the rule is a sub validator then remove it from the rules list, and add it to custom array.
            if($rule instanceof SubValidator)
            {
                $subResourceValidators[$attribute] = $rule;
                unset($rules[$attibute]);
            }
        }

        return $subResourceValidators;
    }


    

    /**
     * Validate any sub validators we may have. This has the posibility to be empty, but we will just pass through
     * if that is the case.
     *
     * @param  array $validators
     * @return void
     */
    private function validateSubValidators(array $validators)
    {
        $completedValidators = [];

        foreach($this->data as $attibute => $value)
        {
            // If we can actually validate any sub validators then call them, and store result in the completed
            // validators.
            if(in_array($attibute, $validators))
            {
                $valdiator = $validators[$attibute]->validate($value);
                $completedValidators[$attribute] = $validator;
            }   
        }

        return $completedValidators;
    }

}