<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use App\Repositories\productsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\categories;
use App\Models\sellers;
use DB;
use App\Models\images_products;
use Illuminate\Support\Facades\Input;

class productsController extends AppBaseController
{
    /** @var  productsRepository */
    private $productsRepository;

    public function __construct(productsRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
                $this->middleware('auth');

    }

    /**
     * Display a listing of the products.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productsRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productsRepository->all();
        foreach ($products as $product) {
                $product->images_product = images_products::where('id', $product->id)->first();

        }

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new products.
     *
     * @return Response
     */
    public function create()
    {
                $categories = categories::latest()->pluck('name','id');
                $sellers = sellers::latest()->pluck('name','id');

        return view('products.create')->with('categories', $categories)->with('sellers', $sellers);
    }

    /**
     * Store a newly created products in storage.
     *
     * @param CreateproductsRequest $request
     *
     * @return Response
     */
    public function store(CreateproductsRequest $request)
    {       
            $destination = public_path() . '/images/products/'; // upload path
            $request = $this->setCheckbox($request, 'publish');
            $input = $request->all();
       
        $products = $this->productsRepository->create($input);


// for ($i = 1; $i<=count(Input::get('images_products'));$i++){
//                 $logo = $this->uploadFile('images_products[]', $destination);
//                 $imageName = $name.'.'.$request->product[$i]['image']->getClientOriginalExtension();;
//                 $request->product[$i]['image']->move(public_path('images/food/'), $imageName);

// }

$i=0;
            foreach ($input['images_products'] as  $image) {
                $name=$image->getClientOriginalName();
                $image->move($destination, $name);  
                //$data[] = $name;  

//                 $logo = $this->uploadFile('images_productss', $destination);
//         if (gettype($logo) == 'string'){$value = $logo;}

                 DB::table('images_products')->insert(
                      ['image_url' => $name, 'product_id' => $products->id]
 );
// $i++;
                }

//                // $images_products = new images_products;
//                // $images_products->image=
//                //dd($value);
//             }
       //      if(!is_null(Input::file('logo'))){
       //  $logo = $this->uploadFile('logo', $destination);
       // // return $similar_sections['image_en'].$image_en ;
       //  if (gettype($logo) == 'string'){$input['logo'] = $logo;}
       //  }
       // dd($input);
        Flash::success('Products saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified products.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);
        $images_products =images_products::where('product_id',$id)->get();

        if (empty($products)) {
            Flash::error('Products not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('products', $products)->with('images_products',$images_products);
    }

    /**
     * Show the form for editing the specified products.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);
$categories = categories::latest()->pluck('name','id');
                $sellers = sellers::latest()->pluck('name','id');
        if (empty($products)) {
            Flash::error('Products not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('products', $products)->with('categories', $categories)->with('sellers', $sellers);
    }

    /**
     * Update the specified products in storage.
     *
     * @param  int              $id
     * @param UpdateproductsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproductsRequest $request)
    {
                        $request = $this->setCheckbox($request, 'publish');

        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Flash::error('Products not found');

            return redirect(route('products.index'));
        }

        $products = $this->productsRepository->update($request->all(), $id);

        Flash::success('Products updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified products from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Flash::error('Products not found');

            return redirect(route('products.index'));
        }

        $this->productsRepository->delete($id);

        Flash::success('Products deleted successfully.');

        return redirect(route('products.index'));
    }
}
