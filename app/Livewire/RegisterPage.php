<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterPage extends Component
{
    public $name, $email, $password;
    public $editUserId, $editName, $editEmail;
    public $isModalOpen = false;
    public $isDeleteModalOpen = false; // Delete modal state
    public $userIdToDelete;

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->reset(['name', 'email', 'password']);
        session()->flash('message', 'Register Successful');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Fill in the modal form with the current user's data
        $this->editUserId = $user->id;
        $this->editName = $user->name;
        $this->editEmail = $user->email;

        // Open the modal
        $this->isModalOpen = true;
    }

    public function updateUser()
    {
        $this->validate([
            'editName' => 'required|min:2',
            'editEmail' => 'required|email|unique:users,email,' . $this->editUserId,
        ]);

        $user = User::findOrFail($this->editUserId);
        $user->update([
            'name' => $this->editName,
            'email' => $this->editEmail,
        ]);

        session()->flash('message', 'User updated successfully.');
        $this->closeModal();
    }

    public function openDeleteModal($id)
    {
        $this->userIdToDelete = $id;
        $this->isDeleteModalOpen = true;
    }

    public function deleteUser()
    {
        User::findOrFail($this->userIdToDelete)->delete();
        session()->flash('message', 'User deleted successfully.');
        $this->closeDeleteModal();
    }

    public function closeModal()
    {
        $this->reset(['editUserId', 'editName', 'editEmail']);
        $this->isModalOpen = false;
    }

    public function closeDeleteModal()
    {
        $this->isDeleteModalOpen = false;
    }

    public function render()
    {
        return view('livewire.register-page', [
            'users' => User::all(),
        ]);
    }
}
