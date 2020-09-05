<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Departement;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users=User::all();
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $departements=Departement::all();
        return view('admin.users.create')->with(
            [
                'departements'=>$departements
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user=User::create($request->all());
        $user->password = bcrypt(request('password'));

        $user->save();
        $role=Role::select('id')->where('name','Employé')->first();
        $user->roles()->attach($role);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        $roles=Role::all();
        return view('admin.users.details',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $roles= Role::all();
        $departements=Departement::all();
        return view('admin.users.edit',compact('user'))->with(
            [
                'user'=>$user,
                'roles'=>$roles,
                'departements'=>$departements
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'prenom' => 'required',
            'phone' => 'required',
            'departement_id' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);
        $user->roles()->sync($request->roles);
        $user->departement_id= request('departements');
        $user->name = request('name');
        $user->prenom = request('prenom');
        $user->phone = request('phone');
       // $user->departement = request('departement');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index');
    }
}
