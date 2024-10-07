<?php

namespace App\Livewire;

use App\Models\comments;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function Laravel\Prompts\error;

class Comentarios extends Component
{
    public $comment;
    public $viewComment = false;

    public function render()
    {
        $user = Auth::user()->id;

        $comments = comments::where('user_id', $user)->get();
        return view('livewire.comentarios', [
            'comments' => $comments,
        ]);
    }
    function submit()
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Debes estar autenticado para comentar.');
        }

        // Obtén el usuario autenticado
        $user = Auth::user(); // No necesitas buscarlo nuevamente

        // Crea una nueva instancia de Comment
        $comment = new comments(); // Usa 'Comment' con 'C' mayúscula
        $comment->user_id = $user->id; // Directamente usa el ID del usuario autenticado
        $comment->comment = $this->comment; // Suponiendo que $this->comment contiene el comentario
        $comment->save();
        $this->comment = '';
        $this->render();
    }
    function comments()
    {
        $this->viewComment = !$this->viewComment;
    }

    function delete($commentId){
        $comment = comments::find($commentId);

        if(!$comment) return error(404);
        
        $comment->delete();
        $this->render();
    }

}

