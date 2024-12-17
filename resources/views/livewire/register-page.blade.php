<div class="flex p-10 items-center flex-col">
    <h1 class="text-3xl mb-2">USER</h1>

    @if (session()->has('message'))
        <div class="alert alert-success bg-green-500 text-white mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-6">
        <input wire:model.live="name" placeholder="Enter your name" type="text" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50">
        @error('name')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-6">
        <input wire:model.live="email" placeholder="Enter email" type="text" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50">
        @error('email')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-6">
        <input wire:model.live="password" placeholder="Password" type="password" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50">
        @error('password')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>

    <button type="submit" wire:click="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>

    <div class="relative overflow-x-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Registered Users</h2>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">{{$user->name}}</td>
                        <td class="px-6 py-4">{{$user->email}}</td>
                        <td class="px-6 py-4">
                            <button wire:click="edit({{$user->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Update</button>
                            <button wire:click="openDeleteModal({{ $user->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($isModalOpen)
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Edit User</h2>

            <!-- Modal Form -->
            <form wire:submit.prevent="updateUser">
                <div class="mb-4">
                    <input wire:model="editName" type="text" placeholder="Name" class="w-full p-2 border border-gray-300 rounded">
                    @error('editName') <span class="text-red-500 text-sm">{{$message}}</span> @enderror
                </div>
                <div class="mb-4">
                    <input wire:model="editEmail" type="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded">
                    @error('editEmail') <span class="text-red-500 text-sm">{{$message}}</span> @enderror
                </div>
                <div class="flex justify-end space-x-4 mt-6">
                    <button type="button" wire:click="closeModal" class="bg-red-600 text-white px-4 py-2 rounded text-sm">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded text-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
@endif

<!-- Delete User Modal -->
@if ($isDeleteModalOpen)
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Delete User</h2>
            <p>Are you sure you want to delete this user?</p>

            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" wire:click="closeDeleteModal" class="bg-gray-500 text-white px-4 py-2 rounded text-sm">Cancel</button>
                <button type="button" wire:click="deleteUser" class="bg-red-600 text-white px-4 py-2 rounded text-sm">Delete</button>
            </div>
        </div>
    </div>
@endif