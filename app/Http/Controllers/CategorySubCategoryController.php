<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\Http\Requests\CategoryRequest as Request;

class CategorySubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $subCategories = SubCategory::Where('category_id', $category->id)->byNameAsc()->paginate(15);

        return view('subcategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('subcategory.create', compact($category, 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $subCategory = SubCategory::create([
            'name' => $request->name,
            'category_id' => $category->id
        ]);

        toast( trans('messages.subcategory.create'), 'success');
        return redirect()->route('subcategory.show', $subCategory->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $subCategory = SubCategory::find($id);
        return view('subcategory.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $subCategory = SubCategory::find($id);

        return view('subcategory.edit', compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->name = $request->name;
        $subCategory->save();

        toast( trans('messages.subcategory.update'), 'success');
        return redirect()->route('subcategory.show', $subCategory->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $subCategory = SubCategory::find($id);
        $category = $subCategory->category_id;
        $subCategory->delete();

        toast( trans('messages.subcategory.destroy'), 'success');
        return redirect()->route('category.subcategory.index', $category);
    }
}
