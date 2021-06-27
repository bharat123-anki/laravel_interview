<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    //
  }

  public function getAllTodo()
  {
    try {
      return response()->json(Todo::all(), 200);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 400);
    }
  }

  public function getTodoById($id = '')
  {

    try {
      $todo = Todo::find($id);
      if (is_null($todo)) {
        return response()->json(['message' => 'Todo Does not exist For given id'], 404);
      }
      return response()->json($todo::find($id), 200);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 400);
    }
  }

  public function addTodo(Request $request)
  {

    $fields = $request->validate([
      'title' => 'required',
      'description' => 'required',
    ]);
    try {
      $todo = Todo::create($request->all());
      return response()->json($todo, 201);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 400);
    }
  }

  public function updateTodo(Request $request, $id = '')
  {
    try {
      $todo = Todo::find($id);
      $required = ['title' => 'Please Insert Title', 'description' => 'Please Insert Description'];
      foreach ($required as $key => $value) {
        if (isset($_REQUEST[$key])) {
          if (empty($_REQUEST[$key])) {
            return response()->json(['message' => $value], 203);
          }
        }
      }

      if (is_null($todo)) {
        return response()->json(['message' => 'Todo Does not exist For given id'], 404);
      } else {

        $todo->update($request->all());
        return response()->json($todo, 200);
      }
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 400);
    }
  }

  public function deleteTodo(Request $request, $id = '')
  {
    try {
      $todo = Todo::find($id);
      if (is_null($todo)) {
        return response()->json(['message' => 'Todo Does not exist For given id'], 404);
      }
      $todo->delete();
      return response()->json(null, 204);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), 400);
    }
  }
}
