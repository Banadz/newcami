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
    let allStar
    var url = document.querySelector('meta[name="getDivisions"]').getAttribute('content');
    $.ajax({
        type:'POST',
        url: url,
        data:{
            _token:csrfToken,
            // code_service:valeurM
        },
        success:function(response, statut){
            if (response.success){
                if(response.division.length != 0){
                    allStar = response.division
                }
            }else{
                alert(`Impossible de se connecter au serveur à l’adresse`+ window.location +`.`)
            }
        }

    })
    // SUPRIMER

    var supSer = $('.deleteDivision')
    supSer.each(function(){
        $(this).on('click', function(def){
            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();
            var code_division = data[0].trim()
            url = $(this).attr('href')
            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    code_division:code_division
                },
                success:function(response, statut){
                    console.log('I LOVE YOU SO MUCH')
                    console.log(response)
                    if (response.success){
                        window.location.reload();
                    }
                }

            })
        })
    })

    // MODIFIER

    var upDiv = $('.updateDivision')
    upDiv.each(function(){
        $(this).on('click', function(def){

            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();
            var code_division = data[0]
            url = $(this).attr('href')
            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    code_division:code_division
                },
                success:function(response, statut){
                    // console.log(response)
                    if (response.success){
                        $('#divisionUpdate').modal('show');
                        $('#code_division').val(response.division['0'].CODE_DIVISION)
                        $('#label_division').val(response.division['0'].LABEL_DIVISION)

                        $.each(response.allStar, function(i,v){
                            if (v["CODE_SERVICE"] == response.division['0'].CODE_SERVICE){
                                $('#code_service').append(`<option value="`+v["CODE_SERVICE"]+`" selected>`+v["CODE_SERVICE"]+` | `+v["LABEL_SERVICE"]+`</option>`)
                            }else{
                                $('#code_service').append(`<option value="`+v["CODE_SERVICE"]+`">`+v["CODE_SERVICE"]+` | `+v["LABEL_SERVICE"]+`</option>`)
                            }
                        })

                    }else{
                        console.log("ERROR")
                    }
                }

            })

        })
    })

    var fromUp = $('#fromUpdateDivision')
    fromUp.on('submit', function(def){
        def.preventDefault()
        var division = $(this).serialize()
        url = $(this).attr('action')
        $.ajax({
            type:'POST',
            url: url,
            data:division,
            success:function(response, statut){
                if (response.success){
                    window.location.reload();
                }else{
                    console.log(response)
                }
            }

        })
    })

    $('#code_division').on('input', function(){
        var valeur = $(this).val()
        var valeurM = valeur.trim().toUpperCase()

        $(this).val(valeurM)
        existance = verification(allStar, 'CODE_DIVISION', valeurM)
        if (existance){
            $('#code_division').removeClass('is-valid')
            $('#code_division').addClass('is-invalid')
            $('#code_division').addClass('champs-invalide')
        }else{
            $('#code_division').addClass('is-valid')
            $('#code_division').removeClass('is-invalid')
            $('#code_division').removeClass('champs-invalide')
        }
    })

    $('#label_division').on('input', function(){
        var valeur = $(this).val()
        existance = verification(allStar, 'LABEL_DIVISION', valeur)
        if (existance){
            $('#label_division').removeClass('is-valid')
            $('#label_division').addClass('is-invalid')
            $('#label_division').addClass('champs-invalide')
        }else{
            $('#label_division').addClass('is-valid')
            $('#label_division').removeClass('is-invalid')
            $('#label_division').removeClass('champs-invalide')
        }
    })

})
