<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function verifyUser(Request $request)
    {
        $messages = [
            'exists' => 'El :attribute no existe, por favor verifique',
            'regex' => 'El :attribute no es válido, por favor verifique',
        ];
        $niceNames = array(
            'NIT' => 'NIT',
        );
        $this->validate($request, [
            'email' => 'required|email|max:255|exists:users,email',
            'NIT' => 'nullable|regex:/(^[a-zA-Z0-9]{1,15}-[0-9]{1}$)/|max:17|exists:users,NIT',
        ], $messages, $niceNames);

        session(['email' => $request->email]);

        return response()->json('true');
    }

    public function create(Request $request)
    {
        $messages = [
            'unique' => 'El :attribute ya existe, por favor verifique',
            'regex' => 'El :attribute no es válido, por favor verifique',
            'exists' => 'El :attribute no existe, por favor verifique',
        ];
        $niceNames = array(
            'rdPersona' => 'Verifique el tipo de persona',
            'rdOption' => 'Necesitar elegir que la opción "Quiero registrarme ahora"',
            'ddTipoIdentificacion' => 'tipo de identificación',
            'txtNumeroIdentificacion' => 'número de identificación o nit',
            'txtNombre' => 'nombre',
            'txtNumeroCelular' => 'número celular',
            'txtDireccion' => 'dirección',
        );
        $this->validate($request, [
            'rdPersona' => 'required|in:0,1',
            'rdOption' => 'required|in:Now',
            'ddTipoIdentificacion' => 'nullable|exists:tiposdocumento,id',
            'txtNumeroIdentificacion' => 'required|max:20|unique:users,txtNumeroIdentificacion',
            'email' => 'required|email|max:255|unique:users,email',
            'txtNombre' => 'required|string|max:255',
            'txtNumeroCelular' => 'required|string|max:20',
            'txtDireccion' => 'required|string|max:100',
        ], $messages, $niceNames);

        $request->request->add(['name' => $request->txtNombre, 'password' => Hash::make($request->email)]);
        $createUser = User::create($request->all());
        if ($createUser) {
            session(['email' => $request->email]);
            return response()->json($request->all());
        }
    }
}
