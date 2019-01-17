<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Récupere le lien et génere l'url
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
  public function generate(Request $request){
        $link = new Link();
        $link->link = $request->link;
        $link->number_of_visitors = 0;

        if(Auth::check()){
            $link->user_id = Auth::user()->id;
        }
        else{
            $link->user_id = 0;
        }
        $linkIsFree = false;

        //Retourne une erreur si le lien est vide
        if(strlen($request->link) == 0){
            return redirect()->back()->with('error', "Veuillez preciser le lien");
        }

        //Si l'utlisateur est connecté, il peut donner son propre lien raccourci
        if(Auth::check() && strlen($request->short_link) > 0){
            $shortLink = $request->short_link;

            //Verification de la disponibilité du lien
            if(!$this->checkIfLinkIsAvailable($shortLink) ){
                return redirect()->back()->with('error', "Le lien n'est pas disponible");
            }
        }
        //Si l'utilisateur n'est pas connecté on génére aléatoirement un lien
        else{
            while(!$linkIsFree){
                $shortLink = str_random(6);

                //Verification si le lien existe deja ou pas
                if($this->checkIfLinkIsAvailable($shortLink)){
                    $linkIsFree = true;
                }
            }
        }

        $link->short_link = $shortLink;
        $link->save();



        return redirect('/')->with('link', $link->short_link);
    }

    /** Redirection vers le lien original
     * @param $short_link
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirect($short_link){
      //On récupere le lien
      $link = Link::where('short_link', $short_link)->get()->first();
      $link->incrementVisitors();
      //On redirige

      return redirect($link->link);
    }

    public function getStats($short_link){
        $link = Link::where('short_link', $short_link)->get()->first();

        $data = [
            "link" => $link
        ];

        return view('stats')->with('data', $data);
    }


    public function delete($id){
        $link = Link::find($id);

        if($link->user_id == Auth::user()->id){
            $link->delete();
            return redirect()->back();
        }else{
            abort(401);
        }
    }

    //Fonciton pour verifier si un lien est dispo ou pas.
    public function checkIfLinkIsAvailable($link){
      return (Link::where('short_link', $link)->count() == 0)? true : false;
    }


}
