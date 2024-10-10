<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Auth;
use Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $res = Auth::check();
        if ($res) {
            $model = new Products();
            $res = $model::all();
            return view('home.home', ['products' => $res]);
        }

    }

    public function create(Request $request)
    {


        if (
            isset($request->mark) || !empty($request->mark) ||
            isset($request->model) || !empty($request->model)
        ) {

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move(public_path('imageProducts'), $imageName);
                $request->image = $imageName;
            }
            $model = new Products();
            $res = $model->createProduct($request, $model);

            if ($res) {
                $res = redirect()->back()->with('success', 'Products created successfully');
            } else {
                $res = redirect()->back()->with('error', 'Products were not created successfully');
            }

        } else {
            $res = redirect()->back()->with('error', 'Some fields are mandatory such as brand and model');
        }

        return $res;

    }

    public function destroy($id)
    {

        $model = new Products();
        $model->deleteProduct($id);
        return redirect()->back()->with('success', 'Products excluded successfully');

    }

    public function getId($id)
    {
        $id = intval($id);
        $model = new Products();
        $res = $model::all();
        $object = $model->getProduts($id);
        return view('home.home', ['products' => $res, 'object' => $object, compact('object')]);
    }

    public function updates(Request $request)
    {
        $imageName = '';
        if (
            isset($request->mark) || !empty($request->mark) ||
            isset($request->model) || !empty($request->model)
        ) {

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $request->image->move(public_path('imageProducts'));
                $request->image = $imageName;
            }

            $model = new Products();
            $res = $model->updateProduct($request);

            if ($res) {
                $res = redirect('/home')->with('success', 'Products to update successfully');
            } else {
                $res = redirect('/home')->with('error', 'Products were not to update successfully');
            }

        } else {
            $res = redirect()->back()->with('error', 'Some fields are mandatory such as brand and model');
        }

        return $res;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
