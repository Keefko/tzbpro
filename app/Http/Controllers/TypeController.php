<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function store(Request $request){
        $type = new Type();
        $this->fillData($request, $type);
        $type->save();
        return redirect()->back()->with('succes', 'Typ referencie bol pridaný');
    }
    public function update(Request $request, $id){
        $type = Type::findOrFail($id);
        $this->fillData($request, $type);
        $type->save();
        return redirect()->back()->with('succes', 'Typ referencie bol upravený');
    }

    public function destroy($id){
        $type = Type::findOrFail($id);
        $type->delete();
        return redirect()->back()->with('succes', 'Typ referencie bol zmazaný');
    }

    private function fillData($request, $type){

        $this->validate($request,[
            'type' => 'required'
        ]);

        $type->type = $request->input('type');
    }
}
