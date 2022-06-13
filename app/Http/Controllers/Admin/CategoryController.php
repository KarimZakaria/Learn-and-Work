<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category ;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::select('id' , 'name')->orderBy('id' , 'DESC')->get();

        return view('Admin.Category.index')->with($data) ;
    }

    public function create()
    {
        return view('Admin.Category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories|string|max:25'
        ]);

        Category::create($data);

        session()->flash('success' , 'Category Created Successfully') ;

        return redirect(route('Admin.Category.index')) ;
    }

    public function show($id)
    {
        Category::select('id' , 'name' )->orderBy('id' , 'DESC')->get();

        $data['category'] = Category::FindOrFail($id) ;

        return view('Admin.Category.show')->with($data) ;
    }

    public function edit($id)
    {
        $data['category'] = Category::findOrFail($id) ;

        return view('Admin.Category.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:25'
        ]);

        Category::findOrFail($request->id)->update($data);

        session()->flash('success' , 'Category Updated Successfully') ;

        return redirect(route('Admin.Category.index')) ;
    }

    public function destroy($id)
    {
        $category = Category::withTrashed()->findOrFail($id) ;

        if($category->trashed())
        {
            $category->forceDelete();
            session()->flash('success' , 'Category Deleted Successfully');
            return back();
        }
        else
        {
            $category->delete();
            session()->flash('success' , 'Category Trashed Successfully');
            return back();
        }
    }

    public function trashed()
    {
        $data['trashed'] = Category::onlyTrashed()->orderBy('id' , 'DESC')->paginate(9);
        return view('Admin.Category.Trashed')->with($data);
    }

    public function restore($id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('success' , 'Post Restored Successfully') ;
        return redirect(route('Admin.Category.index')) ;
    }
}
