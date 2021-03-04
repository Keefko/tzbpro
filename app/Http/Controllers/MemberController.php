<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function store(Request  $request){

        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'mobil' => 'required',
            'mail' => 'required',
        ]);

        $member = new Member();
        $this->fillData($request, $member);

        $member->save();
        return redirect()->back()->with('success', 'Člen úspešne pridaný');

    }
    public function update(Request  $request, $id){

        $member = Member::findOrFail($id);
        $this->fillData($request, $member);
        $member->save();
        return redirect()->back()->with('success', 'Člen úspešne upravený');
    }
    public function destroy($id){

        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->back()->with('success', 'Člen bol zmazaný');
    }

    private function fillData(Request  $request, $member){
        $member->name = $request->input('name');
        $member->position = $request->input('position');
        $member->text = $request->input('text');
        $member->mobil = $request->input('mobil');
        $member->mail = $request->input('mail');
    }
}
