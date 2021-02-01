<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Expediente;
use Illuminate\Http\Request;
use App\Http\Requests\ExpedienteRequest;
use DB;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expedientes = \DB::table("gt_expediente")
        ->leftjoin("gt_graduando_expediente", "gt_graduando_expediente.idexpediente", "=", "gt_expediente.id")
        ->leftjoin("gt_graduando", "gt_graduando.id", "=", "gt_graduando_expediente.idgraduando")
        ->leftjoin("actescu", "actescu.nues", "=", "gt_expediente.nues")
        ->leftjoin("gt_procedimientos", "gt_procedimientos.id", "=", "gt_expediente.idprocedimiento")
        ->leftjoin("gt_tramites", "gt_tramites.id", "=", "gt_procedimientos.idtramite")
        ->leftjoin("gt_roles", "gt_roles.id", "=", "gt_procedimientos.idrol")
        ->leftjoin("gt_colaciones", "gt_colaciones.id", "=", "gt_expediente.idcolacion")
        ->leftjoin("siac_facu", "siac_facu.facu", "=", "actescu.facu")
        ->leftjoin("acdiden", "acdiden.cui", "=", "gt_graduando.cui")
        ->leftjoin("acm_graduado", "acm_graduado.cui", "=", "gt_graduando.cui")
        ->select("gt_expediente.*", "gt_expediente.codigo as codigo", "gt_graduando.id as idgraduando", "gt_graduando.cui as cui", 
        "gt_graduando.email as email", "gt_graduando.telefono_movil as celular", "gt_graduando.direccion as direccion","gt_graduando.name as nombre",
        "actescu.nesc as escuela", "gt_procedimientos.nombre as procedimiento", "gt_tramites.nombre as modalidadobtencion",
        "gt_roles.nombre as rol", "gt_colaciones.fecha as fecha_colacion", "actescu.nesc as escuela", "siac_facu.nfac as facultad", "acdiden.sex as sexo",
        "acdiden.dic as docu_num", "gt_expediente.titulo as titulo", "acm_graduado.grad_cred as creditos", "gt_expediente.url_repo as url", "gt_tramites.nombre as modalidad",
        \DB::raw("(CASE 
        WHEN acdiden.dic like 'D%' THEN 'DNI' 
        WHEN acdiden.dic like 'C%' THEN 'CARNÉ DE EXTRANJERÍA'
        WHEN acdiden.dic like 'P%' THEN 'PASAPORTE'
        ELSE 'sin tipo de documento' END) AS tipo_doc, 
        SUBSTRING_INDEX(SUBSTRING_INDEX(acdiden.apn, '/', -1), ',', 1) as apemat, 
        SUBSTRING_INDEX(acdiden.apn, ',', -1) as nombregrad, 
        SUBSTRING_INDEX(acdiden.apn, '/', 1) as apepat"))
        ->get();          
        //dd($expedientes);
        return Inertia::render('Expedientes/Index', compact('expedientes'));
    }    

    public function show(Expediente $expediente)
    {
        $expedientes = \DB::table('gt_recurso')
            ->leftjoin('gt_archivo', 'gt_archivo.idrecurso', '=', 'gt_recurso.id')
            ->select('gt_recurso.id AS idrecurso', 'gt_archivo.nombre_asignado', 'gt_archivo.nombre_archivo', 'gt_archivo.mime')
            ->where('gt_recurso.idexpediente', $expediente->id)             
            ->get(); 

            $expedientes2 = \DB::table("gt_expediente")
            ->leftjoin("gt_graduando_expediente", "gt_graduando_expediente.idexpediente", "=", "gt_expediente.id")
            ->leftjoin("gt_graduando", "gt_graduando.id", "=", "gt_graduando_expediente.idgraduando")
            ->leftjoin("actescu", "actescu.nues", "=", "gt_expediente.nues")
            ->leftjoin("gt_procedimientos", "gt_procedimientos.id", "=", "gt_expediente.idprocedimiento")
            ->leftjoin("gt_tramites", "gt_tramites.id", "=", "gt_procedimientos.idtramite")
            ->leftjoin("gt_roles", "gt_roles.id", "=", "gt_procedimientos.idrol")
            ->leftjoin("gt_colaciones", "gt_colaciones.id", "=", "gt_expediente.idcolacion")
            ->leftjoin("siac_facu", "siac_facu.facu", "=", "actescu.facu")
            ->leftjoin("acdiden", "acdiden.cui", "=", "gt_graduando.cui")
            ->leftjoin("acm_graduado", "acm_graduado.cui", "=", "gt_graduando.cui")
            ->select("gt_expediente.*", "gt_expediente.codigo as codigo", "gt_graduando.id as idgraduando", "gt_graduando.cui as cui", 
            "gt_graduando.email as email", "gt_graduando.telefono_movil as celular", "gt_graduando.direccion as direccion","gt_graduando.name as nombre",
            "actescu.nesc as escuela", "gt_procedimientos.nombre as procedimiento", "gt_tramites.nombre as modalidadobtencion",
            "gt_roles.nombre as rol", "gt_colaciones.fecha as fecha_colacion", "actescu.nesc as escuela", "siac_facu.nfac as facultad", "acdiden.sex as sexo",
            "acdiden.dic as docu_num", "gt_expediente.titulo as titulo", "acm_graduado.grad_cred as creditos", "gt_expediente.url_repo as url", "gt_tramites.nombre as modalidad",
            \DB::raw("(CASE 
            WHEN acdiden.dic like 'D%' THEN 'DNI' 
            WHEN acdiden.dic like 'C%' THEN 'CARNÉ DE EXTRANJERÍA'
            WHEN acdiden.dic like 'P%' THEN 'PASAPORTE'
            ELSE 'sin tipo de documento' END) AS tipo_doc, 
            SUBSTRING_INDEX(SUBSTRING_INDEX(acdiden.apn, '/', -1), ',', 1) as apemat, 
            SUBSTRING_INDEX(acdiden.apn, ',', -1) as nombregrad, 
            SUBSTRING_INDEX(acdiden.apn, '/', 1) as apepat"))
            ->where("gt_expediente.id", $expediente->id)  
            ->first();
            //dd($expedientes2);

        return Inertia::render('Expedientes/Show', compact('expedientes','expedientes2'));
    }

    public function update($expediente_id) 
    {                   
        try {
            
            /*$exp = \DB::table('gt_expediente')
            ->select('idcolacion')
            ->where('id', $expediente_id)             
            ->get(); 
            $exp = \DB::select('select idcolacion from gt_expediente where id = ?', [$expediente_id]);

            if($exp == 0 || $exp == null){
                $result = ['errorMessage' => 'Este expediente ya fue asignado a una colación'];
            }else{
            */
                $colaciones = \DB::select('select id, cantidad from gt_colaciones where cantidad < maximo LIMIT 1');
                $cantidades = $colaciones[0]->cantidad;
                $upexp = \DB::update('update gt_expediente set idcolacion = ? where id = ? and (idcolacion = null or idcolacion = 0)', [$colaciones[0]->id, $expediente_id]);
                $cantidades = $cantidades + 1;
                $upcol = \DB::update('update gt_colaciones set cantidad = ? where id = ?', [$cantidades, $colaciones[0]->id]);

                $result = ['successMessage' => 'Expediente revisado correctamente'];
            /*}*/
       }
        catch(\Exception $e) {
            $result = ['errorMessage' => 'No se revisó correctamente el expediente'];
            \Log::warning('ExpedienteController@update, Detalle: "'.$e->getMessage().'" on file '.$e->getFile().':'.$e->getLine());           
        }

        return redirect()->back()->with($result);
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