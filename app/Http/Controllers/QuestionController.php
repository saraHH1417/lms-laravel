<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 * path="/questions",
 * summary="Cerate question",
 * operationId="questionCreate",
 * tags={"questions"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"question","answer" , "test_id"},
 *       @OA\Property(property="question", type="string", format="string", example="mysql چند انجین دارد ؟ "),
 *       @OA\Property(property="answer", type="string", format="string", example="۲ انجین / Innodb / myIsam"),
 *      @OA\Property(property="test_id", type="integer", format="integer", example="1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="question created successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="question", type="string", format="string", example="mysql چند انجین دارد ؟ "),
 *       @OA\Property(property="answer", type="string", format="string", example="۲ انجین / Innodb / myIsam"),
 *     @OA\Property(property="test_id", type="integer", format="integer", example="1"),
 *     @OA\Property(property="created_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *     @OA\Property(property="updated_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *        )
 *     )
 * )
 * @OA\Put(
 * path="/questions/{id}",
 * summary="Cerate question",
 * operationId="questionUpdate",
 * tags={"questions"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="question id",
 *   required=true,
 *  ),
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"question","answer" , "test_id"},
 *       @OA\Property(property="question", type="string", format="string", example="mysql چند انجین دارد ؟ "),
 *       @OA\Property(property="answer", type="string", format="string", example="۲ انجین / Innodb / myIsam"),
 *      @OA\Property(property="test_id", type="integer", format="string", example="1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="question updated succesfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="درس با موفقیت آپدیت شد")
 *        )
 *     )
 * )
 * @OA\Delete(
 * path="/questions/{id}",
 * summary="Delete question",
 * operationId="questionDelete",
 * tags={"questions"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="question id",
 *   required=true,
 *  ),
 * @OA\Response(
 *    response=200,
 *     description="question updated successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="درس با موفقیت حذف شد")
 *        )
 *     )
 * )
 */


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Question[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Question::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        return $question;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  Question::where("id", $id)->first();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        Question::where("id", $id)->update($request->all());
        return response()->json([
            "message"   =>"سوال با موفقیت آپدیت شد."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Question::where("id", $id)->delete();
        return response()->json([
            "message"   =>"سوال با موفقیت حذف شد."
        ]);
    }
}
