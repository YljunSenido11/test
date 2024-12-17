<?php

namespace App\Livewire;

use App\Models\ProductNew;
use Livewire\Component;
use Livewire\WithPagination;

class ProductNewPage extends Component
{
    use WithPagination;

    // Existing properties
    public $productname, $quantity, $price, $condition, $description;
    public $editProductId, $editProductname, $editQuantity, $editPrice, $editCondition, $editDescription;
    public $isModalOpen = false;
    
    // Delete modal properties
    public $isDeleteModalOpen = false;
    public $deleteProductId;

    // Submit New Product
    public function submit()
    {
        sleep(2);
        $this->validate([
            'productname' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'condition' => 'required',
            'description' => 'required',
        ]);

        ProductNew::create([
            'productname' => $this->productname,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'condition' => $this->condition,
            'description' => $this->description,
        ]);

        $this->resetFields();
        session()->flash('message', 'Product registered successfully.');
    }

    // Open Edit Modal and Load Product Data
    public function edit($id)
    {
        $product = ProductNew::findOrFail($id);

        $this->editProductId = $product->id;
        $this->editProductname = $product->productname;
        $this->editQuantity = $product->quantity;
        $this->editPrice = $product->price;
        $this->editCondition = $product->condition;
        $this->editDescription = $product->description;

        $this->isModalOpen = true;
    }

    // Update Product
    public function updateProduct()
    {
        $this->validate([
            'editProductname' => 'required',
            'editQuantity' => 'required|integer',
            'editPrice' => 'required|integer',
            'editCondition' => 'required',
            'editDescription' => 'required',
        ]);

        $product = ProductNew::findOrFail($this->editProductId);
        $product->update([
            'productname' => $this->editProductname,
            'quantity' => $this->editQuantity,
            'price' => $this->editPrice,
            'condition' => $this->editCondition,
            'description' => $this->editDescription,
        ]);

        session()->flash('message', 'Product updated successfully.');
        $this->closeModal();
    }

    // Close Edit Modal and Reset Fields
    public function closeModal()
    {
        $this->reset([
            'editProductId', 'editProductname', 'editQuantity', 'editPrice', 'editCondition', 'editDescription',
        ]);
        $this->isModalOpen = false;
    }

    // Reset Registration Fields
    public function resetFields()
    {
        $this->reset(['productname', 'quantity', 'price', 'condition', 'description']);
    }

    // Delete Product
    public function confirmDelete($id)
    {
        $this->deleteProductId = $id;
        $this->isDeleteModalOpen = true;
    }

    // Perform the deletion
    public function deleteProduct()
    {
        $product = ProductNew::findOrFail($this->deleteProductId);
        if ($product) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully.');
        }
        $this->closeDeleteModal();
    }

    // Close Delete Modal
    public function closeDeleteModal()
    {
        $this->isDeleteModalOpen = false;
    }

    public function render()
    {
        return view('livewire.product-new-page', [
            'product_news' => ProductNew::paginate(3),
        ]);
    }
}
