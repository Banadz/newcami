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
    $('#listAgent').DataTable({
        "searching": true,
        "lengthMenu":[5, 10, 20, 50, 100],
        "pageLength":5,
        "scrollCollapse": true,
        "paging": true
    });
    const fichierAgent = $('#openFileAgent').DataTable({
        // "scrollY": "200px",
        "searching": true,
        "lengthMenu":[5, 10, 20, 50, 100],
        "pageLength":5,
        "scrollCollapse": true,
        "paging": true
    });
    fichierAgent.row.add([
        '157849',
        'XBANAZ',
        'Jefferson',
        'M',
        'BAG',
        'Sécretaire',
        'xbanadz@gmail.com',
        '034781523',
        `<div class="table-actions">
            <a href="#" class="multiAgentUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
            <a href="#" class="multiAgentDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
        </div>`,
        'Andrainjato, Fianarantsoa',
        '04'
    ]).draw();

    fichierAgent.column(9).visible(false)
    fichierAgent.column(10).visible(false)

    // GET ALL AGENT
    // let allStar
    // var url = document.querySelector('meta[name="getAgents"]').getAttribute('content');
    // $.ajax({
    //     type:'POST',
    //     url: url,
    //     data:{
    //         _token:csrfToken,
    //         // code_service:valeurM
    //     },
    //     success:function(response, statut){
    //         if (response.success){
    //             if(response.agent.length != 0){
    //                 allStar = response.agent
    //             }
    //         }else{
    //             alert(`Impossible de se connecter au serveur à l’adresse`+ window.location +`.`)
    //         }
    //     }

    // })

    // MODIFIER

    var upAg = $('.updateAgent')
    upAg.each(function(){
        $(this).on('click', function(def){

            def.preventDefault()
            $tr = $(this).closest('tr');
            var data =  $tr.children("td").map(function(){
                return $(this).text()
            }).get();
            var matricule = data[0]
            url = $(this).attr('href')
            $.ajax({
                type:'POST',
                url: url,
                data:{
                    _token:csrfToken,
                    matricule:matricule
                },
                success:function(response, statut){
                    // console.log(response)
                    if (response.success){
                        $('.choiceDivision').each(function(){
                            $(this).remove()
                        })
                        $('#agentUpdate').modal('show');

                        $('#nom').val(response.agent['0'].NOM)
                        $('#prenom').val(response.agent['0'].PRENOM)
                        if (response.agent['0'].GENRE == 'M'){
                            html = `<option value="F">Femme</option>
                                    <option value="M" selected>Homme</option>`
                        }else{
                            html = `<option value="F" selected>Femme</option>
                                    <option value="M">Homme</option>`
                        }
                        $('#genre').html(html)
                        $('#adresse_physique').val(response.agent['0'].ADRESSE_PHYSIQUE)
                        $('#telephone').val(response.agent['0'].TELEPHONE)
                        $('#email').val(response.agent['0'].EMAIL)
                        $('#matricule').val(response.agent['0'].MATRICULE)
                        if (response.agent['0'].TYPE == 'Super Admin'){
                            type = `<option value="Super Admin">Administrateur</option>`
                        }else{
                            if (response.agent['0'].TYPE == 'Admin'){
                                type = `<option value="Super Admin">Administrateur</option>
                                        <option value="Admin" selected>Dépositaire</option>
                                        <option value="User">Détenteur</option>`
                            }else{
                                type = `<option value="Super Admin">Administrateur</option>
                                        <option value="Admin">Dépositaire</option>
                                        <option value="User" selected>Détenteur</option>`
                            }
                        }

                        $('#type').html(type)
                        $('#pseudo').val(response.agent['0'].PSEUDO)
                        $('#fonction').val(response.agent['0'].FONCTION)

                        console.log(response)
                        $.each(response.divisions, function(i,v){
                            if (v["CODE_DIVISION"] == response.agent['0'].CODE_DIVISION){
                                $('#code_division').append(`<option class="choiceDivision" value="`+v["CODE_DIVISION"]+`" selected>`+v["CODE_DIVISION"]+` | `+v["LABEL_DIVISION"]+`</option>`)
                            }else{
                                $('#code_division').append(`<option class="choiceDivision" value="`+v["CODE_DIVISION"]+`">`+v["CODE_DIVISION"]+` | `+v["LABEL_DIVISION"]+`</option>`)
                            }
                        })

                    }else{
                        console.log("ERROR")
                    }
                }

            })

        })
    })

    var fromUp = $('#fromUpdateAgent')
    fromUp.on('submit', function(def){
        def.preventDefault()
        var division = $(this).serialize()
        url = $(this).attr('action')
        $.ajax({
            type:'POST',
            url: url,
            data:division,
            success:function(response, statut){
                console.log(response)
                if (response.success){
                    window.location.reload();
                }else{
                    console.log(response)
                }
            }

        })
    })

    // MULTI INSERTION
    $('body').on('click', "#polyInsertinAgent",function(def){
        def.preventDefault()
        fichierAgent.draw('page')
        $("#multiAgent").modal('show')
    })
    $('body').on('submit', "#apporterFIchierAgent",function(def){
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
                fichierAgent.clear().draw();
                action = `<div class="table-actions">
                            <a href="#" class="multiAgentUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
                            <a href="#" class="multiAgentDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
                        </div>`
                $.each(response.data[0], function(i,v){
                    fichierAgent.row.add([
                        v['matricule'],
                        v['nom'],
                        v['prenom'],
                        v['genre'],
                        v['code_division'],
                        v['fonction'],
                        v['mail'],
                        v['telephone'],
                        action,
                        v['adresse'],
                        v['porte'],
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
    $('body').on('click', ".multiAgentUpdate", function(df){
        df.preventDefault()
        $tr = $(this).closest('tr');
        var data =  $tr.children("td").map(function(df){
            return $(this).text()
        }).get();
        $index = $tr
        // var adresseCell = ;
        // var portCell = ;
        $('#matriculem').val(data[0])
        $('#nomm').val(data[1])
        $('#prenomsm').val(data[2])
        $('#genrem').val(data[3])
        $('#divisionm').val(data[4])
        $('#fonctionm').val(data[5])
        $('#emailm').val(data[6])
        $('#telephonem').val(data[7])
        $('#adressem').val(fichierAgent.cell($tr, 9).data())
        $('#portem').val(fichierAgent.cell($tr, 10).data())
        // console.log(data)
        $("#multiAgentUpdate").modal('show')
    })

    $('body').on('submit', '#formEditMultiAgent', function(def){
        def.preventDefault()
        var newData = {
            0: $('#matriculem').val(),
            1: $('#nomm').val(),
            2: $('#prenomsm').val(),
            3: $('#genrem').val(),
            4: $('#divisionm').val(),
            5: $('#fonctionm').val(),
            6: $('#emailm').val(),
            7: $('#telephonem').val(),
            8: `<div class="table-actions">
                <a href="#" class="multiAgentUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
                <a href="#" class="multiAgentDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
            </div>`,

            9: $('#adressem').val(),
            10: $('#portem').val()
        }
        // index = fichierAgent.row('.selected').data(newData).index()
        fichierAgent.row($index).data(newData).draw()
        fichierAgent.draw()
        // console.log(row)
        $("#multiAgentUpdate").modal('toggle')
    })

    $('#newMultiAgent').on('click', function(def){
        def.preventDefault()
        $("#multiAgentInsert").modal('show')
        // alert('BLALALALALA')
    })
    $('body').on('submit', '#formInsertMultiAgent', function(def){
        def.preventDefault()
        fichierAgent.row.add([
            $('#matriculei').val(),
            $('#nomi').val(),
            $('#prenomsi').val(),
            $('#genrei').val(),
            $('#divisioni').val(),
            $('#fonctioni').val(),
            $('#emaili').val(),
            $('#telephonei').val(),
            `<div class="table-actions">
                <a href="#" class="multiAgentUpdate" title="Modifier"><i class="ik ik-edit-2"></i></a>
                <a href="#" class="multiAgentDelete" title="Supprimer"><i class="ik ik-trash-2"></i></a>
            </div>`,

            $('#adressei').val(),
            $('#portei').val()
        ]).draw();
        $("#multiAgentInsert").modal('toggle')
    })

    $('body').on('click', '.clear', function(de){
        de.preventDefault()
        fichierAgent.clear().draw();
    })
    $('body').on('click', ".multiAgentDelete", function(df){
        df.preventDefault()
        $tr = fichierAgent.row($(this).closest('tr')).index()
        fichierAgent.row($tr).remove().draw()
    })

    // The Biggest Insertion............
    $('body').on('click', '#goMultiAgent', function (pool){
        pool.preventDefault()
        const multiAgent = fichierAgent.rows().data().toArray();
        const nombreDeLignes = fichierAgent.rows().count();
        url = $(this).attr('name');
        if (1 > nombreDeLignes){
            alert("Votre tableau est vide")
        }else{
            const donneesJSON = JSON.stringify(multiAgent
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
                        console.log(response)
                        // alert(`success! `+ response.eff + ` Agent(s) inséré(s)` );
                        // window.location.reload()
                    }else{
                        console.log('ERROR')
                    }
                }
            });
            // console.log(multiAgent)
        }
    })
})
