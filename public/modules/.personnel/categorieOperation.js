$(document).ready(function(){
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    // SUPRIMER

    var supSer = $('.deleteCompte')
    supSer.each(function(){
        $(this).on('click', function(def){
            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();
            var compte = data[0].trim()
            url = $(this).attr('href')
            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    compte:compte
                },
                success:function(response, statut){
                    console.log(response)
                    if (response.success){
                        window.location.reload();
                    }
                }

            })
        })
    })

    // MODIFIER

    var upCat = $('.updateCategorie')
    upCat.each(function(){
        $(this).on('click', function(def){
            def.preventDefault()
            $('#id').hide()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();

            var id = data[0]

            $('#id').val(id)
            url = $(this).attr('href')
            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    id:id
                },
                success:function(response, statut){
                    // console.log(response)
                    if (response.success){
                        $("#categorieUpdate").modal('show')
                        $('#label_categorie').val(response.categorie['0'].LABEL_CATEGORIE)

                        $.each(response.comptes, function(i,v){
                            if (v["COMPTE"] == response.categorie['0'].COMPTE){
                                $('#compte').append(`<option value="`+v["COMPTE"]+`" selected>`+v["COMPTE"]+` | `+v["LABEL_COMPTE"]+`</option>`)
                            }else{
                                $('#compte').append(`<option value="`+v["COMPTE"]+`">`+v["COMPTE"]+` | `+v["LABEL_COMPTE"]+`</option>`)
                            }
                        })

                    }else{
                        console.log("ERROR")
                    }
                }

            })
        })
    })

    var fromUp = $('#fromUpdateCategorie')
    fromUp.on('submit', function(def){
        def.preventDefault()
        var compte = $(this).serialize()
        url = $(this).attr('action')
        $.ajax({
            type:'POST',
            url: url,
            data:compte,
            success:function(response, statut){
                if (response.success){
                    window.location.reload();
                }else{
                    console.log(response)
                }
            }

        })
    })



})
