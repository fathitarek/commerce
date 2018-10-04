<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateproductsAPIRequest;
use App\Http\Requests\API\UpdateproductsAPIRequest;
use App\Models\products;
use App\Repositories\productsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\images_products;

/**
 * Class productsController
 * @package App\Http\Controllers\API
 */

class productsAPIController extends AppBaseController
{
    /** @var  productsRepository */
    private $productsRepository;

    public function __construct(productsRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
    }

    /**
     * Display a listing of the products.
     * GET|HEAD /products
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productsRepository->pushCriteria(new RequestCriteria($request));
        $this->productsRepository->pushCriteria(new LimitOffsetCriteria($request));
        //$products = $this->productsRepository->all();
$products = DB::table('products')
                            ->leftJoin('sellers', 'seller_id', '=', 'sellers.id')->select('products.*','sellers.id','sellers.name','sellers.super_name','sellers.telephone','sellers.email','sellers.description')
//->leftJoin('images_products', 'product_id', '=', 'products.id')
                            ->paginate(10);

                            // foreach ($products as $key => $product) {
                            //  $product_images=  images_products::
                            //  where('product_id',$product->id)->get();
                            //                               // dd($product_images[0]);
                            //                                $products->img=$product_images;

                            // }
        return $this->sendResponse($products->toArray(), 'Products retrieved successfully');
    }

    /**
     * Store a newly created products in storage.
     * POST /products
     *
     * @param CreateproductsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateproductsAPIRequest $request)
    {
        $input = $request->all();

        $products = $this->productsRepository->create($input);

        return $this->sendResponse($products->toArray(), 'Products saved successfully');
    }

    /**
     * Display the specified products.
     * GET|HEAD /products/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var products $products */
       // $products = $this->productsRepository->findWithoutFail($id);
        $products = DB::table('products')->where('products.id',$id)
                            ->leftJoin('sellers', 'seller_id', '=', 'sellers.id')->select('products.*','sellers.id','sellers.name','sellers.super_name','sellers.telephone','sellers.email','sellers.description')->get();

                     
//->leftJoin('images_products', 'product_id', '=', 'products.id')
                            

        if (empty($products)) {
            return $this->sendError('Products not found');
        }

        return $this->sendResponse($products->toArray(), 'Products retrieved successfully');
    }

    /**
     * Update the specified products in storage.
     * PUT/PATCH /products/{id}
     *
     * @param  int $id
     * @param UpdateproductsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproductsAPIRequest $request)
    {
        $input = $request->all();

        /** @var products $products */
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            return $this->sendError('Products not found');
        }

        $products = $this->productsRepository->update($input, $id);

        return $this->sendResponse($products->toArray(), 'products updated successfully');
    }

    /**
     * Remove the specified products from storage.
     * DELETE /products/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var products $products */
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            return $this->sendError('Products not found');
        }

        $products->delete();

        return $this->sendResponse($id, 'Products deleted successfully');
    }
}
