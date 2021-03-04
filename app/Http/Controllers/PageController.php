<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function show($slug){
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page.show')->with('page',$page);
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('dashboard.page.edit')->with('page',$page);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'img' => 'required',
            'sidebar' => 'required',
        ]);

        $page = new Page();
        $this->createPage($request, $page);

        $page->save();

        return redirect()->back()->with('success', 'Stránka bola úspešne vytvorená');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'sidebar' => 'required',
        ]);

        $page = Page::findOrFail($id);
        $this->createPage($request, $page);

        $page->save();

        return redirect()->back()->with('success', 'Stránka bola úspešne upravená');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->back()->with('success', 'Stránka bola zmazaná');
    }

    /**
     * @param Request $request
     * @param $page
     */
    public function createPage(Request $request, $page): void
    {
        $page->title = $request->input('title');
        $page->slug = strtolower(str_replace(" ", '-', $request->input('title')));
        $page->text = $request->input('text');
        $page->sidebar = $request->input('sidebar');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $page->img = $filename;
        }
    }

}
