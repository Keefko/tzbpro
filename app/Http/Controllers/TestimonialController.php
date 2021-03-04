<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\Type;
use Illuminate\Http\Request;


class TestimonialController extends Controller
{
    public function indexDash(){
        $testimonials = Testimonial::paginate(8);
        $type = Type::all('type');
        return view('dashboard.testimonial.index')
            ->with('testimonials', $testimonials)
            ->with('types', $type);
    }
    public function index(){
        $types = Type::all();
        return view('testimonial')->with('testimonials', Testimonial::all())->with('types',$types);;
    }

    public function show($type){
        $typ = Type::where('type',$type)->first();
        $types = Type::all();
        $testimonials = Testimonial::where('type_id', $typ->id)->get();
        return view('reference')
            ->with('testimonials', $testimonials)
            ->with('type',$type)
            ->with('types',$types);
    }

    public function store(Request $request){
        $testimonial = new Testimonial();
        $this->fillData($request, $testimonial);
        $testimonial->save();

        return redirect()->back()->with('succes', 'Referencia bola pridaná');
    }

    public function update(Request $request, $id){
        $testimonial = Testimonial::findOrFail($id);
        $this->fillData($request, $testimonial);
        $testimonial->save();

        return redirect()->back()->with('succes', 'Referencia bola zmenená');
    }

    public function destroy($id){
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()->with('success', 'Referencia bola zmazaná');
    }

    private function fillData(Request $request, $testimonial){

        $this->validate($request, [
            'text' => 'required',
            'type' => 'required',
        ]);

        $testimonial->text = $request->input('text');
        $testimonial->type_id = $request->input('type');
    }
}
