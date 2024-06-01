<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UsersController extends Controller{
    protected string $_path = 'admin.pages.users.';

    public function index(){
        $users = User::where('id', '>', 0);
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'email' => __('Email'),
            'licence' => __('Broj licence')
        ];

        return view($this->_path . 'index', [
            'users' => $users,
            'filters' => $filters
        ]);
    }

    public function create(): View{
        return view($this->_path . 'create');
    }
    public function save(Request $request): RedirectResponse{
        try{
            /* Add username to request parameters; Generated slug */
            $request['username'] = $this->getSlug($request->name);

            /* We need to hash password; for an example keyword password would now be something like $2y$12$UA6HVL/eU/uF/W5v3Bf.CeuWpiF.SR9bhwkwzoMbN7u6SrOg/9D6y */
            /* Since we have password in request, now we are changing it with hashed value */
            $request['password'] = Hash::make($request->password);

            $user = User::create($request->all());
            return redirect()->route('system.users.preview', ['username' => $user->username ]);
        }catch (\Exception $e){}
    }

    /*
     *  Note: On preview and edit, password is deleted; Password change should be done separately
     */
    public function preview($username): View{
        return view($this->_path . 'preview', [
            'user' => User::where('username', $username)->first()
        ]);
    }
    public function edit($username): View{
        return view($this->_path . 'edit', [
            'user' => User::where('username', $username)->first()
        ]);
    }
    public function update(Request $request){
        try{
            /*
             *  Update User, where ID = $request->id ( Id iz forme {{ html()->hidden('id')->class('form-control')->value($user->id) }} )
             *  $request->except(['_token, 'id']) => Means all variables from request except _token (that is @csrf) and ID -> ID never should be updated !!
             */
            User::where('id', $request->id)->update($request->except(['_token', 'id']));

            /*
             *  Now, when we updated user, let's find it by ID so we can redirect to route by username
             */
            $user = User::where('id', $request->id)->first();
            return redirect()->route('system.users.preview', ['username' => $user->username ]);
        }catch (\Exception $e){ dd($e); }
    }
}
