<?php

use Faker\Factory as Faker;
use App\Models\index_control;
use App\Repositories\index_controlRepository;

trait Makeindex_controlTrait
{
    /**
     * Create fake instance of index_control and save it in database
     *
     * @param array $indexControlFields
     * @return index_control
     */
    public function makeindex_control($indexControlFields = [])
    {
        /** @var index_controlRepository $indexControlRepo */
        $indexControlRepo = App::make(index_controlRepository::class);
        $theme = $this->fakeindex_controlData($indexControlFields);
        return $indexControlRepo->create($theme);
    }

    /**
     * Get fake instance of index_control
     *
     * @param array $indexControlFields
     * @return index_control
     */
    public function fakeindex_control($indexControlFields = [])
    {
        return new index_control($this->fakeindex_controlData($indexControlFields));
    }

    /**
     * Get fake data of index_control
     *
     * @param array $postFields
     * @return array
     */
    public function fakeindex_controlData($indexControlFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'paragraph' => $fake->text,
            'image1' => $fake->text,
            'title2' => $fake->word,
            'paragraph' => $fake->text,
            'image2' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $indexControlFields);
    }
}
