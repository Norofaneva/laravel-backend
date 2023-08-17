<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    //
    public function ajouterOffre(Request $request)
    {
        $items = new Offre();
        $items->titre_offre = $request->titre_offre;
        $items->description_offre = $request->description_offre;

        $items->save();
        return response()->json('Offre a été bien ajouté');
    }

    public function modifierOffre(Request $request , $id)
    {
        $items = Offre::find($id);
        $items->titre_offre = $request->titre_offre;
        $items->description_offre = $request->description_offre;

        $items->save(); 

        return response()->json('Offre a été bien modifiée');

    }
    
 public function supprimerOffre($id)
{
    $offre = Offre::find($id);

    if (!$offre) {
        return response()->json(['message' => 'Offre introuvable'], 404);
    }

    try {
        $offre->delete();
        return response()->json(['message' => 'Offre supprimée avec succès']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Une erreur est survenue lors de la suppression de l\'offre'], 500);
    }
}


}
