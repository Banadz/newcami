$(document).ready(function(){
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    // DATA TABLE INITIATION

    const fichierArticle = $('#openFileArticle').DataTable({
        // "scrollY": "200px",
        "searching": true,
        "lengthMenu":[5, 10, 20, 50, 100],
        "pageLength":5,
        "scrollCollapse": true,
        "paging": true
    });
    // fichierArticle.row.add([
    //     '49',
    //     'Brosse pour lavage carreaux',
    //     'Lave pont avec manche (A8F)',
    //     'Nombre',
    //     `<div class="table-actions">
    //         <a href="#" class="multiArticleUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
    //         <a href="#" class="multiArticleDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
    //     </div>`
    // ]).draw();
    // fichierArticle.row.add([
    //     '49',
    //     'Brosse pour lavage carreaux',
    //     'Lave pont avec manche (A8F)',
    //     'Nombre',
    //     `<div class="table-actions">
    //         <a href="#" class="multiArticleUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
    //         <a href="#" class="multiArticleDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
    //     </div>`
    // ]).draw();
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

    // MULTI-INSERTING =============================================

    $('body').on('click', "#polyInsertinArticle",function(def){
        def.preventDefault()
        fichierArticle.draw('page')
        $("#multiArticle").modal('show')
    })

    $('body').on('submit', "#apporterFIchierArticle",function(def){
        def.preventDefault()
        url = $(this).attr('action')

        var formData = new FormData($(this)[0]);
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                
                fichierArticle.clear().draw();
                action = `<div class="table-actions">
                            <a href="#" class="multiArticleUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
                            <a href="#" class="multiArticleDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
                        </div>`
                $.each(response.data[0], function(i,v){
                    fichierArticle.row.add([
                        v['id_cat'],
                        v['designation'],
                        v['specification'],
                        v['unite'],
                        action,
                    ]).draw();
                })
                // console.log(response);
            },
            error: function(error) {
                // Gérer les erreurs ici
                console.error(error);
            }
        });
        // alert("kokokoko")
    })

    let $index
    $('body').on('click', ".multiArticleUpdate", function(df){
        df.preventDefault()
        $tr = $(this).closest('tr');
        var data =  $tr.children("td").map(function(df){
            return $(this).text()
        }).get();
        $index = $tr
        // var adresseCell = ;
        // var portCell = ;
        $('#categoriem').val(data[0])
        $('#designm').val(data[1])
        $('#specm').val(data[2])
        $('#unitem').val(data[3])
        $("#multiArticleUpdate").modal('show')
    })

    $('body').on('submit', '#formEditMultiArticle', function(def){
        def.preventDefault()
        var newData = {
            0:$('#categoriem').val(),
            1:$('#designm').val(),
            2:$('#specm').val(),
            3:$('#unitem').val(),
            4: `<div class="table-actions">
                <a href="#" class="multiArticleUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
                <a href="#" class="multiArticleDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
            </div>`
        }
        // index = fichierAgent.row('.selected').data(newData).index()
        fichierArticle.row($index).data(newData).draw()
        fichierArticle.draw()
        // console.log(row)
        $("#multiArticleUpdate").modal('toggle')
    })

    $('#newMultiArticle').on('click', function(def){
        def.preventDefault()
        $("#multiArticleInsert").modal('show')
        // alert('BLALALALALA')
    })
    $('body').on('submit', '#formInsertMultiArticle', function(def){
        def.preventDefault()
        fichierArticle.row.add([
            $('#categoriei').val(),
            $('#designi').val(),
            $('#speci').val(),
            $('#unitei').val(),
            `<div class="table-actions">
                <a href="#" class="multiArticleUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
                <a href="#" class="multiArticleDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
            </div>`
        ]).draw();
        $("#multiArticleInsert").modal('toggle')
    })

    $('body').on('click', '.clear', function(de){
        de.preventDefault()
        fichierArticle.clear().draw();
    })
    $('body').on('click', ".multiArticleDelete", function(df){
        df.preventDefault()
        $tr = fichierArticle.row($(this).closest('tr')).index()
        fichierArticle.row($tr).remove().draw()
    })

    // The Biggest Insertion............
    $('body').on('click', '#goMultiArticle', function (pool){
        pool.preventDefault()
        const multiArticle = fichierArticle.rows().data().toArray();
        const nombreDeLignes = fichierArticle.rows().count();
        url = $(this).attr('name');
        if (1 > nombreDeLignes){
            alert("Votre tableau est vide")
        }else{
            const donneesJSON = JSON.stringify(multiArticle
            );
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token:csrfToken,
                    donnees: donneesJSON
                },
                success: function(response) {
                    if(response.success){
                        swal("Succès", response.eff + ` Article(s) inséré(s)`, {
                            icon : "success",
                            buttons: {
                                confirm: {
                                    className : 'btn btn-info'
                                }
                            },
                        }).then((Delete) => {
                            if (Delete) {
                                window.location.reload()
                            }
                        })
                    }else{
                        swal("Echèc", response.error, {
                            icon : "error",
                            buttons: {
                                confirm: {
                                    className : 'btn btn-danger'
                                }
                            },
                        })
                    }
                }
            });
            // console.log(multiAgent)
        }
    })
})
