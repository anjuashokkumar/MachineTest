<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App;
use Session;
use File;

class AppController extends Controller
{
    public function index()
    {
        $startups = App::latest()->simplePaginate(5);
        return view('app',compact('startups'));
    }

    public function add()
    {
        return view('add_startup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'startup_name'=>'required|max:50',
            'founder_name'=>'required|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|integer',
            'sector'=>'required',
            'file'=>'required|mimes:pdf|max:2048',
            'check_me'=>'required'
        ]);

        $fileName = '';
        if ($file = $request->file('file')){
            $fileName = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move('startup/file', $fileName);
        }
        App::create([
            'startup_name'=>$request->startup_name,
            'founder_name'=>$request->founder_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'website'=>$request->website,
            'sector'=>$request->sector,
            'file'=>$fileName,
            'check_me'=>$request->check_me,
        ]);
        Session::flash('message', 'New startup added successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    public function details($id)
    {
        $startup = App::findOrFail($id);
        return view('details_startup',compact('startup'));
    }

    public function edit($id)
    {
        $startup = App::findOrFail($id);
        return view('edit_startup',compact('startup'));
    }

    public function update(Request $request, $id)
    {
        $startup = App::findOrFail($id);
        $request->validate([
            'startup_name'=>'required|max:50',
            'founder_name'=>'required|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|integer',
            'sector'=>'required',
            'check_me'=>'required'
        ]);

        $fileName = '';
        $deleteOldFile =  'startup/file/'.$startup->file;
        if ($file = $request->file('file')){
            if(file_exists($deleteOldFile)){
                File::delete($deleteOldFile);
            }
            $fileName = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move('startup/file', $fileName);
        }else{
            $fileName = $startup->file;
        }

        App::where('id',$id)->update([
            'startup_name'=>$request->startup_name,
            'founder_name'=>$request->founder_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'website'=>$request->website,
            'sector'=>$request->sector,
            'file'=>$fileName,
            'check_me'=>$request->check_me,
        ]);
        Session::flash('message', 'New startup updated successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    public function delete($id)
    {
        $startup = App::find($id);
        $deleteFile =  'startup/file/'.$startup->file;
        if (file_exists($deleteFile)) {
            File::delete($deleteFile);
        }
        $startup->delete();
        Session::flash('message', 'Startup deleted successfully!'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect()->back();
    }
}
