<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SeekerProfile;
use DB;
class jobSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->has('search')) {
            $data = $request->get('search');
            $profile = SeekerProfile::where('name', 'like', "%{$data}%")
                     ->orWhere('location', 'like', "%{$data}%")
                     ->paginate(5);
           }
            else{      
             $profile = SeekerProfile::paginate(5);
            }
        return response()->json(['data' => $profile,"message"=>"Data fetch successfully !"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'mobile' => 'required | max:10',
            'email' => 'required',
            'title' => 'required',
            'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        
        $profile  = new SeekerProfile;
        $profile->name = $data['name'];
        $profile->title = $data['title'];
        $profile->mobile = $data['mobile'];
        $profile->email = $data['email'];
        $profile->location = $data['location'];
        $profile->description = $data['description'];

        $uploadFolder = 'public/jobSeeker';
        $image = $request->file('image');
        $filename  =$image->getClientOriginalName();
        $extension  =$image->extension();
        $image_uploaded_path = $image->storeAs($uploadFolder, $filename);
        $profile->profile_image = $filename;
        $profile->save();
         return response()->json(['message'=>'Data added successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profiles = SeekerProfile::where('id',$id)->first();
         return response($profiles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$data = $request->all();
      
        if(SeekerProfile::where('id',$id)->exists()){
                $profile =SeekerProfile::find($id); 
                $profile->name=is_null($request->name)? $profile->name : $request->name;
                $profile->title=is_null($request->title)? $profile->title : $request->title;
                $profile->email=is_null($request->email)? $profile->email : $resquest->email;
                $profile->mobile=is_null($request->mobile)? $profile->mobile : $request->mobile;
                $profile->location=is_null($request->location)? $profile->location : $request->location;
                $profile->description=is_null($request->description)? $profile->description : $request->description;


                 // dd($request->file('image'));  
                $uploadFolder = 'public/jobSeeker';
                $image = $request->file('image');
                print_r($image);die;
                $filename  =$image->getClientOriginalName();
                $extension  =$image->extension();
                $image_uploaded_path = $image->storeAs($uploadFolder, $filename);
                $profile->profile_image = $filename;
                $profile->save();
                return response()->json(["message"=>"Record updated successfully"],200);

        }else{
            return response()->json(["message"=>"Data not found"],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $profiles = SeekerProfile::where('id',$id)->delete();
                 return response()->json(['message'=>'Recoed deleted successfully'],200);
 
    }
}
