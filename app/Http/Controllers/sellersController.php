<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesellersRequest;
use App\Http\Requests\UpdatesellersRequest;
use App\Repositories\sellersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use File;
use Illuminate\Support\Facades\Input;

class sellersController extends AppBaseController
{
    /** @var  sellersRepository */
    private $sellersRepository;

    public function __construct(sellersRepository $sellersRepo)
    {
        $this->sellersRepository = $sellersRepo;
                        $this->middleware('auth');

    }

    /**
     * Display a listing of the sellers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sellersRepository->pushCriteria(new RequestCriteria($request));
        $sellers = $this->sellersRepository->all();

        return view('sellers.index')
            ->with('sellers', $sellers);
    }

    /**
     * Show the form for creating a new sellers.
     *
     * @return Response
     */
    public function create()
    {
        return view('sellers.create');
    }

    /**
     * Store a newly created sellers in storage.
     *
     * @param CreatesellersRequest $request
     *
     * @return Response
     */
    public function store(CreatesellersRequest $request)
    {
         $destination = public_path() . '/images/sellers/'; // upload path
                $request = $this->setCheckbox($request, 'active');

        $input = $request->all();
         $input['token']=md5(rand() . time());
        $input['password']=md5( $request->password);

if(!is_null(Input::file('logo'))){
        $logo = $this->uploadFile('logo', $destination);
       // return $similar_sections['image_en'].$image_en ;
        if (gettype($logo) == 'string'){$input['logo'] = $logo;}
        }
        $sellers = $this->sellersRepository->create($input);

        Flash::success('Sellers saved successfully.');

        return redirect(route('sellers.index'));
    }

    /**
     * Display the specified sellers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            Flash::error('Sellers not found');

            return redirect(route('sellers.index'));
        }

        return view('sellers.show')->with('sellers', $sellers);
    }

    /**
     * Show the form for editing the specified sellers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            Flash::error('Sellers not found');

            return redirect(route('sellers.index'));
        }

        return view('sellers.edit')->with('sellers', $sellers);
    }

    /**
     * Update the specified sellers in storage.
     *
     * @param  int              $id
     * @param UpdatesellersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesellersRequest $request)
    {
                        $destination = public_path() . '/images/sellers/'; // upload path

        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            Flash::error('Sellers not found');

            return redirect(route('sellers.index'));
        }
 $input = $request->all();

 if(!is_null(Input::file('logo'))){
        $logo = $this->uploadFile('logo', $destination);
       // return $similar_sections['image_en'].$image_en ;
        if (gettype($logo) == 'string'){$input['logo'] = $logo;}
        }
        $sellers = $this->sellersRepository->update($input, $id);

        Flash::success('Sellers updated successfully.');

        return redirect(route('sellers.index'));
    }

    /**
     * Remove the specified sellers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sellers = $this->sellersRepository->findWithoutFail($id);

        if (empty($sellers)) {
            Flash::error('Sellers not found');

            return redirect(route('sellers.index'));
        }

        $this->sellersRepository->delete($id);

        Flash::success('Sellers deleted successfully.');

        return redirect(route('sellers.index'));
    }
}
