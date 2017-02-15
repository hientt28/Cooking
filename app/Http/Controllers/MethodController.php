<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Method\MethodRepository;
use App\Repositories\Categories\CategoryRepository;
use App\Http\Requests\MethodRequest;

class MethodController extends Controller
{
    protected $methodRepository;
    protected $categoryRepository;

    public function __construct(
        MethodRepository $methodRepository,
        CategoryRepository $categoryRepository
    ) 
    {
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
        
        return view('methods.create', compact('listCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MethodRequest $request)
    {
        $methods = $request->only('title', 'content', 'material', 'status', 'image', 'category_id');

        try {
            $data = $this->methodRepository->store($methods);

            return redirect()->route('methods.index');
        } catch (Exception $e) {

        return redirect()->route('methods.index')->withError($e->getMessage());
        }           
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
        //
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
        //
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
