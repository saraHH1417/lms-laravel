<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 * path="/lessons",
 * summary="Cerate lesson",
 * operationId="lessonCreate",
 * tags={"lessons"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","topic" , "description"},
 *       @OA\Property(property="name", type="string", format="string", example="آبجکت در برنامه نویسی"),
 *       @OA\Property(property="topic", type="string", format="string", example="برنامه نویسی"),
 *      @OA\Property(property="description", type="string", format="خذتثطف", example="نوشته نشده"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="lesson created successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="name", type="string", format="string", example="آبجکت در برنامه نویسی"),
 *       @OA\Property(property="topic", type="string", format="string", example="برنامه نویسی"),
 *      @OA\Property(property="description", type="string", format="خذتثطف", example="نوشته نشده"),
 *     @OA\Property(property="course_id", type="integer", format="integer", example="1"),
 *     @OA\Property(property="created_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *     @OA\Property(property="updated_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *        )
 *     )
 * )
 * @OA\Put(
 * path="/lessons/{id}",
 * summary="Cerate lesson",
 * operationId="lessonUpdate",
 * tags={"lessons"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="lesson id",
 *   required=true,
 *  ),
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","topic" , "description"},
 *       @OA\Property(property="name", type="string", format="string", example="آبجکت در برنامه نویسی"),
 *       @OA\Property(property="topic", type="string", format="string", example="برنامه نویسی"),
 *      @OA\Property(property="description", type="string", format="string", example="نوشته نشده"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="lesson updated succesfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="درس با موفقیت آپدیت شد")
 *        )
 *     )
 * )
 * @OA\Delete(
 * path="/lessons/{id}",
 * summary="Delete lesson",
 * operationId="lessonDelete",
 * tags={"lessons"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="lesson id",
 *   required=true,
 *  ),
 * @OA\Response(
 *    response=200,
 *     description="lesson updated successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="درس با موفقیت حذف شد")
 *        )
 *     )
 * )
 */




class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Lesson[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Lesson::all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = Lesson::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Lesson::where("id", $id)->first();
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
        Lesson::where("id", $id)->update($request->all());

        return response()->json([
            "message"   =>"درس با موفقیت آپدیت شد."
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
        Lesson::where("id", $id)->delete();

        return response()->json([
            "message"   =>"درس با موفقیت حذف شد."
        ]);

    }
}
