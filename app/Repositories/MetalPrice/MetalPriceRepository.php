<?php


namespace App\Repositories\MetalPrice;

use Illuminate\Database\Eloquent\Model;

class MetalPriceRepository extends \App\Repositories\BasicRepository implements MetalPriceRepositoryInterface
{

    public function metalPriceInsertIntoDb($property, $price)
    {
        $value = $this->model->firstOrNew(array('metal_code' => $property));
        $value->price = $price;
        $value->save();
        return $value;
    }

    public function getAllMetalPriceFromDB()
    {
        return $this->model->get();
    }
}
