<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Http\Requests\ExpedienteRequest;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = \DB::table('gt_expediente')
        ->leftjoin('gt_graduando_expediente', 'gt_graduando_expediente.idexpediente', '=', 'gt_expediente.id')
        ->leftjoin('gt_graduando', 'gt_graduando.id', '=', 'gt_graduando_expediente.idgraduando')
        ->leftjoin('actescu', 'actescu.nues', '=', 'gt_expediente.nues')
        ->leftjoin('gt_procedimientos', 'gt_procedimientos.id', '=', 'gt_expediente.idprocedimiento')
        ->leftjoin('gt_tramites', 'gt_tramites.id', '=', 'gt_procedimientos.idtramite')
        ->leftjoin('gt_roles', 'gt_roles.id', '=', 'gt_procedimientos.idrol')
        ->leftjoin('gt_colaciones', 'gt_colaciones.id', '=', 'gt_expediente.idcolacion')
        ->select('gt_expediente.*', 'gt_graduando.id as idgraduando', 'gt_graduando.cui as cui', 
        'gt_graduando.name as nombre', 'gt_graduando.email as email', 'gt_graduando.telefono_movil as celular', 'gt_graduando.direccion as direccion',
        'actescu.nesc as escuela', 'gt_procedimientos.nombre as procedimiento', 'gt_tramites.nombre as modalidadobtencion',
        'gt_roles.nombre as rol', 'gt_colaciones.fecha as fecha_colacion')
        ->get();          

        return Inertia::render('Expedientes/Index', compact('expedientes'));
    }    

    public function show(Expediente $expediente)
    {
        $expedientes = \DB::table('gt_recurso')
            ->leftjoin('gt_archivo', 'gt_archivo.idrecurso', '=', 'gt_recurso.id')
            ->select('gt_recurso.id AS idrecurso', 'gt_archivo.nombre_asignado', 'gt_archivo.nombre_archivo', 'gt_archivo.mime')
            ->where('gt_recurso.idexpediente', $expediente->id)             
            ->get(); 
            //dd($expedientes);
        return Inertia::render('Expedientes/Show', compact('expedientes'));
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function mostrar($idrecurso)
    {
        
        $archivo = \DB::table('gt_archivo')
                        ->select('nombre_asignado','mime', 'data')
                        ->where('idrecurso', $idrecurso)
                        ->first();       
        $nombre_asignado = $archivo->nombre_asignado;
        $mime = $archivo->mime;
        $data = $archivo->data;       
        
        switch ($mime) {
            case 'application/pdf':
                $extension = '.pdf';
                break;
            case 'image/png':
                $extension = '.png';
                break;
            case 'image/jpeg':
                $extension = '.jpg';
                break;
        }	

        $data = base64_decode($data);

        return response($data, 200, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . $nombre_asignado . $extension . '"',
        ]);
    }
}