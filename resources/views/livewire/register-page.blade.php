<div class="flex p-10 items-center flex-col">
    <h1 class="text-3xl mb-2">USER</h1>

    @if (session()->has('message'))
        <div class="alert alert-success bg-green-500 text-white mb-4">
            {{session('message')}}
        </div>
    @endif

    
    <div class="mb-6">
        <input wire:model.live="name" placeholder="Enter your name" type="text" id="dafault-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('name')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-6">
        <input wire:model.live="email" placeholder="Enter email" type="text" id="dafault-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('email')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-6">
        <input wire:model.live="password" placeholder="Password" type="password" id="dafault-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('password')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" wire:click="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>