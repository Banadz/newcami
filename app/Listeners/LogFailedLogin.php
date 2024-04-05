<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LogFailedLogin
{
    /**
     * Handle the event.
     *
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        $credentials = $event->credentials;

        if (isset($credentials['email'])) {
            Alert::error('Erreur', 'Aucun compte correspondant trouvé');
        } elseif (isset($credentials['username'])) {
            Alert::error('Erreur', 'Aucun identifiant correspondant trouvé');
        }elseif(isset($credentials['MATRICULE'])) {
            Alert::error('Erreur', 'Aucun identifiant correspondant trouvé');
        }

        if (isset($credentials['PASSWORD']) && !Auth::attempt($credentials)) {
            Alert::error('Erreur', 'Mot de passe incorrect');
        }
    }
}
