<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    protected $date = ['date'];

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     * 
     */
    protected $fillabel = [
        'mark',
        'model_product',
        'photo',
        'serial_number',
        'description',
    ];


    public function createProduct($request, Model $model)
    {
        try {

            $model->mark = $request->mark;
            $model->model_product = $request->model;
            $model->image = $request->image;
            $model->serial_number = $request->serial_number;
            $model->description = $request->description;
            $model->updated_at = date('d/m/y h:m:s');
            $model->created_at = date('d/m/y h:m:s');
            $res = $model->save();

        } catch (Exception $ex) {
            $res = false;
        }

        return $res;

    }

    public function updateProduct($request)
    {

        try {
            $res = Products::findOrFail($request->id)->update($request->all());

        } catch (Exception $ex) {
            $res = false;
        }

        return $res;

    }

    public function deleteProduct($id)
    {

        $res = Products::findOrFail($id)->delete();
        return $res;

    }


    public function getProduts($id)
    {
        $res = Products::findOrFail($id);
        return $res;
    }
}
