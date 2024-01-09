
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

    // GET ALL AGENT
    let allStar
    var url = document.querySelector('meta[name="getAgents"]').getAttribute('content');
    $.ajax({
        type:'POST',
        url: url,
        data:{
            _token:csrfToken,
            // code_service:valeurM
        },
        success:function(response, statut){
            if (response.success){
                if(response.agent.length != 0){
                    allStar = response.agent
                }
            }else{
                alert(`Impossible de se connecter au serveur à l’adresse`+ window.location +`.`)
            }
        }

    })

    $('.s2').each(function(){
        $(this).hide().animate({
            'marginLeft':'100%'
        });
    });
    $('.prev').each(function(){
        $(this).hide()
    })
    $('.sub').each(function(){
        $(this).hide()
    })
    $('#nom').on('input', function(){
        var valeur = $(this).val()
        var valeurM = valeur.trim().toUpperCase()

        $(this).val(valeurM)
    })
    $('#prenom').on('input', function(){
        var valeur = $(this).val()
        var mots = valeur.split(' ')
        for (var i = 0; i < mots.length; i++){
            mots[i] = mots[i].charAt(0).toUpperCase() + mots[i].slice(1).toLowerCase()
        }
        var valeurF = mots.join(' ')
        $(this).val(valeurF)
    })

    $('#adresse_physique').on('input', function(){
        var valeur = $(this).val()
        var mots = valeur.split(' ')
        for (var i = 0; i < mots.length; i++){
            mots[i] = mots[i].charAt(0).toUpperCase() + mots[i].slice(1).toLowerCase()
        }
        var valeurF = mots.join(' ')
        $(this).val(valeurF)
    })



    $('#email').on('input', function(){
        var valeur = $(this).val()
        var valeurM = valeur.trim().toLowerCase()
        $(this).val(valeurM)
        existance = verification(allStar, 'EMAIL', valeurM)
        if (existance){
            $('#email').removeClass('is-valid')
            $('#email').addClass('is-invalid')
            $('#email').addClass('champs-invalide')
        }else{
            var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$/
            if (regex.test(valeurM)){
                $('#email').removeClass('is-valid')
                $('#email').addClass('is-invalid')
                $('#email').addClass('champs-invalide')
            }else{
                $('#email').addClass('is-valid')
                $('#email').removeClass('is-invalid')
                $('#email').removeClass('champs-invalide')
            }
        }
    })

    $('#telephone').on('input', function(){
        var champs = $(this).val()
        var newValue = champs.replace(/[^0-9+\s]/g, '')
        $(this).val(newValue)
        existance = verification(allStar, 'TELEPHONE', newValue)
        if (existance){
            $('#telephone').removeClass('is-valid')
            $('#telephone').addClass('is-invalid')
            $('#telephone').addClass('champs-invalide')
        }else{
            $('#telephone').addClass('is-valid')
            $('#telephone').removeClass('is-invalid')
            $('#telephone').removeClass('champs-invalide')
        }

    })
    $('#matricule').on('input', function(){
        var champs = $(this).val()
        var newValue = champs.replace(/\D/g, '')
        $(this).val(newValue)
    })
    $('#confpassword').on('input', function(){
        var champs = $(this).val()
        var password = $('#password').val()
        if (champs !== password){
            $('#confpassword').removeClass('is-invalid')
            $('#confpassword').removeClass('champs-invalide')
            $('#confpassword').removeClass('is-valid')
            $('#confpassword').addClass('is-invalid')
            $('#confpassword').addClass('champs-invalide')
        }else{
            $('#confpassword').addClass('is-valid')
            $('#confpassword').removeClass('is-invalid')
            $('#confpassword').removeClass('champs-invalide')
        }
    })



    $('#code_service').on('change' , function(){
        var code_service = $("#code_service option:selected").val();
        url = $(this).attr('target')

        $.ajax({
            url:url,
            type:'POST',
            data:{
                _token:csrfToken,
                code_service:code_service
            },
            dataType:'json',
            success:function(result,status){
                $('.choiceDivision').each(function(){
                    $(this).remove()
                })
                if(result.divisions[0]){
                    var res = result.divisions;
                    $.each(res, function(i,v){
                        $('#code_division').append('<option class="choiceDivision" value="'+v["CODE_DIVISION"]+'">'+v["CODE_DIVISION"]+' | '+v["LABEL_DIVISION"]+'</option>');
                    });
                }else{
                    $('#code_division').append('<option class="choiceDivision" value="NOTFOUND">Aucun(s) division(s) correspondant</option>');

                }

            }
        })
    })
    $('body').on('click','.next', function(evm){
        evm.preventDefault();
        $('.s1').each(function(){
            $(this).hide().animate({
                'marginLeft':'-100%'
            });
        });
        $('.s2').each(function(){
            $(this).show().animate({
                'marginLeft':'0%'
            },400);
        });
        $('.cancel').each(function(){
            $(this).hide();
        })
        $('.next').each(function(){
            $(this).hide()
        })
        $('.prev').each(function(){
            $(this).show()
        })
        $('.sub').each(function(){
            $(this).show()
        })
    });
    $('body').on('click','.prev', function(){
        $('.s1').each(function(){
            $(this).show().animate({
                'marginLeft':'0%'
            },400);
        });
        $('.s2').each(function(){
            $(this).hide().animate({
                'marginLeft':'100%'
            });
        });
        $('.cancel').each(function(){
            $(this).show();
        })
        $('.next').each(function(){
            $(this).show()
        })
        $('.prev').each(function(){
            $(this).hide()
        })
        $('.sub').each(function(){
            $(this).hide()
        })
    });


    // SUBMIT




});
