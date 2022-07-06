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
        return [
//            'id' => $this->id,
            'name' => $this->name,
            'deadline' => $this->deadline,
            'sections' => $this->getReportSections($request),
        ];
    }

    private function getReportSections($request) {
        if ($request['sections'] === null) {
            return null;
        }

        $returnSections = [];

//        dd($request);
        foreach($request['sections'] as $section) {
//            dd($section);
            $s = [
                'sections' => $this->getSectionSections($section['sections']),
                'name' => $section['name'],
                'deadline' => $section['deadline'],
                'description' => $section['description']
            ];

            $returnSections[] = $s;
        }

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
                'sections' => $this->getSectionSections($section['sections']),
                'name' => $section['name'],
                'deadline' => $section['deadline'],
                'description' => $section['description']
            ];

            $returnSections[] = $s;

        }
        return $returnSections;


    }
}
