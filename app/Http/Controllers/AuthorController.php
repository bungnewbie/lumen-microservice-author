<?php

namespace App\Http\Controllers;

use Validator;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\AuthorRepository;

class AuthorController extends Controller
{
    use ApiResponse;

    protected $request;

    protected $eloquent;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorRepository $author, Request $request)
    {
        $this->request  = $request;
        $this->eloquent = $author;
    }

    public function index()
    {
        return ApiResponse::success($this->eloquent->all());
    }

    public function store()
    {
        $validator = Validator::make($this->request->all(), $this->eloquent->rules());
        if($validator->fails()) {
            return ApiResponse::failed($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if($data = $this->eloquent->store($this->request->all())) {
            return ApiResponse::success($data, Response::HTTP_CREATED);
        }
    }

    public function edit($id)
    {
        return ApiResponse::success($this->eloquent->find($id));
    }

    public function update($id)
    {
        $validator = Validator::make($this->request->all(), $this->eloquent->rules());
        if($validator->fails()) {
            return ApiResponse::failed($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if($data = $this->eloquent->update($this->request->all(), $id)) {
            return ApiResponse::success($data);
        }
    }

    public function destroy($id)
    {
        $author = $this->eloquent->delete($id);
        return ApiResponse::success($author);
    }
}
