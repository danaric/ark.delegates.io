<?php

namespace App\Http\Controllers\API;

use App\Models\TeamMember;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\TeamMember as TeamMemberResource;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamMembers = QueryBuilder::for(TeamMember::class)
            ->allowedFilters('name', 'role', 'body')
            ->jsonPaginate();

        return TeamMemberResource::collection($teamMembers);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TeamMember $teamMember
     *
     * @return \App\Http\Resources\Delegate
     */
    public function show(TeamMember $teamMember)
    {
        return new TeamMemberResource($teamMember);
    }
}
