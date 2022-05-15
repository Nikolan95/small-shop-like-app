<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $category = Category::findOrFail($this->category_id);
        $data['id'] = $this->id;
        $data['parentCategory'] = $category->rootAncestor->name ?? $category->name;
        $data['category'] = $category->parent ? $category->name : 'no subcategory';
        $data['title'] = $this->title;
        $data['description'] = $this->description;
        $data['price'] = $this->price;
        $data['phone'] = $this->phone;
        $data['location'] = $this->location;
        $data['status'] = $this->status;
        return $data;
    }
}
