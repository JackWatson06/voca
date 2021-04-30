<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator as LaravelValidator;
use App\Services\DataLoader\DataLoader;
use InvalidArgumentException;

abstract class Validator
{

    protected array $data;

    /**
     * AbstractRequestDto constructor.
     * @param array $data
     */
    public function __construct(DataLoader $dataLoader)
    {
        // Check to see if we have a prefix before we get the data.
        $this->data = $dataLoader->getData();
        $this->validate();
    }

    public function getData(): array
    {
        return $this->data;
    }

    protected function preProcessing(array &$data){ }
    protected function postProcessing(array &$data){ }

    abstract protected function rules(): array;


        
    /**
     * Validate the input. This is called when the class is constructed.
     *
     * @return void
     */
    private function validate()
    {
        $this->preProcessing($this->data);

        $validator = LaravelValidator::make(
            $this->data,
            $this->rules()
        );

        if (!$validator->validate())
            throw new InvalidArgumentException(
                'Error: ' . $this->errors
            );

        $this->data = $validator->valid();

        $this->postProcessing($this->data);
    }

}