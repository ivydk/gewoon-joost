<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ReportResource::collection(Report::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ReportResource
     */
    public function store(ReportRequest $request)
    {
        dd($request);
        $report = Report::create($request->validated());

        return new ReportResource($report);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return ReportResource
     */
    public function show(Report $report)
    {
        return new ReportResource($report);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReportRequest $request
     * @param \App\Models\Report $report
     * @return ReportResource
     */
    public function update(ReportRequest $request, Report $report)
    {
        $report->update($request->validated());

        return new ReportResource($report);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return response()->noContent();
    }
}
