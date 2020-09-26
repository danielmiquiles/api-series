<?php


namespace App\Http\Middleware;


use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class Autenticador
{
    public function handle(Request $request, \Closure $next)
    {
        try {

            if (!$request->hasHeader('Authorization')) {
                throw new \Exception();
            }
            $auth = $request->header('Authorization');
            $token = str_replace('Bearer ','',$auth);
            $dadosAuth = JWT::decode($token, env('JWT_KEY'), ['HS256']);


            $user =  User::where('email', $dadosAuth->email)->first();

            if(is_null($user)){
                throw new \Exception();
            }


            return $next($request);

        } catch (\Exception $e){
            return response()->json('Não autorizado',401);
        }
    }

}
