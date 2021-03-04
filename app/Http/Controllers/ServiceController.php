<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('services')->with('services', $services);
    }

    public function indexDash(){
        $services = Service::all();
        return view('dashboard.services.index')->with('services', $services);
    }


    public function edit($id){
        $service = Service::find($id);
        return view('dashboard.services.edit')->with('service', $service);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'icon' => 'required',
        ]);

        $service = new Service();
        $this->setProperties($request, $service);

        return redirect()->back()->with('success', 'Služba bola úspešne pridaná');
    }


    public function update(Request $request, $id){

        $service = Service::findOrFail($id);
        $this->setProperties($request, $service);

        return redirect()->back()->with('success', 'Služba bola úspešne pridaná');
    }

    private function setProperties($request, $service){
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'icon' => 'required',
        ]);

        $service->title = $request->input('title');
        $service->icon = $request->input('icon');
        $service->text = $request->input('text');
        $service->button_text = $request->input('button_text');
        $service->button_url =$request->input('button_url');

        $service->save();

    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->back()->with('success', 'Služba bola zmazaná');
    }
}
