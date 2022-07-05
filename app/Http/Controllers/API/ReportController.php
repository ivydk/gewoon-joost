<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Models\Sections;
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
     * @param Request $request
     * @return ReportResource
     */
    public function store(ReportRequest $request)
    {
        $params = $request->validated();
        $report = Report::create([
            'name' => $params['name'],
            'deadline' => $params['deadline'],
        ]);

        if ($request->has('sections')) {
            foreach ($request->sections as $section) {
                $this->createSection($section, $report, true);
            }
        }

        return new ReportResource($report);
    }

    private function createSection(array $sections, $parent, bool $isReportAsParent) {
        if ($isReportAsParent) {
            $parentSection = Sections::create([
                'name' => $sections['name'],
                'description' => $sections['description'],
                'deadline' => $sections['deadline'],
                'report_id' => $parent->id
            ]);
        } else {
            $parentSection = Sections::create([
                'name' => $sections['name'],
                'description' => $sections['description'],
                'deadline' => $sections['deadline'],
                'parent_id' => $parent->id
            ]);
        }

        if (array_key_exists('sections', $sections)) {
            if (!is_null($sections['sections'])) {
                foreach ($sections['sections'] as $section) {
                    $this->createSection($section, $parentSection, false);
                }
            }
        }
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
