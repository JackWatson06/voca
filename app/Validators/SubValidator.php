<?php

namespace App\Validators;

use App\Services\DataLoader\DataLoaders\ArrayData;

class SubValidator
{

    /**
     * The namespace that we can find the validators in.
     *
     * @var string
     */
    const NAMESPACE = 'App\\Validators';

    
    /**
     * The class the sub validator will call
     *
     * @var string
     */
    private $className;


        
    /**
     * A sub validator takes in the name of the validator we are validating against.
     *
     * @param  mixed $className
     * @return void
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }


   
    /**
     * Validate the incoming data against the respective validator. Return this validator.
     *
     * @param  mixed $data
     * @return void
     */
    public function validate(array $data)
    {
        $dataLoader = new ArrayData($data);
        $qualifiedClassName = self::NAMESPACE . "\\" . $this->className;

        return new $qualifiedClassName($dataLoader);
    }   

}