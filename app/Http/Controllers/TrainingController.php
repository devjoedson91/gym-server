<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{

    public function __construct(Training $training) { // esse constructor é executado quando a class for instanciado

        $this->training = $training;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Training::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $training = $this->training->create($request->all());

        return $training;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = Training::join('users', 'trainings.user_id', '=', 'users.id')
            ->join('exercises', 'trainings.exercise_id', '=', 'exercises.id')
            ->join('categories', 'exercises.category_id', '=', 'categories.id')
            ->select('trainings.id as training_id', 'categories.name as category', 'exercises.name', 'trainings.day_week', 'trainings.amount_series', 'trainings.amount_repeat', 'trainings.is_completed')
            ->where('trainings.user_id', '=', $id)
            ->get();
            // ->groupBy('category');

        if ($results === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($results, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $training->update([
        //     'is_completed' => true
        // ]); // o metodo all lista todos os params do body da requisição

        // return $training;

        $isCompleted = $request->all()['is_completed'];

        $contents = Training::where('id', '=', $id)
            ->update(array("is_completed" => $isCompleted));

        return $contents;        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        // print_r($training->getAttributes());

        $training->delete();
        return ['msg' => 'O treino foi removido com sucesso'];
    }
}
