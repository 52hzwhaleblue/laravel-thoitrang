<?php

namespace App\Http\Livewire;

use App\Models\TableProductList;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

class ProductList extends Component
{
    public $name;
    public $slug;

    protected $rules = [
        'name' => 'required|max:100',
        'slug' => 'required|max:100'
    ];

    public function render()
    {
        $productList = TableProductList::latest('id')->take(5)->get();

        return view('admin.template.product.list.list_add', compact('productList'));
    }

    public function updatedName()
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $this->name);
    }

    public function storePost()
    {
        $this->validate();

        Post::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->name = '';
        $this->slug = '';
    }
}
