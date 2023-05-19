<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{

    public function index(){
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }

    public function create(){
        return view('admin.sliders.create');
    }

    public function store(SliderFormRequest $request){


        $validatedData = $request->validated();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fillename = time().'.'.$ext;
            $file->move('uploads/sliders/', $fillename);

            $validatedData['image'] = $fillename;

          }
         $validatedData['status'] = $request->status == true ? '1':'0';
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],


        ]);
        return redirect('admin/sliders')->with('message','Slider Added Successfully');


    }
    public function edit($id){

        $slider= Slider::findOrFail($id);

        return view('admin.sliders.edit',compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider){

        $validatedData = $request->validated();

        if($request->hasFile('image')){

            $path = 'uploads/sliders/'.$slider->image;
              if(File::exists($path)){
                File::delete($path);
              }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fillename = time().'.'.$ext;
            $file->move('uploads/sliders/', $fillename);

            $slider->image = $fillename;

          }
         $validatedData['status'] = $request->status == true ? '1':'0';

          Slider::where('id',$slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $slider->image,
            'status' => $validatedData['status'],


        ]);
        return redirect('admin/sliders')->with('message','Slider updated Successfully');
    }

    public function destroy($id){

        $slider = Slider::findOrFail($id);
        $path = 'uploads/sliders/'.$slider->image;
        if(File::exists($path)){
          File::delete($path);
        }
        $slider->delete();


        return redirect('admin/sliders')->with('message','Slider Deleted Successfully');
    }

}