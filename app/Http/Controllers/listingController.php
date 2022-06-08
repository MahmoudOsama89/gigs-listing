<?php

namespace App\Http\Controllers;
use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class listingController extends Controller
{
    public function index(){
        //dd(request("tag"));
        return view('listings.index',[
            "heading"=>"latest listings",
            "listings"=> Listing::latest()->filter(request(["tag","search"]))->paginate(5)
        ]);
    }

    public function show(Listing $listing){
        return view("listings.show",compact("listing"));
    }

    public function create(){
        return view("listings.create");
    }

    public function store(Request $request){
        //dd($request->file("logo"));
        $formFields = $request->validate([
            "title"=>"required",
            "company"=>["required",Rule::unique("listings","company")],
            "location"=>"required",
            "website"=>"required",
            "email"=>["required","email"],
            "tags"=>"required",
            "description"=>"required"
        ]);
        if($request->hasFile("logo")){
            $formFields["logo"] = $request->file("logo")->store("logos","public");
        }
        $formFields["user_id"] = auth()->user()->id;

        Listing::create($formFields);
        //Session::flash("message","listing created");
        return redirect("/")->with("message","listing created");
    }


    public function edit(Listing $listing){
        return view("listings.edit",compact("listing"));
    }

    public function update(Request $request, Listing $listing){
        if(auth()->user()->id != $listing->id){
            abort(403,"unauthourized action");
        }
        $formFields = $request->validate([
            "title"=>"required",
            "company"=>["required"],
            "location"=>"required",
            "website"=>"required",
            "email"=>["required","email"],
            "tags"=>"required",
            "description"=>"required"
        ]);
        if($request->hasFile("logo")){
            $formFields["logo"] = $request->file("logo")->store("logos","public");
        }


        $listing->update($formFields);
        //Session::flash("message","listing created");
        return back()->with("message","gig updated successfuly");
    }

    public function destroy(listing $listing){
        if(auth()->user()->id != $listing->id){
            abort(403,"unauthourized action");
        }
        $listing->delete();

        return redirect("/")->with("message","listing successfully deleted");
    }
    public function manage(){
        return view("listings.manage",["listings"=>auth()->user()->listings]);
    }
}
