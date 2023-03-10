<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 * path="/courses",
 * summary="Cerate course",
 * operationId="courseCreate",
 * tags={"courses"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","price" , "description"},
 *       @OA\Property(property="name", type="string", format="string", example="برنامه نویسی جاوا"),
 *       @OA\Property(property="price", type="integer", format="string", example="210$"),
 *      @OA\Property(property="description", type="string", format="string", example="نوشته نشده"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="course created successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="name", type="string", format="string", example="برنامه نویسی جاوا"),
 *       @OA\Property(property="price", type="integer", format="string", example="210$"),
 *      @OA\Property(property="description", type="string", format="string", example="نوشته نشده"),
 *     @OA\Property(property="author_id", type="integer", format="integer", example="1"),
 *     @OA\Property(property="created_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *     @OA\Property(property="updated_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *        )
 *     )
 * )
 * @OA\Put(
 * path="/courses/{id}",
 * summary="Cerate course",
 * operationId="courseUpdate",
 * tags={"courses"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="course id",
 *   required=true,
 *  ),
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","price" , "description"},
 *       @OA\Property(property="name", type="string", format="string", example="برنامه نویسی جاوا"),
 *       @OA\Property(property="price", type="integer", format="string", example="210$"),
 *      @OA\Property(property="description", type="string", format="string", example="نوشته نشده"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="course updated succesfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="کتاب با موفقیت آپدیت شد")
 *        )
 *     )
 * )
 * @OA\Delete(
 * path="/courses/{id}",
 * summary="Delete course",
 * operationId="courseDelete",
 * tags={"courses"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="course id",
 *   required=true,
 *  ),
 * @OA\Response(
 *    response=200,
 *     description="course updated successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="کتاب با موفقیت حذف شد")
 *        )
 *     )
 * )
 */


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Course[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Course::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course =Course::create($request->all());
        return $course;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Course::where("id", $id)->first();
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
        Course::where('id', $id)->update($request);

        return response()->json([
            "message"   =>"کرس با موفقیت آپدیت شد."
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
        Course::where("id", $id)->delete();

        return response()->json([
            "message"   =>"کرس با موفقیت آپدیت شد."
        ]);
    }
}
