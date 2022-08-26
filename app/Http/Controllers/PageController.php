<?php

namespace App\Http\Controllers;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class PageController extends Controller
{
    //DASHBOARD
    public function pages()
    {
        $pages = Pages::all();
        return view('pages', ['pages' => $pages]);
    }
    public function add(Request $request)
    {
        $event = new Pages();
        $event->history = $request->history;
        $event->titulo = $request->titulo;
        $event->section_contato = $request->section_contato;

        //image upload
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $requestImage = $request->logo;
            $extension = $requestImage->extension();

            $imageName =
                md5($requestImage->getClientOriginalName() . strtotime('now')) .
                '.' .
                $extension;
            $requestImage->move(public_path('img/pages'), $imageName);

            $event->logo = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }
    public function delete($id)
    {
        Pages::findOrFail($id)->delete();
        return redirect('/pg')->with('msg', 'Evento excluido com sucesso!');
    }

    public function editPage($id)
    {
        $user = auth()->user();
        $event = Pages::findOrFail($id);

        return view('/pg', ['event' => $event]);
    }
    public function atualiza(Request $request)
    {
        $data = $request->all();

        //image upload
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $requestImage = $request->logo;
            $extension = $requestImage->extension();

            $imageName =
                md5($requestImage->getClientOriginalName() . strtotime('now')) .
                '.' .
                $extension;
            $requestImage->move(public_path('img/pages'), $imageName);

            $data['logo'] = $imageName;
        }

        // if ($request->hasfile('galery')) {
        //     foreach ($data['galery'] as $file) {
        //         $extension = $file->extension();
 
            
        //         $img =
        //             md5($file->getClientOriginalName() . strtotime('now')) .
        //             '.' .
        //             $extension;

        //         dd($img);
        //         die();


        //         $file->move(public_path('img/filesGaleria'), $img);

        //          $img = $data['galery'];
        //     }
        // }

        Pages::findOrFail($request->id)->update($data);
        return redirect('/pg')->with('msg', 'Evento editado com sucesso!');
    }
}
