<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;
use App\Traits\ApiRespone;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    use ApiRespone;
    private AuthService $AuthService;
    public function __construct(AuthService $AuthService){
     $this->AuthService = $AuthService;
    }
    public function login(LoginRequest $request):JsonResponse{
        $admin= $this->AuthService->CheckAuth($request);
        if(!$admin){
            return $this->error('Your Email Or Password is incorrect'.Response::HTTP_UNAUTHORIZED);
        }

        $token = $admin->createToken('admin_token');

        return $this->SendData('',[
            'token'=>$token->plainTextToken,
            'token_type'=>'Bearer',
        ],Response::HTTP_OK);


    }
}
