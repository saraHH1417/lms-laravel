<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Http\Request;


/**
 * @OA\Post(
 * path="/tests",
 * summary="Cerate test",
 * operationId="testCreate",
 * tags={"tests"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","topic" , "course_id"},
 *       @OA\Property(property="name", type="string", format="string", example="تست بخش دیتابیس"),
 *       @OA\Property(property="topic", type="string", format="string", example="دیتابیس های رابطه ای"),
 *      @OA\Property(property="course_id", type="integer", format="integer", example="1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="test created successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="name", type="string", format="string", example="تست بخش دیتابیس"),
 *       @OA\Property(property="topic", type="string", format="string", example="دیتابیس های رابطه ای"),
 *      @OA\Property(property="course_id", type="integer", format="integer", example="1"),
 *     @OA\Property(property="created_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *     @OA\Property(property="updated_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *        )
 *     )
 * )
 * @OA\Put(
 * path="/tests/{id}",
 * summary="Cerate test",
 * operationId="testUpdate",
 * tags={"tests"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="test id",
 *   required=true,
 *  ),
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","topic" , "course_id"},
 *       @OA\Property(property="name", type="string", format="string", example="تست بخش دیتابیس"),
 *       @OA\Property(property="topic", type="string", format="string", example="دیتابیس های رابطه ای"),
 *      @OA\Property(property="course_id", type="integer", format="integer", example="1"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="test updated succesfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="درس با موفقیت آپدیت شد")
 *        )
 *     )
 * )
 * @OA\Delete(
 * path="/tests/{id}",
 * summary="Delete test",
 * operationId="testDelete",
 * tags={"tests"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="test id",
 *   required=true,
 *  ),
 * @OA\Response(
 *    response=200,
 *     description="test updated successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="درس با موفقیت حذف شد")
 *        )
 *     )
 * )
 */



class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Test[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Test::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Lesson::create($request->all());
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
        Lesson::where("id", $id)->update([
           $request->all()
        ]);
        return response()->json([
            "message"   =>"تست با موفقیت آپدیت شد."
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
            "message"   =>"تست با موفقیت حذف شد."
        ]);
    }
}
