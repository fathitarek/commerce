<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebuyersAPIRequest;
use App\Http\Requests\API\UpdatebuyersAPIRequest;
use App\Models\buyers;
use App\Repositories\buyersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Validator;
/**
 * Class buyersController
 * @package App\Http\Controllers\API
 */

class buyersAPIController extends AppBaseController
{
    /** @var  buyersRepository */
    private $buyersRepository;

    public function __construct(buyersRepository $buyersRepo)
    {
        $this->buyersRepository = $buyersRepo;
    }

    /**
     * Display a listing of the buyers.
     * GET|HEAD /buyers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->buyersRepository->pushCriteria(new RequestCriteria($request));
        $this->buyersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $buyers = $this->buyersRepository->all();
        dd($buyers->toArray());
        return $this->sendResponse($buyers->toArray(), 'Buyers retrieved successfully');
    }

    /**
     * Store a newly created buyers in storage.
     * POST /buyers
     *
     * @param CreatebuyersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatebuyersAPIRequest $request)
    {
         $valid = Validator::make($request->all(), [
                            'name' => 'required',
                            'email' => 'required|unique:buyers',
                            'password' => 'required',
                            'super_name' => 'required',
                            'city' => 'required',
            ]);

            if ($valid->fails()) {
                return response()->json(['msg' => 'all fields is required. and email is unique',
                 'state' => '401']);
            } else {
        $input = $request->all();
        $input['token']=md5(rand() . time());
        $input['password']=md5( $request->password);
// dd($input['password']);
        $buyers = $this->buyersRepository->create($input);

        return $this->sendResponse($buyers->toArray(), 'Buyers saved successfully');
    }
    }

    /**
     * Display the specified buyers.
     * GET|HEAD /buyers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var buyers $buyers */
        $buyers = $this->buyersRepository->findWithoutFail($id);

        if (empty($buyers)) {
            return $this->sendError('Buyers not found');
        }

        return $this->sendResponse($buyers->toArray(), 'Buyers retrieved successfully');
    }

    /**
     * Update the specified buyers in storage.
     * PUT/PATCH /buyers/{id}
     *
     * @param  int $id
     * @param UpdatebuyersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebuyersAPIRequest $request)
    {
        $input = $request->all();

        /** @var buyers $buyers */
        $buyers = $this->buyersRepository->findWithoutFail($id);

        if (empty($buyers)) {
            return $this->sendError('Buyers not found');
        }

        $buyers = $this->buyersRepository->update($input, $id);

        return $this->sendResponse($buyers->toArray(), 'buyers updated successfully');
    }

    /**
     * Remove the specified buyers from storage.
     * DELETE /buyers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var buyers $buyers */
        $buyers = $this->buyersRepository->findWithoutFail($id);

        if (empty($buyers)) {
            return $this->sendError('Buyers not found');
        }

        $buyers->delete();

        return $this->sendResponse($id, 'Buyers deleted successfully');
    }



     /**
     * 
     * @param Request $request
     * @return type
     */
    public function login(Request $request) {

        $valid = Validator::make($request->all(), [
                    "password" => "required",
                    "email" => "required",
        ]);
        if ($valid->fails()) {
            return response()->json(['message' => 'all fields is required.', 'success' => false]);
        } else {
            $count_buyers = buyers::where('email', $request->email)->where('password', md5($request->password))->count();
            if ($count_buyers == 1) {
                $buyer = buyers::where('email', $request->email)->where('password', md5($request->password))->get();
                return response()->json(["success"=> true,'data' => $buyer[0],  "message"=>"Login  buyer successfully"]);
            } else {
                return response()->json(['message' => 'Please enter correct email and password .', 'success' => false]);
            }
        }
    }
}
