<?php

namespace App\Http\Controllers;

use App\Models\DataGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataGuru = DataGuru::orderBy('name', 'ASC')->get();
        $response = [
            'message' => 'List DataGuru order by name',
            'data' => $dataGuru
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'nisn' => ['required', 'numeric'],
            'jeniskelamin' => ['required', 'in:L,P'],
            'umur' => ['required', 'numeric'],
            'status' => ['required', 'in:PNS,Honorer'],
            'jabatan' => ['required'],
            'mapel' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $dataGuru = DataGuru::create($request->all());
            $response = [
                'message' => 'Data Created!',
                'data' => $dataGuru
            ];

            return response()->json($response, Response::HTTP_CREATED);

        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo 
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataGuru = DataGuru::findOrFail($id);

         $response = [
                'message' => 'Detail Data by ID',
                'data' => $dataGuru
            ];

            return response()->json($response, Response::HTTP_OK);
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
        $dataGuru = DataGuru::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'nisn' => ['required', 'numeric'],
            'jeniskelamin' => ['required', 'in:L,P'],
            'umur' => ['required', 'numeric'],
            'status' => ['required', 'in:PNS,Honorer'],
            'jabatan' => ['required'],
            'mapel' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $dataGuru->update($request->all());
            $response = [
                'message' => 'Data Updated!',
                'data' => $dataGuru
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo 
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataGuru = DataGuru::findOrFail($id);

        try {
            $dataGuru->delete();
            $response = [
                'message' => 'Data Deleted!',
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo 
            ]);
        }
    }
}
