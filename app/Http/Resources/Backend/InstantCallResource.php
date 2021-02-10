<?php

namespace App\Http\Resources\Backend;

use Illuminate\Http\Resources\Json\JsonResource;

class InstantCallResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'mobile_number' => $this->mobile_number,
            'email'         => $this->email,
            // 'status'        => $this->status,
            'job_status'    => $this->job_status,
            'remarks'       => $this->remarks,
          //   'status'        => '<select class="form-select" aria-label="Default select example">
          //   <option selected>Open this select menu</option>
          //   <option value="1">One</option>
          //   <option value="2">Two</option>
          //   <option value="3">Three</option>
          // </select>'
            // 'job_status'                => $this->job_status,
            // 'category_id'       => $this->category->id ?? '',
            // 'category_name'     => $this->category->category_name ?? '',
            // 'sub_category_id'   => $this->subCategory->id ?? '',
            // 'sub_category_name' => $this->subCategory->sub_category_name ?? '',
            // 'manufacturer_id'   => $this->manufacturer->id ?? '',
            // 'manufacturer_name' => $this->manufacturer->manufacturer_name ?? '',
            // 'generic_id'        => $this->generic->id ?? '',
            // 'generic_name'      => $this->generic->generic_name ?? '',
            // 'unit_id'           => $this->unit->id ?? '',
            // 'unit_name'         => $this->unit->unit_name ?? '',
            // 'description'       => $this->description,
            // 'sale_price'        => $this->sale_price,
            // 'regular_price'     => $this->regular_price,
            // 'product_name'      => $this->product_name,
            // 'weight'            => $this->weight,
            // 'product_model'     => $this->product_model,
            // 'subcategories'     => [$this->subCategory],
            // 'status'            => $this->status,
            // 'statusText'        => $this->status == 1?'Active':'Inactive', 
            // 'button'            => '<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#photo_deails'.$this->id.'">Details</button>',
            // // 'image_path'        => Helper::publicUrl('/').'/'.'images/products/'.$this->images->product_image ?? '',
            // 'imageUrl'          => Helper::publicUrl('/').'/'.'images/products/',
            //  'images'           => $this->productImage,// '<img  style="width:60px; height:60px;" class="img-fluid" src="'.Helper::publicUrl('/').'/'.'images/products/'.$this->images->product_image ?? ''.'">', 
            //  'qr_code'          => $qr,
            //  'download'         => "<a href={$href} target=_parent download>{$qr}</a>",
            //  'productName'      => 'Product Name is ',
            //  'qr_img'           =>$href,
            //  'product_image'    =>ProductImageResource::collection($this->productImage)
             
         ];
    }
}
