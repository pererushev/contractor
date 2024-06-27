<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractorResource extends JsonResource
{
    public static $wrap = 'contractors';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'contractors',
            'id' => $this->id(),
            'attributes' => [
                'name' => $this->name(),
                'inn' => $this->inn(),
                'email' => $this->email(),
                'created_at' => $this->created_at,
            ],
            'links' => [
                'self' => route('contractor.show', $this->id())
            ]
        ];
    }
    public function with(Request $request)
    {
        return [
            'status' => 'success',
        ];
    }
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->header('Accept', 'application/json');
    }
}
