<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FreeTrial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
class FreeTrialController extends Controller
{
    public function store(Request $req){


        try {
            $images=[];
            if ($req->hasFile('thumbnail')){
                $skb = 0;
                foreach ($req->file('thumbnail') as $file){
                    $file_ex= $file->getClientOriginalExtension();
                    $file_name = rand(1,100).rand(1000,2000).$skb.'.'.$file_ex;
                    Image::make($file)->resize(268, 249)->save(public_path('uploads/image/'.$file_name));
                    $images[]=$file_name;

                    $skb++;
                }
            }


           FreeTrial::create([
                'user_id'=>Auth::id(),
                'name'=>$req->name,
                'email'=>$req->email,
                'location'=>$req->location,
                'number'=>$req->number,
                'thumbnail'=>json_encode($images),
                'message'=>$req->message,
                'category_id'=>$req->category_id
            ]);

            $this->setSuccessMessage('image uploads successfully!');
        }catch (\Exception $e){
            $this->setErrorMessage($e->getMessage());
        }

        return redirect()->back();
    }
}