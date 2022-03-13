<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    //muestra registros de la base de datos
    public function getAllProjects() {

        //trae todos los registros de la tabla Project
        /* $projects = Project::all();
        return $projects; */

        //si tuveramos muchos datos con chunk trae datos por lotes hasta traerlos todos
        /* Project::chunk(200, function ($projects) {
            foreach ($projects as $project) {
                //Aquí escribimos lo que haremos con los datos (operar, modificar, etc)
            }
        }); */


        //tenemos dos métodos que nos ayudan a manejar una excepción. si no encuentra el modelo findOrFail
        //$project = Project::findOrFail(1);

        //firstOrFail -> retornan excepciones
        //$project = Project::where('is_active', '=', 1)->firstOrFail();


        //variación esta solo trae 10 registros de la base de datos y los ordena
        $projects = Project::orderBy('project_id', 'desc')
                            ->take(10)
                            ->get();
        return $projects;
    }

    //inserta registros en la base de datos
    public function insertProject() {
        //insertar datos de manera estatica
        $project = new Project;
        $project->city_id = 1;
        $project->company_id = 1;
        $project->user_id = 1;
        $project->name = 'Nombre del proyecto';
        $project->execution_date = '2020-04-30';
        $project->is_active = 1;
        $project->save();

        return "Guardado";
    }

    public function insertProject2(Request $request) {
        //insertar datos de manera dinamica ya sea con un formulario
        $project = new Project;
        $project->city_id = $request->cityId;
        $project->company_id = $request->companyId;
        $project->user_id = $request->userId;
        $project->name = $request->name;
        $project->execution_date = $request->executionDate;
        $project->is_active = $request->isActive;
        $project->save();
    }

    public function insertProject3() {
        $project = new Project;
        $project->name = 'Nombre del proyecto';
        $project->save();

        foreach (range(0, 30) as $number) {
            $user = new User;
            $user->name = "User - {$number}";
            $user->save();

            $company = new Company;
            $company->name = "Company - {$number}";
            $company->save();

            $city = new City;
            $city->name = "City - {$number}";
            $city->save();

            return "listo";
        }
    }

    //actualizar un proyecto
    public function updateProject() {

        //busca un proyecto y le actualiza el nombre
       /*  $project = Project::find(8);
        $project->name = 'Proyecto de tecnología';
        $project->save(); */

        //actualizar registros en bloques que cumplan condiciones específicas de acuerdo a sus campos en la base de datos
        Project::where('is_active', 1)
        ->where('city_id', 4)
        ->update(['execution_date' => '2022-02-03', 'name' => 'proyecto Vue']);


        return "Actualizado";
    }


    //eliminar rgistros de la bd
    public function destroy(){

        $project = Project::find(4);
        $project->delete();

        //otras formas de eliminar
       /*  Project::destroy(1);
        Project::destroy(1, 2, 3);
        Project::destroy([1, 2, 3]); */

        //eliminar sino tenemos un id especifico
        //Project::where('is_active', 0)->delete();

        //otra forma eliminaremos todos los proyectos cuyo project_id sea mayor a 15
        //$project = Project::where('project_id', '>', 15)->delete();

        return 'eliminado';

    }
}
