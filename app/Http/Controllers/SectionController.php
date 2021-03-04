<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    public function index(){
        $sections = Section::all();
        return view('homepage')->with('sections', $sections);
    }

    public function indexDash(){
        $sections = Section::all();
        return view('dashboard.section.index')->with('sections', $sections);
    }


    public function update(Request $request, $id){
        $section = Section::findOrFail($id);

        $request->validate([
                'title' => 'required',
        ]);

        $section->title = $request->input('title');
        $section->text = $request->input('text');
        if($section->text == null || $section->text == ' ' ){
            $section->text_active = true;
        } else {
            $section->text_active = false;
        }

        $section->button_first_text = $request->input('button1_text');
        $section->button_first_url =$request->input('button1_url');
        $section->button_second_text = $request->input('button2_text');
        $section->button_second_url =$request->input('button2_url');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $section->img = $filename;
        }

        $section->save();
        return redirect()->back()->with('success', 'Sekcia bola úspešne pridaná');
    }

}
