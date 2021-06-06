<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $a = count(request('title'));
        if (request()->file('thumbnail')) {
            foreach (request('thumbnail') as $thumb) {
                $name = time() . rand(100, 999) . "." . $thumb->getClientOriginalName();
                $thumb->move(public_path() . '/folder_uploads', $name);
                $data[] = $name;
            }
        }
        for ($i = 0; $i < $a; $i++) {
            try {
                Post::create([
                    'title' => request('title')[$i],
                    'description' => request('description')[$i],
                    'thumbnail' => $data[$i]
                ]);
            } catch (\Exception $e) {
                return 'You have problem because, ' . $e->getMessage();
            }
        }
        return 'success';
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
