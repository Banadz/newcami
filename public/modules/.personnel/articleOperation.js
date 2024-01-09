$(document).ready(function(){
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    // INSERTION..

    $('#compte').on('change' , function(){
        var compte = $("#compte option:selected").val();
        url = $(this).attr('target')

        $.ajax({
            url:url,
            type:'POST',
            data:{
                _token:csrfToken,
                compte:compte
            },
            dataType:'json',
            success:function(result,status){
                $('.choiceCategorie').each(function(){
                    $(this).remove()
                })
                if(result.categories[0]){
                    var res = result.categories;
                    $.each(res, function(i,v){
                        $('#id_categorie').append('<option class="choiceCategorie" value="'+v["id"]+'">'+v["id"]+' | '+v["LABEL_CATEGORIE"]+'</option>');
                    });
                }else{
                    $('#id_categorie').append('<option class="choiceCategorie" value="">Aucune(s) categrie(s) correspondante(s)</option>');

                }

            }
        })
    })

    // MODIFIER

    var upCat = $('.updateArticle')
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

    // IMPORTER AGENT.....
    $('body').on('submit', '#apporterFIchierAgent', function(def){
       def.preventDefault()
       alert('maximus')
    })
})
