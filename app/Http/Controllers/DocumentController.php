<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "name" => "required|min:3|string",
            "folder" => "required|min:3|string",
            "keywords_in" => "required|min:3|string",
            "keywords_out" => "required|min:3|string"
        ]);

        Document::create($validated);

        return back()->with('message', 'item stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Document $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $validated = $this->validate($request, [
            "name" => "required|min:3|string",
            "folder" => "required|min:3|string",
            "keywords_in" => "required|min:3|string",
            "keywords_out" => "required|min:3|string"
        ]);

        $document->update($validated);

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
