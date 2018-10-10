<?php

use Faker\Factory as Faker;
use App\Models\stories;
use App\Repositories\storiesRepository;

trait MakestoriesTrait
{
    /**
     * Create fake instance of stories and save it in database
     *
     * @param array $storiesFields
     * @return stories
     */
    public function makestories($storiesFields = [])
    {
        /** @var storiesRepository $storiesRepo */
        $storiesRepo = App::make(storiesRepository::class);
        $theme = $this->fakestoriesData($storiesFields);
        return $storiesRepo->create($theme);
    }

    /**
     * Get fake instance of stories
     *
     * @param array $storiesFields
     * @return stories
     */
    public function fakestories($storiesFields = [])
    {
        return new stories($this->fakestoriesData($storiesFields));
    }

    /**
     * Get fake data of stories
     *
     * @param array $postFields
     * @return array
     */
    public function fakestoriesData($storiesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'description' => $fake->text,
            'url' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $storiesFields);
    }
}
