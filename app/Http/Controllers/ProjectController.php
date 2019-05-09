<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user() ;

        $user = User::where( 'id', $user->id )
            ->with('projects')
            ->with('project_role')
            ->get() ;

        return response()->json([ 'user' => $user ], 200) ;
        // return response()->json([ 'projects' => $user->projects]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name' => 'required|unique:projects' ,
            'description' => 'required' ,
            'project_role_id' => 'required'
        ]) ;

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }

        
        $result = DB::transaction(function() use ( $request ) {
            
            try
            {
                // dd('test') ;
                $input = $request->all();
                $project = Project::create( $input ) ;
    
                $project->users()->attach( 
                    Auth::user(), ['project_role_id' => $request->project_role_id ]
                );
                return response()->json( [ 'project' => $project ], 200 ) ;
            }
            catch (\Exception $e)
            {
                DB::rollback() ;
                return response()->json( [ 'error' => $e->getMessage() ] ) ;
            }
        } ) ;
        
        return $result ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::where('id', $id)
            ->with('users')
            ->get();

        return response()->json( [ 'project' => $project ], 200 ) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
