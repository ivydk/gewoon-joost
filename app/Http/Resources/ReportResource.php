<?php

namespace App\Http\Resources;

use App\Models\Sections;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $section_ids = Sections::where('report_id', $this->id)->pluck('id');
        $sub_sections_ids = Sections::where('parent_id', $section_ids)->pluck('id');

        return [
//            'id' => $this->id,
            'name' => $this->name,
            'deadline' => $this->deadline,
            'sections' => SectionsResource::collection($this->sections),
        ];
    }

    private function getReportSections($request) {
        if ($request['sections'] === null) {
            return null;
        }

        $returnSections = [];

        foreach($request['sections'] as $section) {
            $s = [
                'name' => $section['name'],
                'deadline' => $section['deadline'],
                'description' => $section['description'],
                'sections' => $this->getSectionSections($section['sections']),

            ];

            $returnSections[] = $s;
        }

        dd($returnSections);

        return $returnSections;

    }

    private function getSectionSections($sections) {
        if ($sections === null) {
            return null;
        }

        $returnSections = [];

        foreach($sections as $section) {
//            dd($section);
           $s = [
                'name' => $section['name'],
                'deadline' => $section['deadline'],
                'description' => $section['description'],
               'sections' => $this->getSectionSections($section['sections']),

           ];

            $returnSections[] = $s;

        }
        return $returnSections;


    }
}
