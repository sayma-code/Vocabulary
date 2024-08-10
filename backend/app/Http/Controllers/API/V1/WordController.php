<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Word;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreWordRequest;
use App\Http\Requests\V1\UpdateWordRequest;
use App\Http\Resources\V1\WordCollection;
use App\Http\Resources\V1\WordResource;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new WordCollection(Word::all());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWordRequest $request)
    {
        return new WordResource(Word::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        return new WordResource($word);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWordRequest $request, Word $word)
    {
        $word->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Word $word)
    {
        $word->delete($word);
    }
}
