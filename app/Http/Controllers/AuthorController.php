<?php


namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(): JsonResponse
    {
        $authors = Author::all();

        return response()->json([
            'status' => 'success',
            'authors' => $authors,
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $author = Author::find($id);

        return response()->json([
            'status' => 'success',
            'author' => $author,
        ]);
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Author created successfully',
            'author' => $author,
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $author = Author::find($request->id);
        $author->name = $request->name;
        $author->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Author updated successfully',
            'author' => $author,
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        $author = Author::find($id);
        $author->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Author deleted successfully',
            'author' => $author,
        ]);
    }
}
