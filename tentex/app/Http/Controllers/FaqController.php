<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.faqs.index', compact('faqs'));
        } else {
            return Redirect::to('/admins')->send();
        }
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.faqs.create');
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = new Faq;
        $faq->id = $request->faq;
        $faq->ques = $request->ques;
        $faq->ans = $request->ans;
         
        $faq->save();
        return redirect()->back()->with('message', 'FAQ Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Faq $faq)
    {
        if ($faq->status == 1) {
            $faq->update(['status' => 0]);
        } else {
            $faq->update(['status' => 1]);
        }
        return redirect()->back()->with('message', 'Status changed successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Faq $faq)
    {

        
        $delete = $faq->delete();
        if ($delete) {
            return redirect()->back()->with('message', 'Faq  has removed successfully');
        }
    }
}
