<?php

namespace App\Http\Controllers;

use App\Team;
// use App\Role;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:teams'
        ]) ;

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }


        $result = DB::transaction(function() use ( $request ) {

            try
            {
                $input = $request->all();
                $team = Team::create( $input ) ;
    
                $team->users()->attach( 
                    Auth::user(), ['role_id' => '1']
                );
                return response()->json( [ 'team' => $team ], 400 ) ;
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
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::where('id', $id)
            ->with('users')
            ->get();

        return response()->json( [ 'team' => $team ], 200 ) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    public function join( $id )
    {
        $team = Team::find( $id );

        if ( ! isset( $team ) )
            return response()->json( [ 'error' => 'the team does not exist' ], 422 );
        // validar que el usuario no pertenezca al equipo
                
        $team->users()->attach( 
            Auth::user(), ['role_id' => '2'] );

        return response()->json( [ 'message' => 'joined to team sussefly' ], 200 ) ;
    }

    public function showByName( $name )
    {
        $team = Team::where('name', $name)
            ->with('users')
            ->get();

        return response()->json( [ 'team' => $team ], 200 ) ;
    }

}
