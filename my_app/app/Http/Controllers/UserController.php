<?php

namespace App\Http\Controllers;

use App\Models\Categorie_depense;
use App\Models\Categories_depense;
use App\Models\Category;
use App\Models\Depense;
use App\Models\Project;
use App\Models\Ptba;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Psy\VarDumper\Dumper;


class UserController extends Controller
{

    /* ================= GET FUNCTIONS ===============  */

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    
    public function admin_dash()
    { 
        
        $data = ['userInfo'=> DB::table('projects')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('admin_dash', $data);

        


        
    }

    public function show_files(){

        $data = ['userInfo'=> DB::table('users')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('show_files', $data);
    }
    
    public function projet_profile(){

        $data = ['userInfo'=> DB::table('projects')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('projet_profile',$data);
    }

    public function add_photoVideo(){

        $data = ['userInfo'=> DB::table('projects')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('PhotoVideo',$data);

    }

    public function add_rapport(){

        $data = ['userInfo'=> DB::table('projects')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('add_rapport',$data);

    }

    

    public function admin_dashPTBA(){

        $data = ['userInfo'=> DB::table('projects')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('admin_dashPTBA', $data);
    }

    public function admin_dashPassation_Marchés(){

        $data = ['userInfo'=> DB::table('projects')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('admin_dashPassation_Marchés', $data);
        
    }
    public function admin_dashCadre_Résultats_Logique(){

        $data = ['userInfo'=> DB::table('projects')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('admin_dashCadre_Résultats_Logique', $data);
    }


   

    public function admin_dash_categorie_depense(){
        $data = ['userInfo'=> DB::table('projects')
        ->where('id', session('LoggedInUser'))
        ->first()];
        return view('admin_dash_categorie_depense', $data);
       
    }


    public function create_project()
    {
        $data_2 = ['userInfo' => DB::table('users')
            ->where('id', session('LoggedInUser'))
            ->first()];

        return view('create_project', $data_2);
    }


    

    



    /* ================= POST FUNCTIONS ===============  */

    public function register_user(Request $request)
    {

        #CHECKING INPUT
        $validate = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:20',
            'unique_code' => 'required|min:6|max:20'

        ]);

        #CHECKING INPUT(IF ALL INPUT ARE NOT FILLED, AN ERROR MESSAGE WILL DISPLAY)
        if ($validate->fails()) {

            return response()->json([
                'status' => 400,
                'messages' => $validate->getMessageBag()
            ]);
        } else {

            #SAVE USER INPUT
            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->unique_code = $request->unique_code;
            $user->activation_code = '9090';
            $user->code_project = $request->code_project;
            $user->save();

            return response()->json([
                'status' => 200,
                'messages' => 'user created'
            ]);
        }
    }




    public function login_user(Request $request)
    {
        #CHECKING INPUT
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validate->getMessageBag()
            ]);
        } else {


            $check = Project::where('email', $request->email)->first();

            if ($check) {
                $request->session()->put('LoggedInUser', $check->id);
                return response()->json([
                    'status' => 402,
                    'messages' => 'already'
                ]);
            } else {
                $user = User::where('email', $request->email)->first();
                if ($user) {
                    if (Hash::check($request->password, $user->password)) {
                        //LET'S CREATE SESSION TO STORE USER_ID
                        $request->session()->put('LoggedInUser', $user->id);
                        return response()->json([
                            'status' => 200,
                            'messages' => 'success'
                        ]);
                    } else {
                        return response()->json([
                            'status' => 401,
                            'messages' => 'incorrect email or password'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 401,
                        'messages' => 'USER NOT FOUND'
                    ]);
                }
            }
        }
    }





    public function add_categorie_depense(Request $request)
    {
     
      
        $rules = [];

        foreach($request->input('Intitule') as $key=>$value){

           $rules["Intitule.{$key}"] = 'required';
           $rules["montant.{$key}"] = 'required';
           $rules["percentage.{$key}"] = 'required';
           $rules["source_1.{$key}"] = 'required';
           $rules["source_2.{$key}"] = 'required';
           $rules["source_3.{$key}"] = 'required';
        }
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json([
                'status' => '400',
                'messages' => $validate->getMessageBag()
            ]);
        }else{
           
            foreach($request->input('Intitule') as $key => $value) {

                $record = new Category;
                $record->Intitule = $request->get('Intitule')[$key];
                $record->montant = $request->get('montant')[$key];
                $record->percentage = $request->get('percentage')[$key];
                $record->source_1 = $request->get('source_1')[$key];
                $record->source_2 = $request->get('source_2')[$key];
                $record->source_3 = $request->get('source_3')[$key];
                $record->unique_code = $request->get('unique_code')[$key];
                $record->save();

               
            }
            return response()->json([
                'status'=> 200,
                'messages' => 'success'
            ]);
        }

       

      

    
    }




  //============== ADD PASSATION  DE MARCHE

 
     // ========= ADD PTBA RECORDS =========== //

  public function add_ptba(Request $request){
    $get_year = $request->all();
    $validate_one = Validator::make($get_year,[
        'my_year_picker' => 'required',
      ]);

    if ($validate_one->fails()) {
       return response()->json([
        'status'=>401,
        'messages'=> $validate_one->getMessageBag()
       ]);
    }else{
        $rules = [];

        foreach($request->input('Code_de_Réf') as $key=>$value){

           $rules["Code_de_Réf.{$key}"] = 'required';
           $rules["Intitulé_de_activité.{$key}"] = 'required';
           $rules["Indicateur_de_process.{$key}"] = 'required';
           $rules["Unité.{$key}"] = 'required';
           $rules["Composante.{$key}"] = 'required';
           $rules["Sous-Composante.{$key}"] = 'required';
           $rules["Catégorie_financière_Fonds.{$key}"] = 'required';
           $rules["Source_de_financement.{$key}"] = 'required';
           $rules["Responsable_activité.{$key}"] = 'required';
           $rules["Début_activité.{$key}"] = 'required';
           $rules["Fin_activité.{$key}"] = 'required';
           $rules["Durée_activité.{$key}"] = 'required';
           $rules["Prévu_one.{$key}"] = 'required';
           $rules["Réalisé_one.{$key}"] = 'required';
           $rules["percent_one.{$key}"] = 'required';
           $rules["Prévu_two.{$key}"] = 'required';
           $rules["Réalisé_two.{$key}"] = 'required';
           $rules["percent_two.{$key}"] = 'required';
           $rules["Ratio_efficience.{$key}"] = 'required';
           $rules["Note_appréciation.{$key}"] = 'required';
           $rules["Commentaire.{$key}"] = 'required';
        }
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            # code...
            return response()->json([
                'status'=>400,
                'messages' => $validate->getMessageBag()
            ]);

        }else{
            
            foreach($request->input('Code_de_Réf') as $key => $value) {
                $insert_ptba = new Ptba ;
                $insert_ptba->Code_de_Réf = $request->get('Code_de_Réf')[$key];
                $insert_ptba->Intitulé_de_activité = $request->get('Intitulé_de_activité')[$key];
                $insert_ptba->Indicateur_de_process = $request->get('Indicateur_de_process')[$key];
                $insert_ptba->Unité = $request->get('Unité')[$key];
                $insert_ptba->Composante = $request->get('Composante')[$key];
                $insert_ptba->Sous_Composante = $request->get('Sous-Composante')[$key];
                $insert_ptba->Catégorie_financière_Fonds = $request->get('Catégorie_financière_Fonds')[$key];
                $insert_ptba->Source_de_financement = $request->get('Source_de_financement')[$key];
                $insert_ptba->Responsable_activité = $request->get('Responsable_activité')[$key];
                $insert_ptba->Début_activité = $request->get('Début_activité')[$key];
                $insert_ptba->Fin_activité = $request->get('Fin_activité')[$key];
                $insert_ptba->Durée_activité = $request->get('Durée_activité')[$key];
                $insert_ptba->Prévu_one = $request->get('Prévu_one')[$key];
                $insert_ptba->Réalisé_one = $request->get('Réalisé_one')[$key];
                $insert_ptba->percent_one = $request->get('percent_one')[$key];
                $insert_ptba->Prévu_two = $request->get('Prévu_two')[$key];
                $insert_ptba->Réalisé_two = $request->get('Réalisé_two')[$key];
                $insert_ptba->percent_two = $request->get('percent_two')[$key];
                $insert_ptba->Ratio_efficience = $request->get('Ratio_efficience')[$key];
                $insert_ptba->Note_appréciation = $request->get('Note_appréciation')[$key];
                $insert_ptba->Commentaire = $request->get('Commentaire')[$key];
                $insert_ptba->unique_code = $request->get('unique_code')[$key];
                $insert_ptba->year =  $request->get('my_year_picker');
    
                $insert_ptba->save();
            }
           
            return response()->json([
                'status' => 200,
                'messages' => 'success'
            ]);
        }

    }
        
   }













   

    
   
}






