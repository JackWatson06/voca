<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\User;
use App\Models\WorkerLead;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class DocumentFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;



    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // Generate the morph-to data
        $documentables = [
            User::class,
            WorkerLead::class,
        ]; // Add new noteables here as we make them
        $documentableType = $this->faker->randomElement($documentables);
        $documentableId = $documentableType::factory()->create()->id;


        // TODO We may be able to refactor this into it's own service ... or maybe we call an action.
        // This creates a couple random encrypted documents
        $hashName = md5(uniqid(rand(), true));
        $encryptedContent = encrypt($this->faker->paragraph(4));

        Storage::disk('local')->put($hashName . '.dat', $encryptedContent);


        return [
            'name'      => $this->faker->name . " Resume",
            'hash_name' => $hashName,
            'type'      => 'txt',
            'document_usage_id' => 1,
            'documentable_id' => $documentableId,
            'documentable_type' => $documentableType,
        ];
    }
}
