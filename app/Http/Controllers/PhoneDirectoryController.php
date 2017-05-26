<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Excel;
use App\PhoneDirectory;

class PhoneDirectoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('internaldirectory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_contacts(Request $request) {
        //
        $validator = Validator::make($request->all(), [
                    'file' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('upload_message', 'No File was Uploaded');
            return redirect('/internaldirectory')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            //Get file Extension
            $file_extension = $request->file->getClientOriginalExtension();

            //Check if extensions correspond to excel formats
            if ($file_extension == 'xls') {
                Excel::load($request->file, function($reader) {

                    // Getting all results
//                    $results = $reader->get();
                    // ->all() is a wrapper for ->get() and will work the same
                    $results = $reader->all();

                    foreach ($results as $result) {
                        // Get Sheet Titile
                        $sheet_title = $result->getTitle();

                        if ($sheet_title == 'CO' || $sheet_title == 'Dodoma Main Office') {
                            foreach ($result as $row) {
                                $update_phonedirectory = PhoneDirectory::where('ext_no', $row->ext_no)
                                        ->update([
                                    'name' => $row->staff_name,
                                    'function' => $row->function,
                                    'department' => $row->department,
                                    'location' => $sheet_title
                                ]);

                                if (!$update_phonedirectory) {
                                    $phonedirectory = new PhoneDirectory;
                                    $phonedirectory->name = $row->staff_name;
                                    $phonedirectory->function = $row->function;
                                    $phonedirectory->department = $row->department;
                                    $phonedirectory->ext_no = $row->ext_no;
                                    $phonedirectory->location = $sheet_title;
                                    $phonedirectory->save();
                                }
                            }
                        }
                    }
                });
                Session::flash('upload_message','File Uploaded Succesfully');
                return back();
            } else {
                Session::flash('upload_message', 'FIle Uploaded was ' . $file_extension . '. Upload an Excel File');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
