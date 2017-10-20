<?php

namespace App\Http\Controllers;

use App\MemberModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Session;
use Excel;
use File;

class MemberController extends Controller
{
    public function index(){
    	
      $members = MemberModel::all();	
      return view('memberdetails')->with('members', $members);
      //return view('memberdetails');
  }

  public function createmember(){

      //$member = MemberModel::all();	
      //return view('memberdetails')->with('members', $members);
      return view('createmember');
  }

  public function saveCreate(Request $request)
    {
        $input = Input::all();
        $member = new MemberModel;
        $member->name = $input['name'];
        $member->phone = $input['phone'];
        $member->email = $input['email'];
        $member->occupation = $input['occupation'];
        $member->age = $input['age'];
        $member->sex = $input['sex'];
        $member->save();
        return Redirect::action('MemberController@index');

    }
public function postUploadCsv()
{
    $rules = array(
        'file' => 'required',
        'num_records' => 'required',
    );

    $validator = Validator::make(Input::all(), $rules);
    // process the form
    if ($validator->fails()) 
    {
        return Redirect::action('MemberController@index')->withErrors($validator);
    }
    else 
    {
        try {
            Excel::load(Input::file('file'), function ($reader) {

                foreach ($reader->toArray() as $row) {
                    MemberModel::firstOrCreate($row);
                }
            });
            \Session::flash('success', 'Members uploaded successfully.');
            return Redirect::action('MemberController@index');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
            return Redirect::action('MemberController@index');
        }
    } 
} 
    public function show($id)
    {
        $members = MemberModel::find($id);

        //return $task;
        //return View::make('task', compact('task'));
        return View('member')->with('members', $members);

    }

    public function edit(Request $request, $id)
    {
        //return View::make('edit', compact('task'));
        $members = MemberModel::findOrFail($id);
        return view('editmember')->with('members', $members);
    }

    /**
     * @return mixed
     */
    public function doEdit()
    {
        //dd($request);
        $member = MemberModel::findOrFail(Input::get('id'));
        $member->name = Input::get('name');
        $member->phone = Input::get('phone');
        $member->email = Input::get('email');
        $member->occupation = Input::get('occupation');
        $member->age = Input::get('age');
        $member->sex = Input::get('sex');
        $member->save();
        return Redirect::action('MemberController@index');
    }


    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));
 
        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
 
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){
 
                    foreach ($data as $key => $value) {
                        $insert[] = [
                        'name' => $value->name,
                        'phone' => $value->phone,
                        'email' => $value->email,
                        'occupation' => $value->occupation,
                        'age' => $value->age,
                        'sex' => $value->sex,                      
                        ];
                    }
 
                    if(!empty($insert)){
 
                        $insertData = DB::table('churchmembers')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {                        
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }
 
                return back();
 
            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }
}
