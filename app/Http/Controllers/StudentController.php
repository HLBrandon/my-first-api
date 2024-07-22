<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentCreateRequest $request): JsonResponse
    {
        $student = Student::create($request->all());
        return response()->json([
            "status" => true,
            "message" => "Created with exit",
            "data" => new StudentResource($student)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (!Student::where('id', $id)->exists()) {
            return response()->json([
                "status" => false,
                "message" => "Student not found"
            ], 200);
        }
        $student = Student::find($id);
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student): JsonResponse
    {
        $student->update($request->all());
        return response()->json([
            "status" => true,
            "message" => "Updated with exit"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();
        return response()->json([
            "status" => true,
            "message" => "Destroyed with exit"
        ], 200);
    }
}
