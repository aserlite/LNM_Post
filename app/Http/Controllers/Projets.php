<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\projetsDB;
use App\Models\UsersDB;

class Projets extends Controller
{
    public function afficher($i){
        if(session('id')){
            $nbskip=$i*10-10;
            $projets=ProjetsDB::select("projets.*","user.nom as nom","user.prenom as prenom")
                                ->orderby('dateEcrit', 'desc')
                                ->skip($nbskip)
                                ->take(10)
                                ->join('user','user.id','=','projets.idAuteur')
                                ->get();
            return view('projets',['projets'=>$projets,'nbpage'=>$i,'url'=>url("/projets/")."/",'id'=>session('id')]);
        } else {
            return redirect('/login');}

        
    }

    public function redirectP(){
        return redirect('/projets/1');
    }
    public function publish(){
        if(session('id')){
            if(session('error')){
                $error = session('error');
                session()->forget('error');
                return view('publish',['error'=>$error]);
            }
            return view('publish');
        }else{
            return redirect('/login');
        }
    }

    public function publishT(){
        if (!isset($_POST['nom']) ||
        !isset($_POST['anneeReal']) ) {
        session()->put('error',"Erreur dans les informations");
        return redirect('/publish');
        }elseif(!isset($_FILES['img']) ){
            session()->put('error',"Erreur dans le fichier ( Probleme technique en cours de patch )");
            return redirect('/publish');
        }else {
            if ($_FILES['img']['error'] != 0){
            return redirect('/erreur2');
        } else {
            $dirname = "./upload";
            $filename = session('id') . "_" . time();
            $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $file = $dirname . "/" . $filename . "." . $extension;
            move_uploaded_file( $_FILES['img']['tmp_name'],$file);

            $p = new projetsDB();
            $p ->idAuteur = session('id');
            $p ->titre = $_POST['nom'];
            $p ->genre = $_POST['genre'];
            $p ->img_url=$file;
            $p ->dateEcrit=date("Y-m-d H:i:s");
            $p ->anneeReal=$_POST['anneeReal'];
            if (isset($_POST['anonyme'])){
                $p ->anonyme=TRUE;
            }
            if(isset($_POST['lien']) AND filter_var($_POST['lien'], FILTER_VALIDATE_URL)){
                $p ->lien=$_POST['lien'];
            }
            $p ->save();
            return redirect('/index');
            }
        }
    }    
    public function afficherCreations($i){
        if(session('id')){
            if(session('id')==$i){
                $myacc=TRUE;
            }else{
                $myacc=FALSE;
            }
                $projets=ProjetsDB::where('idAuteur', '=', $i)
                                    ->orderby('dateEcrit', 'asc')
                                    ->get();
                $auteur=UsersDB::where('id', '=', $i)->get();
                $auteur=$auteur->first();
                if(isset($auteur)){
                    return view('createur',['projets'=>$projets,'auteur'=> $auteur,'myacc'=>$myacc,'id'=>session('id')]);
                }else{
                    return redirect('/');
                }
        }
        return redirect('/login');
    }
    
    public function delprojet($id){
        if(session('id')){
            $idAuteur=session('id');
            $projets=ProjetsDB::where('id', '=', $id)->get();
            if($projets->first()!=NULL AND $projets->first()->idAuteur==$idAuteur){
                ProjetsDB::where('id', '=', $id)->delete();
                return redirect('/createur/'.$idAuteur);
            }
            return redirect('/');
        }
        return redirect('/');
    }
    
}
