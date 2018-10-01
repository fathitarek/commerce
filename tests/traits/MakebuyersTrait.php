<?php

use Faker\Factory as Faker;
use App\Models\buyers;
use App\Repositories\buyersRepository;

trait MakebuyersTrait
{
    /**
     * Create fake instance of buyers and save it in database
     *
     * @param array $buyersFields
     * @return buyers
     */
    public function makebuyers($buyersFields = [])
    {
        /** @var buyersRepository $buyersRepo */
        $buyersRepo = App::make(buyersRepository::class);
        $theme = $this->fakebuyersData($buyersFields);
        return $buyersRepo->create($theme);
    }

    /**
     * Get fake instance of buyers
     *
     * @param array $buyersFields
     * @return buyers
     */
    public function fakebuyers($buyersFields = [])
    {
        return new buyers($this->fakebuyersData($buyersFields));
    }

    /**
     * Get fake data of buyers
     *
     * @param array $postFields
     * @return array
     */
    public function fakebuyersData($buyersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->text,
            'telephone' => $fake->word,
            'super_name' => $fake->word,
            'token' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $buyersFields);
    }
}
