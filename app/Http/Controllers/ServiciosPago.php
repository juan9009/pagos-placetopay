<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthWebService;
use Cache;
use Exception;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use SoapClient;
use \App\Transaction;
use \App\User;

// require_once str_replace("\\", "/", dirname(__FILE__)) . '/PsePerson.php';

class ServiciosPago extends Controller
{

    public $AuthWebService;

    public function __construct()
    {
        $this->AuthWebService = new AuthWebService();
        $this->ipAddress = $this->Ip();
        $this->userAgent = $this->Browser();
    }

    public function index()
    {
        return redirect('pago/bancos');
    }

    public function getBankList()
    {
        $listaBancos = Cache::get('bancos');
        if (empty($listaBancos)) {
            $urlpse = $this->AuthWebService->url;
            $client = new SoapClient($urlpse);

            // dd($client->getBankList($this->AuthWebService->auth));

            $bancos = $client->getBankList($this->AuthWebService->auth);
            if (isset($bancos->getBankListResult->item) && $bancos->getBankListResult->item != null) {
                $bancos = collect($bancos->getBankListResult->item);
                $listaBancos = $bancos->pluck('bankName', 'bankCode');

                // Cachear los bancos por 1 día
                $expiresAt = now()->addMinutes(1440);
                Cache::add('bancos', $listaBancos, $expiresAt);
                // return response()->json($result->getBankListResult->item);
            } else {
                throw new Exception("No se pudo obtener la lista de entidades financieras, por favor intente mas tarde");
            }
        }
        return view('escoger-banco',
            compact('listaBancos'));

    }

    public function iniciarPago(Request $request)
    {
        if (!empty($request->all())) {
            if ($request->has('banco') && $request->banco == 0) {
                $error = ValidationException::withMessages([
                    'banco' => ['Por favor seleccione un banco'],
                ]);
                throw $error;
            }
            $customMessages = [
                'required' => 'Por favor seleccione el :attribute',
            ];

            $this->validate($request, [
                'banco' => 'required',
            ], $customMessages);

            // guardamos una sesion con el banco escogido
            session(['banco' => $request->banco]);
        } else {
            if (!$request->session()->has('banco')) {
                return redirect('pago/bancos');
                // $request->session()->forget('banco');
                // $request->session()->flush();
            }
        }
        return view('iniciar-pago');
    }

    public function confirmarPagoBanco(Request $request)
    {
        if (!empty($request->all())) {
            if (!$request->session()->has('banco')) {
                return redirect('pago/iniciarpago');
                // $request->session()->forget('banco');
                // $request->session()->informacionpagoflush();
            }
        }
        return view('confirmar-pago-banco');
    }

    public function informacionPago(Request $request)
    {
        $urlpse = $this->AuthWebService->url;
        $client = new SoapClient($urlpse);
        $PSETransactionResponse​ = $client->getTransactionInformation(
            [
                'auth' => $this->AuthWebService->paramAuth,
                'transactionID' => session('transactionID'),
            ]
        );
        $transaccion = $PSETransactionResponse​->getTransactionInformationResult;
        $msg = 'Transacción ' . $transaccion->responseReasonText;
        if ($transaccion->responseCode == 0) {
            Flash::error($msg);
        } else if ($transaccion->responseCode == 1) {
            Flash::success($msg);
        } else {
            Flash::warning($msg);
        }
        return view('informacionpago', compact('transaccion'));
    }

    public function realizarPago(Request $request)
    {
        if (!empty($request->all())) {
            if (!$request->session()->has('banco')) {
                return redirect('pago/iniciarpago');
                // $request->session()->forget('banco');
                // $request->session()->flush();
            }
        }
        return view('realizarpago');
    }

    public function getPayer()
    {
        return [
            'document' => '1067891941',
            'documentType' => 'CC',
            'firstName' => 'Juan Guillermo',
            'lastName' => 'Leal Parra',
            'company' => 'PlacetoPay',
            'emailAddress' => 'juanglealp@gmail.com',
            'address' => 'Mz 43 Lt 24 Canta Claro',
            'city' => 'Montería',
            'province' => 'Córdoba',
            'country' => 'Colombia',
            'phone' => '7863800',
            'mobile' => '3014993527',
        ];
    }

