<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios =DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi','=' ,'tb_departamento.depa_codi')
        ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
        ->get();
        return view('municipio.index',['municipios' => $municipios]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $municipio = new Municipio();

        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->depa_codi = $request->depa_codi;
        $municipio->save();
        return view('municipio.index',['municipios' => $municipios]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $validate=Validator::make($request->all(),[
            'muni_nomb' =>['required', 'max:30', 'unique'],
            'depa_codi' => ['require', 'numeric', 'min:1']
        ]);

        if($validate->fails()){
            return response()->json([
                'msg'=>'Se produjo un error en la validación de la informacion.',
                'statusCode' =>400
            ]);
        }

        $municipio =Municipio::find($id);
        if(is_null($municipio)){
            return abort(404);
        }

        $departamentos =DB::table('tb_departamento')
        ->orderBy('depa_nomb')
        ->get();
         return json_encode(['municipio'=>$municipio, 'departamentos' => $departamentos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate=Validator::make($request->all(),[
            'muni_nomb' =>['required', 'max:30', 'unique'],
            'depa_codi' => ['require', 'numeric', 'min:1']
        ]);

        if($validate->fails()){
            return response()->json([
                'msg'=>'Se produjo un error en la validación de la informacion.',
                'statusCode' =>400
            ]);
        }

        $municipio=Municipio::find($id);
        if(is_null($municipio)){
            return abort(404);
        }

        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->depa_codi = $request->depa_codi;
        $municipio->save();
        return view('municipio.index',['municipios' => $municipios]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $municipio=Municipio::find($id);
        if(is_null($municipio)){
            return abort(404);
        }
        $municipio->delete();


        $municipios =DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi','=' ,'tb_departamento.depa_codi')
        ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
        ->get();
        return view('municipio.index',['municipios' => $municipios]);

    }
}
