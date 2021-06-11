<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

use App\Models\Subservice;

class SubserviceController extends Controller
{
    public function index(){
      $subservices = Subservice::all();
      return view('pages.admin.layanan', compact('subservices'));
    }

    public function show($slug){
      $subservice = Subservice::where('slug', $slug)->first();

      if(!$subservice){
        return abort(404);
      }

      return view('pages.admin.layanan-detail', compact('subservice'));
    }

    public function create(){
      return view('pages.admin.layanan-baru');
    }

    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'description' => 'required',
        'is_available' => 'required|in:0,1',
        'is_homevisitable' => 'required|in:0,1'
      ]);

      $subservice = Subservice::create(
        array_merge($request->all(), ['slug' => Str::slug($request->name)])
      );

      if($subservice){
        return redirect('/administrator/layanan/'.$subservice->slug)->with('success', 'Layanan berhasil ditambahkan');
      }else{
        return back()->with('error', 'Layanan gagal disimpan');
      }
    }

    public function update($subservice_name, Request $request){
      $request->validate([
        'name' => 'required',
        'description' => 'required',
        'is_available' => 'required|in:0,1',
        'is_homevisitable' => 'required|in:0,1'
      ]);

      $subservice = Subservice::where('slug', $subservice_name)->first();

      if(!$subservice){
        return abort(404);
      }

      if(
        $subservice->update(
          array_merge($request->all(), ['slug' => Str::slug($request->name)])
        )
      ){
        return redirect('/administrator/layanan/'.$subservice->slug)->with('success', 'Layanan berhasil diperbarui');
      }{
        return back()->with('error', 'Layanan gagal diperbarui');
      }
    }

    public function stats(){
      return view('pages.admin.layanan-statistik');
    }

    

    

    
}
