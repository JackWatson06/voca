<?php


namespace App\Services\DataLoader\DataLoaders;

use Illuminate\Http\Request;

use App\Services\DataLoader\DataLoader;

class CoarseHTTPData implements DataLoader
{

    private $data;

    public function __construct(Request $request, string $prefix)
    {
        $this->data = $this->removePrefixFromData($request, $prefix);
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function addData(array $injectedData)
    {
        $this->data = array_merge($this->data, $injectedData);
    }

    public function isEmpty()
    {
        return count($this->data) === 0;
    }


    // Assume that the data inputed into this class is prefixed!
    // This will be saved by the validators as it would not let the data through.    
    /**
     * Prefix the data the data inputed through the dataloader. 
     *
     * @param  mixed $prefix
     * @return void
     */
    private function removePrefixFromData(Request $request, string $prefix)
    {
        $unprefixedData = [];

        foreach($request->all() as $key => $param)
        {
            $keyExplosion = explode('_', $key);

            if(count($keyExplosion) === 0) continue;
            
            // We have a param that could potentially have a prefix on it.
            if($keyExplosion[0] === $prefix)
            {
                unset($keyExplosion[0]);
                $unprefixedKey = implode("_", $keyExplosion);
                $unprefixedData[$unprefixedKey] = $param;

            }
        }

        return $unprefixedData; 
    }

}