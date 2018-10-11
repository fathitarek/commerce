<?php

use Faker\Factory as Faker;
use App\Models\settings;
use App\Repositories\settingsRepository;

trait MakesettingsTrait
{
    /**
     * Create fake instance of settings and save it in database
     *
     * @param array $settingsFields
     * @return settings
     */
    public function makesettings($settingsFields = [])
    {
        /** @var settingsRepository $settingsRepo */
        $settingsRepo = App::make(settingsRepository::class);
        $theme = $this->fakesettingsData($settingsFields);
        return $settingsRepo->create($theme);
    }

    /**
     * Get fake instance of settings
     *
     * @param array $settingsFields
     * @return settings
     */
    public function fakesettings($settingsFields = [])
    {
        return new settings($this->fakesettingsData($settingsFields));
    }

    /**
     * Get fake data of settings
     *
     * @param array $postFields
     * @return array
     */
    public function fakesettingsData($settingsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'email' => $fake->word,
            'location' => $fake->word,
            'telephone' => $fake->word,
            'logo' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $settingsFields);
    }
}
