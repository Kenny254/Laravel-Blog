<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
use Image;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a view with all the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('backend/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $this->validate($request, [
             'name' => 'required|max:255',
             'email' => 'required|unique:users',
             'password' => 'required',
            ]);
        
        // The blog post is valid, store in database...
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //Redirect users with success message
        Session::flash('new-user', 'User created successfully!');
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend/users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        $roles = Role::all();
        $user_roles = $user->roles()->pluck('id', 'id')->toArray();
        return view('backend/users/edit', compact('user', 'roles', 'user_roles'));
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
        $user = User::find($id);

        // Validate the request...
        $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => [
                    'required', 'string', 'email', 'max:255', 
                    Rule::unique('users')->ignore($user->id),
                ],
                'password' => 'required|string|min:6',
            ]);
        
        // update into DB
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        //save into DB
        $user->save();

        DB::table('role_user')->where('user_id',$id)->delete();
        $user->attachRoles($request->roles);
        
        //Flash Message
        Session::flash('update-user', 'This user was updated successfully!');

        // Redirect to view the post with saved changes
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Change User Imagw
     * @return \Illuminate\Http\Response
     */
    public function changeAvatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $image = $request->file('avatar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(160, 160)->save(public_path('/images/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        Session::flash('image-upload', 'Your image was uploaded successfully!');
        return redirect()->back();
    }
}
