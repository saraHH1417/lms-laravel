<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Doctrine\Inflector\Rules\NorwegianBokmal\Inflectible;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 * path="/books",
 * summary="Cerate Book",
 * operationId="boookCreate",
 * tags={"books"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","topic" , "description"},
 *       @OA\Property(property="name", type="string", format="string", example="موش و گربه"),
 *       @OA\Property(property="topic", type="string", format="string", example="کودکان"),
 *      @OA\Property(property="description", type="string", format="خذتثطف", example="نوشته نشده"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="Book created successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="name", type="string", format="string", example="موش و گربه"),
 *       @OA\Property(property="topic", type="string", format="string", example="کودکان"),
 *      @OA\Property(property="description", type="string", format="خذتثطف", example="نوشته نشده"),
 *     @OA\Property(property="author_id", type="integer", format="integer", example="1"),
 *     @OA\Property(property="created_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *     @OA\Property(property="updated_at", type="date", format="dateTime", example="2023-01-19T14:09:23.000000Z"),
 *        )
 *     )
 * )
 * @OA\Put(
 * path="/books/{id}",
 * summary="Cerate Book",
 * operationId="boookUpdate",
 * tags={"books"},
 * @OA\Parameter(
*   name="id",
*   in="query",
*   description="Book id",
*   required=true,
 *  ),
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"name","topic" , "description"},
 *       @OA\Property(property="name", type="string", format="string", example="موش و گربه"),
 *       @OA\Property(property="topic", type="string", format="string", example="کودکان"),
 *      @OA\Property(property="description", type="string", format="string", example="نوشته نشده"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *     description="Book updated succesfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="کتاب با موفقیت آپدیت شد")
 *        )
 *     )
 * )
 * @OA\Delete(
 * path="/books/{id}",
 * summary="Delete Book",
 * operationId="bookDelete",
 * tags={"books"},
 * @OA\Parameter(
 *   name="id",
 *   in="query",
 *   description="Book id",
 *   required=true,
 *  ),
 * @OA\Response(
 *    response=200,
 *     description="Book updated successfully",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="کتاب با موفقیت حذف شد")
 *        )
 *     )
 * )
 */


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Book[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return  $book;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::where("id", $id)->first();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::where("id", $id)->update($request->all());

        return response()->json([
            "message"   =>"کتاب با موفقیت آپدیت شد"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where("id", $id)->delete();

        return  response()->json([
           "message"    => "کتاب با موفقیت حذف شد"
        ]);
    }
}
