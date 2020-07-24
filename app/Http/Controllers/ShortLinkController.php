<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\ShortLink;
use App\ClicksHistory;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {        
        $data = ShortLink::select('*')->where('user_id', Auth::user()->id)->latest()->get();
        $short = ShortLink::select('*')->where('user_id', Auth::user()->id)->latest()->get();        
        
        return view ('user.content.dashboard', compact('data','short'));
        
                
    }
    
    public function charts(){
        $data = ClicksHistory::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
         ]);
 
         $input['user_id'] = Auth::user()->id;
         $input['link'] = $request->link;
         $input['code'] = Str::random(6);
 
         ShortLink::create($input);
 
         return redirect('home');              
    }

    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        $find->total +=1;
        $find->save(); 

        return redirect($find->link);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {                
        $data = ShortLink::where('id', $id)->get();
        $short = ShortLink::select('*')->where('user_id', Auth::user()->id)->latest()->get();        
        $history = ClicksHistory::select('*')->where('id_short_link', $id)->get();
        
        
        return view('user.content.show', compact('data','short','history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ShortLink::where('id', $id)->get();
        
        return view('user.content.edit', compact('data'));
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
        $data = ShortLink::where('id', $id)->first();
        $data->code = $request->code;       
        $data->save();
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ShortLink::where('id', $id)->first();
        $data->delete();
        return redirect()->route('home.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = ShortLink::where('code','like',"%".$search."%")->paginate(); 
        $short = ShortLink::where('code','like',"%".$search."%")->paginate();
        return view ('user.layouts.base', ['data' => $data, 'short' => $short]);
        echo "test";
    }
}
