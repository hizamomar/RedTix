<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use DataTables;

class RedtixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addColumn('action', function($row) {
                        return '<a href="/redtixs/'. $row->id .'/edit" class="btn btn-dark">Edit</a>';
                    })
                    ->make(true);
        }
        return view('redtixs.index');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('redtixs.create');
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
            'email' => 'required|email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'status' => 'required',
        ]);
  
        User::create($request->all());
   
        return redirect()->route('redtixs.index')
                        ->with('success','User created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('redtixs.show',compact('User'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('redtixs.edit',compact('user'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'status' => 'required',
        ]);

        User::whereId($id)->update($validatedData);
  
        return redirect()->route('redtixs.index')
                        ->with('success','User updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
  
        return redirect()->route('redtixs.index')
                        ->with('success','User deleted successfully');
    }
}