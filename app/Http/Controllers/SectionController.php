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

    public function edit($id){
        $section = Section::find($id);
        return view('dashboard.section.edit')->with('section', $section);
    }

    public function update(Request $request, $id){

    }

}
