$(document).ready(function(){


    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    const getUserUrl = document.querySelector('meta[name="agent-infos-url"]').getAttribute('content')
    const userMatri = document.querySelector('meta[name="user-matricule"]').getAttribute('content')
    const profilUrl = document.querySelector('meta[name="profil-url"]').getAttribute('content')

    $.ajax({
        url: getUserUrl,
        type: 'POST',
        data: {
            _token:csrfToken,
            matricule:userMatri
        },
        dataType:'json',
        success: function(reponse, status){
            if (reponse.success){
                agent = reponse.agent[0]
                if (reponse.newUser){
                    $('#salutation').modal('show')
                    let formalit = 'Monsieur'
                    if(agent['GENRE'] === 'F'){
                        formalit = 'Madame'
                    }
                    let i = 0     
                    magimagie()
    
                    $(document).on('mousedown',function(e){
                        mymodal = $('#salutation')
                        if (   !$(e.target).closest('.modal-content').length && mymodal.is(":visible")   ){
                            window.location.href=profilUrl
                        }
                    })
                    $('#oui').on('click',function(){
                        window.location.href=profilUrl
                    })
                    function magimagie(){
                        var place = $('#lettreSalut')
                        var message = `Bonjour `+formalit+` `+agent['NOM']+` `+agent['PRENOM']+`,
                        Bienvenu sur CAMI, Une application dédiée aux Comptabilités Administratives et des Matières Informatisées.
                        L'utilisation de cette application nécessite l'utilisation des comptes personneles. Prémièrement, pour relier 
                        l'application à votre situation dans le système de gestion physique. Deuxièmement, suivre vos activités au sein de l'application.
                        Votre comptes sera protégé par un système d'authentification qui est réquis au début de chaque session d'utilisation.
                        Comme votre compte est nouvellement créé avec un mot de passe par défaut, c'est pourquioi on vous propose de vérifier la 
                        conformité de vos informations personnels ainsi que de changer votre mot de passe dans le menu profil pour sécurisé votre compte.
                        On vous suggère de proceder au changement de mot de passe avant d'entamer quoi que ce soit.`
                        
                        if (i < message.length){
                            $('#lettreSalut').append(message.charAt(i))
                            i++
                            setTimeout(magimagie, 20)
                        } 
                    }
    
                }
            }else{

            }
            
            
        
            
        }
    });
})