<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 * path="/categories",
 * summary="Cerate categorie",
 * operationId="categoryCreate",
 * tags={"categories"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name"},
 *       @OA\Property(property="name", type="string", format="string", example="موش و گربه"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="categorie created successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="name", type="string", format="string", example="کودکان"),
 *     @OA\Property(property="created_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *     @OA\Property(property="updated_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *        )
 *     )
 * )
 * @OA\Put(
 * path="/categories/{id}",
 * summary="Cerate categorie",
 * operationId="categoryUpdate",
 * tags={"categories"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="categorie id",
 *   required=true,
 *  ),
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","name"},
 *       @OA\Property(property="name", type="string", format="string", example="کودکان"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="categorie updated succesfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="دسته بندی با موفقیت آپدیت شد")
 *        )
 *     )
 * )
 * @OA\Delete(
 * path="/categories/{id}",
 * summary="Delete categorie",
 * operationId="categorieDelete",
 * tags={"categories"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="categorie id",
 *   required=true,
 *  ),
 * @OA\Response(
 *    response=200,
 *     description="categorie updated successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="دسته بندی با موفقیت حذف شد")
 *        )
 *     )
 * )
 */

class CategroyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Category[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        return $category;
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
        Category::where("id", $id)->update($request->all());
        return response()->json([
            "message"   =>"دسته بندی با موفقیت آپدیت شد."
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
        Category::where("id", $id)->delete();
        return response()->json([
            "message"   =>"دسته بندی با موفقیت حذف شد"
        ]);
    }
}
