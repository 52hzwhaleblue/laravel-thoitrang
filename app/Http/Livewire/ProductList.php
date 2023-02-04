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
        $rowProductList = TableProductList::all();
        return view('admin.template.product.list.list_add',compact('rowProductList'));
    }

    public function updatedName()
    {
        $this->slug = SlugService::createSlug(TableProductList::class, 'slug', $this->name);
    }

    public function storePost()
    {
        $this->validate();

        TableProductList::create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->name = '';
        $this->slug = '';
    }

}
