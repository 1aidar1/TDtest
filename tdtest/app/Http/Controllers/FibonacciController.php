<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FibonacciModel;

class FibonacciController extends Controller
{


    public function submit(Request $e){

        //return dd($e->all());

        $validator = \Validator::make($e->all(), [
            'input' => 'required|integer|max:1500|min:-1500'
        ]);

        if ($validator->fails())
        {
            $vError = '';
            foreach ($validator->errors()->all() as $error){
                $vError.=$error;
            }
            return $vError;
        }


        $f_model = new FibonacciModel();
        $x = $e->input('input');
        $f_model->input = $x;
        $ans= FibonacciModel::fibonacci($x);
        $f_model->output = $ans;
        $f_model->save();


        return $ans;
    }
}
