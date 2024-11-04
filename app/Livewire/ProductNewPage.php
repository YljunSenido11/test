<?php

namespace App\Livewire;

use App\Models\ProductNew;
use Livewire\Component;
use Livewire\WithPagination;

class ProductNewPage extends Component
{
    use WithPagination;

    public $productname;
    public $quantity;
    public $price;
    public $condition;
    public $description;

    public function submit(){

        sleep(2);
        $this->validate([
            'productname'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'condition'=>'required',
            'description'=>'required'
        ]);

        ProductNew::create([
            'productname' => $this->productname,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'condition' => $this->condition,
            'description' => $this->description,
        ]);

        $this->reset(['productname','quantity','price','condition','description']);
        session()->flash('message','Register Successful');
    }

    public function render()
    {
        return view('livewire.product-new-page',[
            'product_news' => ProductNew::paginate(2),
        ]);
    }
}
