<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\BlogModel;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\BlogRequest;


class BlogController extends Controller
{
    // Show all blogs
    public function index()
    {
        $blogs = BlogModel::latest()->paginate(5);
        return view('blogs.allblogs', compact('blogs'));
    }
    // public function index()
    // {
    //     $blogs = BlogModel::all();
    //     return view("allblogs", compact('blogs'));
    // }


    // Show form to create a new blog
    public function create()
    {
        return view("blogs.create");
    }

    // Store a new blog
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'desc' => 'required',
    //         'img' => 'required|image|mimes:jpeg,png,jpg,gif',
    //     ]);

    //     $imagePath = $request->file('img')->store('uploads_img', 'public');

    //     BlogModel::create([
    //         'title' => $request->title,
    //         'desc' => $request->desc,
    //         'img' => $imagePath,
    //         'user_id' => auth()->id()
    //     ]);

    //     return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    // }

    // Store a new blog
    public function store(BlogRequest $request)
    {
        $imagePath = $request->file('img')->store('uploads_img', 'public');

        BlogModel::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $imagePath,
            'user_id' => auth()->id()
        ]);



        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    // Show a specific blog
    public function show($id)
    {
        $blog = BlogModel::findOrFail($id);
        return view('show', compact('blog'));
    }

    // Show form to edit a blog
    public function edit($id)
    {
        $blog = BlogModel::findOrFail($id);
        return view('blogs.editblog', compact('blog'));
    }

    // Update a blog
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'desc' => 'required',
    //         'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $blog = BlogModel::findOrFail($id);

    //     $imagePath = $blog->img;
    //     if ($request->hasFile('img')) {
    //         $imagePath = $request->file('img')->store('uploads_img', 'public');
    //     }

    //     $blog->update([
    //         'title' => $request->title,
    //         'desc' => $request->desc,
    //         'img' => $imagePath,
    //     ]);

    //     return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    // }


    // Update a blog
    public function update(BlogRequest $request, $id)
    {
        $blog = BlogModel::findOrFail($id);

        $imagePath = $blog->img;
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('uploads_img', 'public');
        }

        $blog->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $imagePath,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }
    // Delete a blog
    public function destroy($id)
    {
        $blog = BlogModel::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }

    // View only user's blogs (requires auth)
    public function myblogs()
    {
        $blogs = BlogModel::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view("myblogs", compact('blogs'));
    }


    public function vlogsView()
    {
        return view('vlogs');
    }

    public function vlogsData()
    {
        return DataTables::of(BlogModel::query())
            ->addColumn('actions', function ($blog) {
                return '<a href="' . route('blogs.edit', $blog->id) . '" class="btn btn-sm btn-warning">Edit</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
