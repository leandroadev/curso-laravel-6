<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;
        // $this->middleware('auth');
        /* $this->middleware('auth')->only([
            'create', 'store'
            ]); */

    //     $this->middleware('auth')->except([
    //         'index', 'show'
    //         ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        // $products = Product::paginate();
        $products = Product::latest()->paginate();

        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {

        $data = $request->only('name', 'description', 'price');

        $this->repository->create($data);

        return redirect()->route('products.index');

        /*
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image',
        ]);
        */
        
        //dd('OK');
        
        
        // dd('Cadastrando...');
        // dd($request->all());
        // dd($request->only(['name', 'description']));
        // dd($request->name);
        // dd($request->description);
        // dd($request->has('teste'));
        // dd($request->input('name'));
        // dd($request->input('teste', 'default'));
        // dd($request->except('_token'));
        //if ($request->file('photo')->isValid()) {
        //    dd($request->photo->extension());
        //    dd($request->photo->getClientOriginalName());
        //    dd($request->file('photo')->store('products'));
        //    $nameFile = $request->name . '.' . $request->photo->extension();
        //    dd($request->file('photo')->storeAs('products', $nameFile));  
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "Detalhes do produto {$id}"; Somente Teste.
        // $product = Product::where('id', $id)->first();

        if(!$product = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$product = $this->repository->find($id))
            return redirect()->back();

        return view('admin.pages.products.edit', compact('product'));
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
        if(!$product = $this->repository->find($id))
            return redirect()->back();

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->where('id', $id)->first();
        if(!$product)
            return redirect()->back();

        $product->delete();

        return redirect()->route('products.index');
    }
}
