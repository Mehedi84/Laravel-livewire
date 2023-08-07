<?php

namespace App\Http\Livewire\Admin\Users;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

use Livewire\Component;

class UserList extends Component
{
    public $showModal = true;
    public $user;
    public $state = [];


    public function addNewUser()
    {
        $this->showModal=true;
        $this->dispatch('show-modal');
    }

    public function create()
    {
        $validated = Validator::make($this->state, [
            'name'    => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required',
        ])->validate();
            // Data to validate...

         User::create($this->state);  // create a new user

         $this->dispatch('hide-modal', message: 'User Added Successfully!!'); // hide modal

    }

    public function edit(User $user)
    {
        $this->showModal=false;
        $this->state = $user->toArray();
        $this->user = $user;
        $this->dispatch('show-modal');
    }

    public function update(){
        $validated = Validator::make($this->state, [
            'name'    => 'required',
            'email'    => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|required',
        ])->validate();
            // Data to validate...
            $this->user->update($this->state);
            $this->dispatch('hide-modal', message: 'User Update Successfully!!'); // hide modal
    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->dispatch('hide-modal', message: 'User Delete Successfully!!'); // hide modal
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.admin.users.user-list', [
            'users' => $users,
        ]);
    }
}
