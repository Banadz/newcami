$(document).ready(function(){
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    function verification(array, colonne, valeur){
        for (var i = 0; i < array.length; i++){
            if (array[i][colonne] === valeur){
                return true
            }
        }
        return false
    }

    // GET ALL SERVICE
    let allService
    var url = document.querySelector('meta[name="getServices"]').getAttribute('content');
    $.ajax({
        type:'POST',
        url: url,
        data:{
            _token:csrfToken,
            // code_service:valeurM
        },
        success:function(response, statut){
            if (response.success){
                if(response.service.length != 0){
                    allService = response.service
                }
            }else{
                alert(`Impossible de se connecter au serveur à l’adresse`+ window.location +`.`)
            }
        }

    })

    // SUPRIMER

    var supSer = $('.deleteService')
    supSer.each(function(){
        $(this).on('click', function(def){
            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();
            var code_service = data[0].trim()
            url = $(this).attr('href')
            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    code_service:code_service
                },
                success:function(response, statut){
                    console.log(response)
                    if (response.success){
                        window.location.reload();
                    }else{
                        console.log("errono")
                    }
                }

            })
        })
    })

    // MODIFIER

    var upSer = $('.updateService')
    upSer.each(function(){
        $(this).on('click', function(def){
            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();
            var code_service = data[0]
            url = $(this).attr('href')
            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    code_service:code_service
                },
                success:function(response, statut){
                    if (response.success){
                        $('#fullwindowModal').modal('show');
                        $('#code_service').val(response.service['0'].CODE_SERVICE)
                        $('#label_service').val(response.service['0'].LABEL_SERVICE)
                        $('#ville_service').val(response.service['0'].VILLE_SERVICE)
                        $('#adresse_service').val(response.service['0'].ADRESSE_SERVICE)
                        $('#contact_service').val(response.service['0'].CONTACT_SERVICE)
                        $('#adresse_mail').val(response.service['0'].ADRESSE_MAIL)
                        $('#sigle_service').val(response.service['0'].SIGLE_SERVICE)
                        $('#entete1').val(response.service['0'].ENTETE1)
                        $('#entete2').val(response.service['0'].ENTETE2)
                        $('#entete3').val(response.service['0'].ENTETE3)
                        $('#entete4').val(response.service['0'].ENTETE4)
                        $('#entete4').val(response.service['0'].ENTETE4)
                        $('#entete5').val(response.service['0'].ENTETE5)
                    }else{
                        console.log("ERROR")
                    }
                }

            })

        })
    })

    $('#code_service').on('input', function(){
        var valeur = $(this).val()
        var valeurM = valeur.trim().toUpperCase()

        $(this).val(valeurM)
        var url = $('#addService').attr('target');
        existance = verification(allService, 'CODE_SERVICE', valeurM)
        if (existance){
            $('#code_service').removeClass('is-valid')
            $('#code_service').addClass('is-invalid')
            $('#code_service').addClass('champs-invalide')
        }else{
            $('#code_service').addClass('is-valid')
            $('#code_service').removeClass('is-invalid')
            $('#code_service').removeClass('champs-invalide')
        }
    })

    $('#label_service').on('input', function(){
        var valeur = $(this).val()
        existance = verification(allService, 'LABEL_SERVICE', valeur)
        if (existance){
            $('#label_service').removeClass('is-valid')
            $('#label_service').addClass('is-invalid')
            $('#label_service').addClass('champs-invalide')
        }else{
            $('#label_service').addClass('is-valid')
            $('#label_service').removeClass('is-invalid')
            $('#label_service').removeClass('champs-invalide')
        }
    })

    $('#contact_service').on('input', function(){
        var champs = $(this).val()
        var newValue = champs.replace(/[^0-9+\s]/g, '')
        $(this).val(newValue)
        existance = verification(allService, 'CONTACT_SERVICE', valeur)
        if (existance){
            $('#contact_service').removeClass('is-valid')
            $('#contact_service').addClass('is-invalid')
            $('#contact_service').addClass('champs-invalide')
        }else{
            $('#contact_service').addClass('is-valid')
            $('#contact_service').removeClass('is-invalid')
            $('#contact_service').removeClass('champs-invalide')
        }

    })
    $('#adresse_mail').on('input', function(){
        var valeur = $(this).val()
        var valeurM = valeur.trim().toLowerCase()
        $(this).val(valeurM)
        existance = verification(allService, 'ADRESSE_MAIL', valeurM)
        if (existance){
            $('#adresse_mail').removeClass('is-valid')
            $('#adresse_mail').addClass('is-invalid')
            $('#adresse_mail').addClass('champs-invalide')
        }else{
            var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$/
            if (regex.test(valeurM)){
                $('#adresse_mail').removeClass('is-valid')
                $('#adresse_mail').addClass('is-invalid')
                $('#adresse_mail').addClass('champs-invalide')
            }else{
                $('#adresse_mail').addClass('is-valid')
                $('#adresse_mail').removeClass('is-invalid')
                $('#adresse_mail').removeClass('champs-invalide')
            }
        }
    })
    $('#adresse_service').on('input', function(){
        var valeur = $(this).val()
        var mots = valeur.split(' ')
        for (var i = 0; i < mots.length; i++){
            mots[i] = mots[i].charAt(0).toUpperCase() + mots[i].slice(1).toLowerCase()
        }
        var valeurF = mots.join(' ')
        $(this).val(valeurF)
    })
    $('#sigle_service').on('input', function(){
        var valeur = $(this).val()
        var valeurM = valeur.trim().toUpperCase()

        $(this).val(valeurM)
        var url = $('#addService').attr('target');
        existance = verification(allService, 'SIGLE_SERVICE', valeurM)
        if (existance){
            $('#sigle_service').removeClass('is-valid')
            $('#sigle_service').addClass('is-invalid')
            $('#sigle_service').addClass('champs-invalide')
        }else{
            $('#sigle_service').addClass('is-valid')
            $('#sigle_service').removeClass('is-invalid')
            $('#sigle_service').removeClass('champs-invalide')
        }
    })

    var fromUp = $('#fromUpdateService')
    fromUp.on('submit', function(def){
        def.preventDefault()
        var champsInvalide = null

        fromUp.find('.is-invalid').each(function(){
            if (champsInvalide === null){
                champsInvalide = this
            }
        })

        // if (champsInvalide === null){
            var service = $(this).serialize()
            url = $(this).attr('action')
            $.ajax({
                type:'POST',
                url: url,
                data:service,
                success:function(response, statut){
                    if (response.success){
                        window.location.reload();
                    }else{
                        console.log(response)
                    }
                }

            })
        // }else{
        //     alert("Le formulaire contient des champs invalides")
        //     $(champsInvalide).focus()
        //     $(champsInvalide).removeClass('champs-invalide')
        //     $(champsInvalide).addClass('champs-invalide')
        // }

    })

})
