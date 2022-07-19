<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Http\Requests\EvaluationRequest;

class EvaluationController extends Controller
{
    public function store(EvaluationRequest $request){
        Evaluation::create([
            'booking_id' => $request->booking_id,
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
        ]);
        return redirect('/mypage');
    }

    public function update(EvaluationRequest $request, $evaluation_id){
        $form = $request->all();
        unset($form['_token']);
        Evaluation::find($evaluation_id)->update($form);
        return redirect('/mypage');
    }

    public function delete(Request $request, $evaluation_id){
        Evaluation::find($evaluation_id)->delete();
        return redirect('/mypage');
    }
}
