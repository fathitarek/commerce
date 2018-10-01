<?php

use Faker\Factory as Faker;
use App\Models\status_order;
use App\Repositories\status_orderRepository;

trait Makestatus_orderTrait
{
    /**
     * Create fake instance of status_order and save it in database
     *
     * @param array $statusOrderFields
     * @return status_order
     */
    public function makestatus_order($statusOrderFields = [])
    {
        /** @var status_orderRepository $statusOrderRepo */
        $statusOrderRepo = App::make(status_orderRepository::class);
        $theme = $this->fakestatus_orderData($statusOrderFields);
        return $statusOrderRepo->create($theme);
    }

    /**
     * Get fake instance of status_order
     *
     * @param array $statusOrderFields
     * @return status_order
     */
    public function fakestatus_order($statusOrderFields = [])
    {
        return new status_order($this->fakestatus_orderData($statusOrderFields));
    }

    /**
     * Get fake data of status_order
     *
     * @param array $postFields
     * @return array
     */
    public function fakestatus_orderData($statusOrderFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $statusOrderFields);
    }
}
