<?php

namespace App\Http\Controllers;

use App\Account;
use App\Alert;
use App\Answer;
use App\AnswerQuestion;
use App\CashOutput;
use App\Course;
use App\CreditPayment;
use App\CreditPaymentSale;
use App\Document;
use App\PaymentMethod;
use App\Product;
use App\Purchase;
use App\PurchaseProduct;
use App\Room;
use App\Sale;
use App\SaleProduct;
use App\User;
use App\Survey;
use App\Customer;
use App\Supplier;
use App\SurveyQuestion;
use Illuminate\Http\Request;
use Mail;

class APIController extends Controller{

    public $message="";

    public function index(Request $request){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

        $email = $request->email;
        $password = $request->password;

        if ($this->verifyAuth($email, $password)) {
            switch ($request->type) {
                case 'connect':
                    return $this->read_documents();
                    break;
                case 'read_documents':
                    return $this->read_documents();
                    break;
                case 'read_courses':
                    return $this->read_courses();
                    break;
                case 'create_user':
                    return $this->create_user($request->name,$request->email,$request->password);
                    break;
            }
        } else {
            return json_encode(array(
                "response" => $this->message,
                "error" => true,
                "content" => $request->type
            ));
        }
    }

    public function connect($email){
        $user=User::where('email','=',$email)->first();
        return json_encode(array(
            "response" => "OK",
            "error" => false,
            "content" =>$user->toArray()
        ));
    }

    public function read_documents(){
        return json_encode(array(
            "response" => "OK",
            "error" => false,
            "content" =>Document::get()->toArray()
        ));
    }

    public function read_courses(){
        return json_encode(array(
            "response" => "OK",
            "error" => false,
            "content" =>Course::get()->toArray()
        ));
    }

    public function create_user($name,$email,$password){
        $user=new User();
        $user->name=$name;
        $user->email=$email;
        $user->password=$password;
        $user->save();
        
        return json_encode(array(
            "response" => "OK",
            "error" => false,
            "content" =>''
        ));
    }

    public function verifyAuth($email,$password){
        $user = User::where('email','=',$email)->first();
        if($user==null){
            $this->message="Usuario inexistente:".$password;
            return false;
        }

        $hasher = app('hash');
        if ($hasher->check($password, $user->password)) {
            return true;
        }
        $this->message="Usuario o contraseña incorrectos";
        return false;
    }
}
