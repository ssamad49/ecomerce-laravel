<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index',compact('colors'));
    }
    public function create(){

        return view('admin.colors.create');
    }

    public function store(ColorFormRequest $request){

        $validatedData = $request->validated();

        Color::create([
            'name' => $validatedData['name'],
            'code'=> $validatedData['code'],
            'status' => $request->status == true ? '1': '0',
        ]);

        return redirect('admin/colors')->with('message', 'Color Added Successfully');

    }

    public function edit($id){

        $color = Color::findOrFail($id);

        return view('admin.colors.edit', compact('color'));

    }
    public function update($id, ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        $color = Color::findOrFail($id);
        $color->update([
            'name' => $validatedData['name'],
            'code'=> $validatedData['code'],
            'status' => $request->status == true ? '1': '0',
        ]);

        return redirect('admin/colors')->with('message', 'Color Updated Successfully');

    }
    public function destroy($id){

        $color = Color::findOrFail($id);

        $color->delete();
        
        return redirect('admin/colors')->with('message', 'Color deleted Successfully');
    }
}
