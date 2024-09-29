<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arma;
use App\Models\armadura;
use App\Models\escudo;
use App\Models\objetoNormal;
use App\Models\InventarioArma;
use App\Models\InventarioArmadura;
use App\Models\InventarioEscudo;
use App\Models\InventarioObjeto;
use Illuminate\Support\Facades\DB;
use App\Models\VistaInventarioArmas;
use App\Models\VistaInventarioArmaduras;
use App\Models\VistaInventarioEscudos;
use App\Models\VistaInventarioObjetosNormales;
use App\Models\VistaEquipoArmas;
use App\Models\VistaEquipoArmaduras;
use App\Models\VistaEquipoEscudos;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;


class InventarioController extends Controller
{
    function insertarArma(Request $request)
    {
        $id_personaje = session()->get('personaje_id');

        $daño = $request['cantidadDados'] . $request['dice'];

        $arma = new arma([
            'nombre' => $request['nombre'],
            'peso' => $request['peso'],
            'dano' => $daño,
            'tipo_dano' => $request['tipo_dano'],
            'descripcion' => $request['description'],
        ]);
        $arma->save();

        $inventario = new InventarioArma([
            'id_arma' => $arma->id_arma,
            'id_inventario' => $id_personaje,
            'cantidad' => $request['cantidad'],
        ]);

        $inventario->save();
        return redirect()->back()->with('success', 'Arma añadida al inventario correctamente.');
    }
    function insertarEscudo($request)
    {
        $id_personaje = session()->get('personaje_id');
        $escudo = new escudo([
            'nombre' => $request['nombre'],
            'peso' => $request['peso'],
            'defensa' => $request['defensa'],
            'descripcion' => $request['description'],
        ]);
        $escudo->save();
        $inventario = new InventarioEscudo();
        $inventario->id_escudo = $escudo->id;
        $inventario->id_inventario = $id_personaje;
        $inventario->cantidad = $request['cantidad'];
        $inventario->save();
        return redirect()->back()->with('success', 'Escudo añadido al inventario correctamente.');
    }
    function insertarArmadura($request)
    {

        $id_personaje = session()->get('personaje_id');
        $armadura = new armadura([
            'nombre' => $request['nombre'],
            'parte' => $request['parte'],
            'peso' => $request['peso'],
            'defensa' => $request['defensa'],
            'descripcion' => $request['description'],
            'tipo' => $request['tipo_armadura'],
        ]);
        $armadura->save();

        $inventario = new InventarioArmadura();
        $inventario->id_armadura = $armadura->id;
        $inventario->id_inventario = $id_personaje;
        $inventario->cantidad = $request['cantidad'];
        $inventario->save();

        return redirect()->back()->with('success', 'Armadura añadida al inventario correctamente.');

    }
    function insertarObjeto($request)
    {
        $id_personaje = session()->get('personaje_id');
        $objeto = new objetoNormal([
            'nombre' => $request['nomber'],
            'peso' => $request['peso'],
            'descripcion' => $request['description'],
        ]);
        $objeto->save();

        $inventario = new InventarioObjeto();
        $inventario->id_objeto = $objeto->id;
        $inventario->id_inventario = $id_personaje;
        $inventario->cantidad->$request['cantidad'];
        $inventario->save();
        return redirect()->back()->with('success', 'Objeto añadido al inventario correctamente.');
    }
    function gestionarInventario()
    {
        $id_personaje = session()->get('personaje_id');

        //obtener el inventario del personaje
        $none = new VistaInventarioArmas();
        $inventarioArmas = $none->obtenerArmasPorPersonaje($id_personaje);


        $none = new VistaInventarioArmaduras();
        $inventarioArmadura = $none->obtenerArmadurasPorPersonaje($id_personaje);
        $none = new VistaInventarioEscudos();
        $inventarioEscudo = $none->obtenerEscudosPorPersonaje($id_personaje);
        $none = new VistaInventarioObjetosNormales();
        $inventarioObjeto = $none->obtenerObjetosPorPersonaje($id_personaje);

        //Obtener el equipo
        $none = new VistaEquipoArmas();
        $equipoArmas = $none->obtenerArmasPorPersonaje($id_personaje);
        $none = new VistaEquipoArmaduras();
        $equipoArmaduras = $none->obtenerArmadurasPorPersonaje($id_personaje);
        $none = new VistaEquipoEscudos();
        $equipoEscudo = $none->obtenerEscudoPersonaje($id_personaje);

        return view('inventario', [
            'inventarioArmas' => $inventarioArmas,
            'inventarioArmadura' => $inventarioArmadura,
            'inventarioEscudo' => $inventarioEscudo,
            'inventarioObjeto' => $inventarioObjeto,
            'equipoArmas' => $equipoArmas,
            'equipoArmaduras' => $equipoArmaduras,
            'equipoEscudo' => $equipoEscudo,
        ]);
    }

    function equiparArma($id)
    {
        $id_personaje = session()->get('personaje_id');
        DB::insert('insert into equipo (id_personaje,id_arma, tipo_equipo) values (?,?,?)', [$id_personaje, $id, 'Arma']);
        return redirect()->back()->with('success', 'Arma equipada correctamente.');
    }
    function equiparArmadura($id)
    {
        $id_personaje = session()->get('personaje_id');
        $parte = DB::table('armaduras')->where('id_armadura', $id)->value('parte');

        DB::insert('insert into equipo (id_personaje, id_armadura, tipo_equipo) values (?,?, ?)', [$id_personaje, $id, $parte]);
        return redirect()->back()->with('success', 'Armadura equipada correctamente.');
    }
    function equiparEscudo($id)
    {
        $id_personaje = session()->get('personaje_id');
        DB::insert('insert into equipo (id_personaje,id_escudo, tipo_equipo) values (?,?,?)', [$id_personaje, $id, 'Escudo']);
        return redirect()->back()->with('success', 'Escudo equipado correctamente.');
    }











    function eliminarArma($id)
    {
        $id_personaje = session()->get('personaje_id');
        DB::delete('delete from inventario where ', [$id, 'Arma']);
        return redirect()->back()->with('success', 'Arma equipada correctamente.');
    }
    function eliminarArmadura($id)
    {
        $id_personaje = session()->get('personaje_id');
        $parte = DB::table('armaduras')->where('id_armadura', $id)->value('parte');

        DB::insert('insert into equipo (id_arma, tipo_equipo) values (?, ?)', [$id, $parte]);
        return redirect()->back()->with('success', 'Armadura equipada correctamente.');
    }
    function eliminarEscudo($id)
    {
        $id_personaje = session()->get('personaje_id');
        DB::delete('delete from equipo where id_escudo=? and id_personaje=?', [$id, $id_personaje]);
        return redirect()->back()->with('success', 'Escudo equipado correctamente.');
    }
}
