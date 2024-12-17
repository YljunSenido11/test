<div class="flex p-10 items-center flex-col">
    <h1 class="text-3xl mb-2">PRODUCT</h1>

    @if (session()->has('message'))
        <div class="alert alert-success bg-green-500 text-white mb-4">
            {{session('message')}}
        </div>
    @endif

    
    <div class="mb-6">
        <input wire:model="productname" placeholder="Enter product name" type="text" id="dafault-input" style="width: 250px; padding-left: 25px; padding-right: 25px;" class="block p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('productname')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-6">
        <input wire:model="quantity" placeholder="Enter quantity" type="text" id="dafault-input" style="width: 250px; padding-left: 25px; padding-right: 25px;" class="block p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('quantity')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-6">
        <input wire:model="price" placeholder="Enter price" type="text" id="dafault-input" style="width: 250px; padding-left: 25px; padding-right: 25px;" class="block p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('price')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-6">
    <select wire:model="condition" id="default-select" style="width: 250px; padding-left: 25px; padding-right: 25px;" class="block p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select an option</option>
        <option value="New">New</option>
        <option value="Slightly Used">Slightly Used</option>
        <option value="Old">Old</option>
    </select>
        @error('condition')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-6">
        <textarea wire:model="description" placeholder="Enter product description" id="default-textarea" style="width: 250px; padding-left: 25px; padding-right: 25px;" class="block p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="4"></textarea>
        @error('description')
            <span class="text-red-500 text-sm">{{$message}}</span>
        @enderror
    </div>
    <div>
        <button wire:loading.remove type="submit" wire:click="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        <div wire:loading>
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    
    <div class="relative overflow-x-auto">
        <h2 class="text-2xl font-semibold mb-4 mt-10">Products</h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-10">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Product Name</th>
                    <th class="px-6 py-3">Quantity</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Condition</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_news as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $product->productname }}</td>
                    <td class="px-6 py-4">{{ $product->quantity }}</td>
                    <td class="px-6 py-4">{{ $product->price }}</td>
                    <td class="px-6 py-4">{{ $product->condition }}</td>
                    <td class="px-6 py-4">{{ $product->description }}</td>
                    <td class="px-6 py-4">
                    <button wire:click="edit({{ $product->id }})" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Update</button>
                    <button wire:click="confirmDelete({{ $product->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-600 ml-2">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $product_news->links() }}

<!-- Edit Modal -->
<div x-data="{ open: @entangle('isModalOpen') }" x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h2 class="text-xl font-bold mb-4">Update Product</h2>

        <div class="mb-4">
            <input wire:model="editProductname" type="text" placeholder="Product Name" class="border p-2 w-full rounded-md">
            @error('editProductname') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <input wire:model="editQuantity" type="number" placeholder="Quantity" class="border p-2 w-full rounded-md">
            @error('editQuantity') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <input wire:model="editPrice" type="number" placeholder="Price" class="border p-2 w-full rounded-md">
            @error('editPrice') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <select wire:model="editCondition" class="border p-2 w-full rounded-md">
                <option value="">Select Condition</option>
                <option value="New">New</option>
                <option value="Slightly Used">Slightly Used</option>
                <option value="Old">Old</option>
            </select>
            @error('editCondition') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <textarea wire:model="editDescription" placeholder="Description" class="border p-2 w-full rounded-md"></textarea>
            @error('editDescription') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button wire:click="closeModal" class="bg-red-600 text-white px-3 py-2 rounded-md mr-2">Cancel</button>
            <button wire:click="updateProduct" class="bg-blue-600 text-white px-3 py-2 rounded-md">Update</button>
        </div>
    </div>
</div>

<div x-data="{ open: @entangle('isDeleteModalOpen') }" x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Delete User</h2>
            <p>Are you sure you want to delete this user?</p>

            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" wire:click="closeDeleteModal" class="bg-gray-500 text-white px-4 py-2 rounded text-sm">Cancel</button>
                <button type="button" wire:click="deleteProduct" class="bg-red-600 text-white px-4 py-2 rounded text-sm">Delete</button>
            </div>
        </div>
</div>

</div>