<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $event = Services::all();
        $pages = Pages::all();

        return view('welcome', [
            'services' => $event,
            'pages' =>$pages
        ]);
    }
    public function info(){
        $pages = Pages::all();
        return view('events.info',[ 'pages' => $pages]);
    }
    public function returnIndex(){
        return redirect('/');
    }
    public function show($id)
    {
        $events = Services::findOrFail($id);
        return view('events.product', ['events' => $events]);
    }
    public function listService()
    {
        $search = request('search');

        if ($search) {
            $event = Services::where([
                ['categoria', 'like', '%' . $search . '%'],
            ])
                ->orWhere('nome', 'LIKE', '%' . $search . '%')
                ->orWhere('tipo', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $event = DB::table('services')->paginate(9);
        }

        return view('events.listService', [
            'events' => $event,
            'search' => $search,
        ]);
    }
    public function store(Request $request)
    {
        $event = new Services();
        $event->nome = $request->nome;
        $event->description = $request->description;
        $event->categoria = $request->categoria;
        $event->tipo = $request->tipo;

        //image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName =
                md5($requestImage->getClientOriginalName() . strtotime('now')) .
                '.' .
                $extension;
            $requestImage->move(public_path('img/events'), $imageName);

            $event->img = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function dashboard()
    {
        $events = Services::all();
        $pages = Pages::all();
        return view('dashboard', ['events' => $events, 'pages' => $pages]);
    }

    public function destroy($id)
    {
        Services::findOrFail($id)->delete();
        return redirect('/dashboard')->with(
            'msg',
            'Evento excluido com sucesso!'
        );
    }

    public function edit($id)
    {
        $user = auth()->user();
        $event = Services::findOrFail($id);

        return view('/dashboard', ['event' => $event]);
    }
    public function update(Request $request)
    {
        $data = $request->all();

        //image upload
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $requestImage = $request->img;
            $extension = $requestImage->extension();

            $imageName =
                md5($requestImage->getClientOriginalName() . strtotime('now')) .
                '.' .
                $extension;
            $requestImage->move(public_path('img/events'), $imageName);

            $data['img'] = $imageName;
        }
        Services::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with(
            'msg',
            'Evento editado com sucesso!'
        );
    }
}
