<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller {

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function showAllAuthors() : JsonResponse 
    {
        return response()->json($this->author->all(), Response::HTTP_OK);
    }

    public function showOneAuthor($id) : JsonResponse 
    {
        $author = $this->author->find($id);

        if (empty($author)) {
            return response()->json(Response::HTTP_NOT_FOUND);
        }

        return response()->json($author, Response::HTTP_OK);
    }

    public function create(Request $request) : JsonResponse 
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'location' => 'required|alpha'
        ]);

        $author = $this->author->create($request->all());

        return response()->json($author, Response::HTTP_CREATED);
    }

    public function update($id, Request $request) : JsonResponse 
    {
        $this->validate($request, [
            'email' => 'email|unique:authors',
            'location' => 'alpha'
        ]);

        $author = $this->author->find($id);

        if (empty($author)) {
            return response()->json(Response::HTTP_NOT_FOUND);
        }

        $author->update($request->all());

        return response()->json($author, Response::HTTP_OK);
    }

    public function delete($id) {

        $author = $this->author->find($id);

        if (empty($author)) {
            return response()->json(Response::HTTP_NOT_FOUND);
        }

        return response($author->delete(), Response::HTTP_OK);
    }
}