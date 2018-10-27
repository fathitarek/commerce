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
use App\Models\status_order;
use Illuminate\Support\Facades\Input;
use App\Models\products;
use Yajra\Datatables\Facades\Datatables;

class productsController extends AppBaseController
{
    /** @var  productsRepository */
    private $productsRepository;

    public function __construct(productsRepository $productsRepo)
    {
        $this->productsRepository = $productsRepo;
                $this->middleware('auth');

    }
    public function search(Request $request){
        $id_category=array();
        $id_seller=array();
        $categories=  DB::table('categories')->where('name','like', '%' . $request->category_name . '%')->select('id')->get();
        $sellers=  DB::table('sellers')->where('name','like', '%' . $request->seller_name . '%')->select('id')->get();
     foreach ($categories as  $value) {
         array_push($id_category, $value->id);
     }
     foreach ($sellers as  $value) {
         array_push($id_seller, $value->id);
     }
    //  dd($id_category);
$products = products::where('p_name','like', '%' . $request->p_name . '%')
->where('price','like', '%' . $request->price . '%')
->where('publish','like', '%' . $request->publish . '%')
->whereIn('category_id', $id_category)
->whereIn('seller_id', $id_seller)
->paginate(5);

 // dd($products);
 foreach ($products as $product) {
                $product->images_product = images_products::where('product_id', $product->id)->first();

        }
         $count_products = products::count();
// dd($products);

        return view('products.index')
            ->with('products', $products)->with('count_products',$count_products);
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
       // $products = $this->productsRepository->all();
        $products=products::select(['id', 'image', 'p_name', 'category', 'seller','price($)','publish'])->latest()->get();
        foreach ($products as $product) {
                $product->images_product = images_products::where('product_id', $product->id)->first();

        }
// dd($products);
             $count_products = products::count();

       // return view('products.index')
          //  ->with('products', $products)->with('count_products',$count_products);
       // $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)->make(true);


return Datatables::of($products)->make(true);

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
                $status_order = status_order::latest()->pluck('name','id');

        return view('products.create')->with('categories', $categories)->with('sellers', $sellers)->with('status_order',$status_order);
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

$i=0;
            foreach ($input['images_products'] as  $image) {
                $name=$image->getClientOriginalName();
                $image->move($destination, $name);  


                 DB::table('images_products')->insert(
                      ['image_url' => $name, 'product_id' => $products->id]
                    );

            }
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
        $status_order = status_order::latest()->pluck('name','id');
        $images_products =images_products::where('product_id',$id)->pluck('image_url','id');
// dd($images_products);
        if (empty($products)) {
            Flash::error('Products not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('products', $products)->with('categories', $categories)->with('sellers', $sellers)->with('status_order',$status_order)->with('images_products',$images_products);
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
                        $destination = public_path() . '/images/products/'; // upload path

        $images_products =images_products::where('product_id',$id)->get();
        // return $images_products[0]->id;
        $products = $this->productsRepository->findWithoutFail($id);

        if (empty($products)) {
            Flash::error('Products not found');

            return redirect(route('products.index'));
        }

        $products = $this->productsRepository->update($request->all(), $id);


 //$input = $request->all();
foreach ($request->images_products as  $index=> $image) {
    if (isset($image)) {
      // echo $images_products[$index]->id;
         //  echo $index .'=>'.$image;
//$filename = date('Y-m-d-H:i:s')."-".$image->getClientOriginalName();

$name=$image->getClientOriginalName();
                $image->move($destination, $name);  

           DB::table('images_products') ->where('id',$images_products[$index]->id)
            ->update(['image_url' => $name]);

    }
}
                // $name=$image->getClientOriginalName();
                // $image->move($destination, $name);  


                //  

    
// dd();

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