    public function getBuyer()
    {
        $user = User::first();
        $parts = explode(" ", $user->name);
        $count = count($parts);
        if ($count >= 3) {
            $lastname = $parts[$count - 2] . ' ' . $parts[$count - 1];
            $firstname = $parts[0];
        } else {
            $lastname = $parts[$count - 1];
            $firstname = $parts[0];
        }
        return [
            'document' => $user->txtNumeroIdentificacion,
            'documentType' => $user->tipoidentificacion->type,
            'firstName' => $firstname,
            'lastName' => $lastname,
            'company' => 'PlacetoPay',
            'emailAddress' => $user->email,
            'address' => $user->txtDireccion,
            'city' => 'Montería',
            'province' => 'Córdoba',
            'country' => 'Colombia',
            'phone' => '7863800',
            'mobile' => $user->txtNumeroCelular,
        ];
    }

    public function getShipping()
    {
        return [
            'document' => '111111-2',
            'documentType' => 'NIT',
            'firstName' => 'EGMINGENIERIA SIN FRONTERAS',
            'lastName' => '',
            'company' => 'EGMINGENIERIA SIN FRONTERAS',
            'emailAddress' => 'egmingenieria@gmail.com',
            'address' => 'Crr 4 # 65-6 Of. 304',
            'city' => 'Medellín',
            'province' => 'Antioquia',
            'country' => 'Colombia',
            'phone' => '3562345',
            'mobile' => '3016453245',
        ];
    }

    public function createTransaction(Request $request)
    {
        if ($request->has('banco') && $request->banco == 0) {
            $error = ValidationException::withMessages([
                'banco' => ['Por favor seleccione un banco'],
            ]);
            throw $error;
        }
        $customMessages = [
            'required' => 'Por favor seleccione el :attribute',
        ];

        $this->validate($request, [
            'banco' => 'required|in:' . Cache::get('bancos')->keys(),
            'cuenta' => 'required|in:0,1',
        ], $customMessages);

        $urlpse = $this->AuthWebService->url;
        $client = new SoapClient($urlpse);

        // dd($client->getBankList($this->AuthWebService->auth));

        /*$user = User::infoSession();
        if ($user->ddTipoIdentificacion == 31) {
        $interfazPersona = 1;
        } else {
        $interfazPersona = 0;
        }*/

        $PSETransactionResponse​ = $client->createTransaction(
            [
                'auth' => $this->AuthWebService->paramAuth,
                'transaction' => [
                    'bankCode' => session('banco'),
                    'bankInterface' => $request->cuenta,
                    'returnURL' => $request->getSchemeAndHttpHost() . '/pago/informacionpago',
                    'reference' => date('dmYHis'),
                    'description' => 'Prueba PlacetoPay',
                    'language' => 'ES',
                    'currency' => 'COP',
                    'totalAmount' => 100.000,
                    'taxAmount' => 0,
                    'devolutionBase' => 0,
                    'tipAmount' => 0,
                    'payer' => $this->getPayer(),
                    'buyer' => $this->getBuyer(),
                    'shipping' => $this->getShipping(),
                    'ipAddress' => $_SERVER['REMOTE_ADDR'],
                    'userAgent' => $_SERVER['HTTP_USER_AGENT'],
                    'additionalData' => [],
                ],
            ]
        );
        // dd($PSETransactionResponse​);
        $resulTransaction = $PSETransactionResponse​->createTransactionResult;
        Transaction::create([
            'transactionID' => $resulTransaction->transactionID,
            'responseCode' => $resulTransaction->responseCode,
            'responseReasonText' => $resulTransaction->responseReasonText,
        ]);
        session(['transactionID' => $resulTransaction->transactionID]);
        if (isset($resulTransaction->returnCode) && $resulTransaction->returnCode == 'SUCCESS') {
            if (isset($resulTransaction->bankURL)) {
                return redirect()->to($resulTransaction->bankURL);
            }
        } else {
            $error = ValidationException::withMessages([
                'transaction' => ['Su transacción está en estado ' . $resulTransaction->returnCode],
            ]);
            throw $error;
        }

    }

    public function params()
    {
        return $this->AuthWebService->paramAuth;
    }

    private function Ip()
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }
        return $ipAddress;
    }

    private function Browser()
    {
        $browser = array("IE", "OPERA", "MOZILLA", "NETSCAPE", "FIREFOX", "SAFARI", "CHROME");
        $os = array("WIN", "MAC", "LINUX");
        $info['browser'] = "OTHER";
        $info['os'] = "OTHER";
        foreach ($browser as $parent) {
            $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
            $f = $s + strlen($parent);
            $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
            $version = preg_replace('/[^0-9,.]/', '', $version);
            if ($s) {
                $info['browser'] = $parent;
                $info['version'] = $version;
            }
        }
        foreach ($os as $val) {
            if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $val) !== false) {
                $info['os'] = $val;
            }

        }
        return $info['browser'] . ' ' . $info['version'];
    }
}
