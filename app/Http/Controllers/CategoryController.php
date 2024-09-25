<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name|max:255',
        ]);

        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->store($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Something went wrong');
        }
        DB::commit();
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ]);

        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->update($request->all(), $category);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Something went wrong');
        }
        DB::commit();
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->delete($category);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('Something went wrong');
        }
        DB::commit();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
