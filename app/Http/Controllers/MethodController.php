<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Method\MethodRepository;
use App\Repositories\Categories\CategoryRepository;
use App\Http\Requests\MethodRequest;
use App\Models\Method;

class MethodController extends Controller
{
    protected $methodRepository;
    protected $categoryRepository;

    public function __construct(
        MethodRepository $methodRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->methodRepository = $methodRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = $this->methodRepository->index('limit', config('common.limit.page_limit'));

        return view('methods.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategories = $this->categoryRepository->listCategories();

        return view('methods.create', compact('listCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MethodRequest $request)
    {
        $methodData = new Method;
        $methodData->supplierName = $request->input('supplierName');
        $methodData->supplierEmail = $request->input('supplierEmail');
        $methodData->supplierContact = $request->input('supplierContact');
        $methodData->supplierPosition = $request->input('supplierPosition');
        $methodData->save();
        return 'Methods record successfully created with id' . $methodData->id;
        // $methodData = $request->only('title', 'content', 'material', 'status', 'image', 'category_id');

        // try {
        //     $this->methodRepository->store($methodData);

        //     return redirect()->route('methods.index');
        // } catch (Exception $e) {
        // return redirect()->route('methods.index')->withError($e->getMessage());
        // }           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $methodData = $this->methodRepository->show($id);
        } catch (Exception $e) {
            return redirect()->route('methods.index')->withError($e->getMessage());
        }
        return view('methods.edit', compact('methodData'));
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
        $methods = Method::findOrFail($id);
        $methods->title = $request->title;
        $methods->material = $request->material;
        $methods->content = $request->content;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = $avatar->getClientOriginalName();
            $request->file('avatar')->move(base_path() . '/public/images/', $filename);
            $methods->avatar = 'images/' . $filename;
        }
        $methods->save();
        $request->session()->flash('success', trans('session.method_update_success'));

        return redirect()->action('MethodController@index', $methods->id)->with('success', trans('session.method_change_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
