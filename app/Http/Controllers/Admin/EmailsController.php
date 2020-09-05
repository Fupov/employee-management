<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Messages;
use App\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $messages = Messages::all()->sortByDesc('created_at');
        return view('admin.emails.index', [
            'messages' => $messages
        ]);
    }
    public function home()
    {
        return view('admin.emails.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.emails.create', [
            'users' => User::all(),
            'authUser' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'to_id' => 'required|integer',
            'message' => 'required',
        ]);
        Messages::create($request->all());
        return redirect(route('emails.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Messages $email
     * @return Application|Factory|View
     */
    public function show(Messages $email)
    {
        return view('admin.emails.details', [
            'messages' => $email,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Messages $email
     * @return Application|Factory|View
     */
    public function edit(Messages $email)
    {
        return view('admin.emails.edit',compact('email'))->with(
            [
                'email'=>$email,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Messages $email
     * @return RedirectResponse|Response
     */
    public function update(Request $request, Messages $email)
    {
        $validatedData = $request->validate([
            'message' => 'required',
        ]);
        $email->message = request('message');
        $email->save();
        return redirect()->route('emails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Messages $email
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Messages $email)
    {
        $email->delete();

        return redirect()->route('emails.index');
    }
}
