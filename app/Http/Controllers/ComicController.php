<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Comic; // Importo la classe del modello Comic
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $comics = Comic::paginate(5); // Recupero tutti i fumetti dal database
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'title' => 'required|string|max:75',
                'description' => 'required|string',
                'thumb' => 'nullable|string',
                'price' => 'required|string|max:75',
                'series' => 'required|string|max:75',
                'sale_date' => 'required|date',
                'type' => 'required|string|max:75',
            ],
            [
                'title.required' => 'Title is required',
                'title.string' => 'Title must be a string',
                'title.max' => 'Title must be smaller than 75 characters',
                'description.required' => 'Description is required',
                'description.string' => 'Description must be a string',
                'thumb.string' => 'Thumb must be a string',
                'price.required' => 'Price is required',
                'price.string' => 'Price must be a string',
                'price.max' => 'Price must be smaller than 75 characters',
                'series.required' => 'Series is required',
                'series.string' => 'Series must be a string',
                'series.max' => 'Series must be smaller than 75 characters',
                'sale_date.required' => 'Sale_date is required',
                'sale_date.date' => 'Sale_date must be a date',
                'type.required' => 'Type is required',
                'type.string' => 'Type must be a string',
                'type.max' => 'Type must be smaller than 75 characters',
            ],
        );

        if ($validator->fails()) {
            return redirect()
                ->route('comics.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Crea e salva un nuovo comic nel database
        $comic = Comic::create($data);

        // Reindirizza alla pagina di visualizzazione del comic appena creato
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $comics = Comic::findOrfail($id); // find() è un metodo di Laravel che cerca un elemento per id
        return view('comics.show', compact('comics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comics = Comic::findOrFail($id); // Trova l'elemento da modificare
        return view('comics.edit', compact('comics')); // Passa l'elemento alla vista con il nome 'comics'
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'title' => 'required|string|max:75',
                'description' => 'required|string',
                'thumb' => 'nullable|string',
                'price' => 'required|string|max:75',
                'series' => 'required|string|max:75',
                'sale_date' => 'required|date',
                'type' => 'required|string|max:75',
            ],
            [
                'title.required' => 'Title is required',
                'title.string' => 'Title must be a string',
                'title.max' => 'Title must be smaller than 75 characters',
                'description.required' => 'Description is required',
                'description.string' => 'Description must be a string',
                'thumb.string' => 'Thumb must be a string',
                'price.required' => 'Price is required',
                'price.string' => 'Price must be a string',
                'price.max' => 'Price must be smaller than 75 characters',
                'series.required' => 'Series is required',
                'series.string' => 'Series must be a string',
                'series.max' => 'Series must be smaller than 75 characters',
                'sale_date.required' => 'Sale_date is required',
                'sale_date.date' => 'Sale_date must be a date',
                'type.required' => 'Type is required',
                'type.string' => 'Type must be a string',
                'type.max' => 'Type must be smaller than 75 characters',
            ],
        );

        if ($validator->fails()) {
            return redirect()
                ->route('comics.edit', $id) // Se la validazione fallisce, reindirizza all'azione di modifica
                ->withErrors($validator)
                ->withInput();
        }

        $comic = Comic::findOrFail($id);
        $comic->update($data);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comics = Comic::findOrFail($id);
        $comics->delete();
        return redirect()->route('comics.index');
    }
}
