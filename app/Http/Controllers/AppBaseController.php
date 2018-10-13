<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }
  public  function setCheckbox($record,$field)
{

    if ($record->get($field) === 'on') {
//            $record->$field = '1';  // UPDATE:must be true of course
        $record->offsetSet($field,1);
    } else {
//            $record->$field = '0'; // UPDATE:must be false of course
        $record->offsetSet($field,0);
    }
    return $record;
}

public function updateCheckbox($request,$record,$field)
{
    if ($request->get($field) === 'on') {
        $record->$field = '1';  // UPDATE:must be true of course
        $request->offsetSet($field,1);
    } else {
        $record->$field = '0'; // UPDATE:must be false of course
        $request->offsetSet($field,0);
    }
    return $record;
}

public function uploadFile($field_name, $destination) {
        if (!is_null(Input::file($field_name))) {
            $file = Input::file($field_name)->getClientOriginalName();

            $input[$field_name] = $file;

            $file1 = Input::file($field_name);

            $uploadSuccess = $file1->move($destination, $file);
            return $file;
        } else {
            return false;
        }
    }
}
