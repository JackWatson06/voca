<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator as LaravelValidator;
use App\Services\DataLoader\DataLoader;
use InvalidArgumentException;

abstract class CourseValidator
{

    protected array $data;
    protected array $validatorsRan;

    /**
     * AbstractRequestDto constructor.
     * @param array $data
     */
    public function __construct(DataLoader $dataLoader)
    {
        $this->data = $dataLoader->getData();
        $this->validateIndependent();
    }

    public function getValidator(string $entity): array
    {
        // This means we already validated the input so we are goochie.
        if(in_array($entity, $this->validatorsRan))
        {
            return $this->validatorsRan[$entity];
        }

        throw "GetValidatorsError: $entity not validated yet! The entity may not exist, 
                or is an indepedent entity that still needs to be validated.";
    }


    public function validateDependent(string $entity, array $dependentValues)
    {
        if(!in_array($entity, $this->depedent()))
            throw "Entity not found, or is not dependent.";

        $unprefixedData = $this->removePrefixFromData($entity);
        $unprefixedData = array_merge($unprefixedData, $dependentValues);

        $depdentValidator = $this->depedent()[$entity];
        $validator = new $depdentValidator(new ArrayData($unprefixedData));
        $this->validatorsRan []= $validator;
    }

    abstract protected function validators(): array;
    abstract protected function depndent(): array;

    private function validateIndependent() 
    {
        // Validate the independent entities first. Remove from array when done since data is stored in their
        // own validator!
        $allValidators = $this->validators();
        $depenedentValidators = $this->depndent();

        $indepedentValidators = array_diff_key($allValidators);

        foreach($indepedentValidators as $indepedent)
        {
            $unprefixedData = $this->removePrefixFromData();
            $validator = new $independent(new ArrayData($unprefixedData));

            $this->validatorsRan[] = $validator;
        }
    }


    // Assume that the data inputed into this class is prefixed!
    // This will be saved by the validators as it would not let the data through.
    private function removePrefixFromData($prefix)
    {
        $unprefixedData = [];

        foreach($this->data as $key => $param)
        {
            $keyExplosion = explode('_', $key);

            if(count($keyExplosion) === 0) continue;
            
            // We have a param that could potentially have a prefix on it.
            if($keyExplosion[0] === $prefix)
            {
                unset($keyExplosion[0]);
                $unprefixedKey = implode("_", $keyExplosion);
                
                // We know for a fact that we are dealing with a prefix value now. Because the unprefixed
                // value is in the rules.
                if(array_key_exists($unprefixedKey, $rules))
                {
                    $unprefixedData[$unprefixedKey] = $param;
                    unset($this->data[$key]);
                }

            }
        }

        return count($unprefixedData) === 0 ? $this->data : $unprefixedData; 

    }



}