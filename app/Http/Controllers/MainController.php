<?php

namespace App\Http\Controllers;

use App\Models\UsersDB;
use App\Models\projetsDB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class MainController extends Controller
{
    public function index(){
        $projets = projetsDB::select("idAuteur","img_url","genre","lien")->get()->toArray();
        if(isset($_COOKIE['token'])){
            $c=$_COOKIE['token'];
            $user=UsersDB::where('remember', '=', $c)->get();
            if ($user->count()!=0){
                session()->put('id',$user->first()->id);
                $url=url('/');
                $id=session('id');
                $layout="layouts.topjc";
                return view('index',['url'=>$url,'id'=>$id,'layout'=>$layout,'projets'=>json_encode($projets, JSON_HEX_QUOT)]);
        }}
        $url=url('/');
        if(session('id')){
        $id=session('id');
        $layout="layouts.topjc";
        return view('index',['url'=>$url,'id'=>$id,'layout'=>$layout,'projets'=>json_encode($projets, JSON_HEX_QUOT)]);
        }else{
            $layout="layouts.topj";
            return view('index',['url'=>$url,'layout'=>$layout,'projets'=>json_encode($projets, JSON_HEX_QUOT)]);
        }
    }
    public function after(){
        $projets = projetsDB::select("idAuteur","img_url","genre","lien")->get()->toArray();
        if(isset($_COOKIE['token'])){
            $c=$_COOKIE['token'];
            $user=UsersDB::where('remember', '=', $c)->get();
            if ($user->count()!=0){
                session()->put('id',$user->first()->id);
                $url=url('/');
                $id=session('id');
                $layout="layouts.afterC";
                return view('after',['url'=>$url,'id'=>$id,'layout'=>$layout,'projets'=>json_encode($projets, JSON_HEX_QUOT)]);
        }}
        $url=url('/');
        if(session('id')){
        $id=session('id');
        $layout="layouts.after";
        return view('after',['url'=>$url,'id'=>$id,'layout'=>$layout,'projets'=>json_encode($projets, JSON_HEX_QUOT)]);
        }else{
            $layout="layouts.after";
            return view('after',['url'=>$url,'layout'=>$layout,'projets'=>json_encode($projets, JSON_HEX_QUOT)]);
        }
    }
    public function mauvaisuser(){
        $url=url('/');
        $id=session('id');
        return view('mauvaisuser',['url'=>$url,'id'=>$id]);
    }


    public function mentions(){
        return view('mentions');
    }
    public function recap(){
        return view('recap');
    }
}



