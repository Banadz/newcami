<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Demande | Bon de Commande</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="modules/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="modules/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="modules/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="dist/css/theme.min.css">

    </head>
    <style>
        .Entete{
            /* position:absolute; */
            width: 345px;
            /* height: 150px; */
            /* margin-top:120px; */
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .Entete2{
            /* position:absolute; */
            width: 345px;
            margin-top: -188.5px;
            margin-left:400px;
            /* display:flex;
            justify-content:center;
            align-items:center; */
        }
        .fixeo {
            width: 90%;
            /* width: 680px; */
            color:#262735; font-size:11pt;border-spacing:0;
                position: absolute; border-collapse: collapse;}
            .tbFoot{width: 50%; color:#262735; font-size:11pt; margin-left:20px;margin-top:40px;border-spacing:0;
                position: absolute; border-collapse: collapse;}
            .tbFooter{width: 100%; color:#262735; font-size:8pt; font-weight:bold; margin-left:40px;margin-top:5px;}
            .headbordure{font-family:times;};

            .cellbordure,.tred,.headbordure,.theaded,.tboded{
                border-bottom:solid 0.5px #b6baf7;
                padding:5px;
            }
            .headbordure, .cellbordure {
                font-size:9pt;
                border: 0.5px solid black;
                padding: 8px;
                text-align: center;
            }
            .headbordure{
                font-size:9pt;
                text-align: center;
                border: 0.5px solid black;
                padding: 8px;
            }
            .en2,.en1, .en0,.en01{
                display:inline;
            }
            .foot{
                position:absolute;
                margin-top:750px;
            }
            .footer{
                position:absolute;
                margin-top:1000px;
            }
            .Heading{
                position:absolute;
                margin-top:250px;
            }
            .header{
                position:absolute;
                margin-top:10px;
            }
    </style>

    <body>

        <div class="page-wrap">
            <div class="main-content">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="d-inline">
                                    <div class="text-center">
                                        <img src="images/imprimer/RPIM_logo.jpg" class="" alt="" srcset="" width="25%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-lg-6">
                                <div class="page-header-title">
                                    <div class="Entete">
                                        <p style="text-align: center;">
                                            MINISTERE DE L'ECONOMIE ET DES FINCNACES<br>
                                            SECRETARIAT GENERAL<br>
                                            DIRECTION GENERALE DU BUDGET ET DES FINANCES<br>
                                            DIRECTION DE LA SOLDE ET PENSIONS<br>
                                            Services Régional de la Solde et Des Pensions Haute Matsiatra
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="Entete2">
                                    <p style="text-align: center;">
                                        Fianarantsoa, le 05 Décembre 2024.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="align-items-end">
                        <div class="col-md-12">
                            <p style="text-align: center;"> <strong>BON de COMMANDE</strong></p>
                            <p>
                                <strong style="text-decoration: underline">Structure</strong> : Cellule d'Appui et de Coordination (C.A.C)
                            </p>
                        </div>

                        {{-- <h3 style="text-align: center;">BON de COMMANDE</h3> --}}
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <table class="fixeo">
                                <thead class="theaded">
                                    <tr class="tred">
                                        <th class="headbordure" style= "width=10%;">N°</th>
                                        <!-- <th class="headbordure" style= "width=30%;">Compte</th>
                                        <th class="headbordure" style= "width=25%;">Catégorie</th> -->
                                        <th class="headbordure" style= "width=60%;">Désignation</th>
                                        <th class="headbordure" style= "width=18%;">STOCK</th>
                                        <th class="headbordure" style= "width=18%;">Unité</th>
                                        <th class="headbordure" style= "width=20%;">Quantité demandé</th>
                                        <th class="headbordure" style= "width=20%;">Quantité accordé</th>
                                        <th class="headbordure" style= "width=20%;">Quantité livré</th>
                                    </tr>
                                </thead>
                                <tbody class="tboded">
                                    <tr class="tred">
                                        <td class="cellbordure" style= "width=10%;">1</td>
                                        <td class="cellbordure" style= "width=60%;" style="text-align:center;">Cahier 100 pages petit format Cahier 100 pages petit format</td>
                                        <td class="cellbordure" style= "width=18%;" style="text-align:center;">10</td>
                                        <td class="cellbordure" style= "width=18%;" style="text-align:center;">Nombre</td>
                                        <td class="cellbordure" style= "width=25%;" style="text-align:center;">2</td>
                                        <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                        <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                    </tr>
                                    <tr class="tred">
                                        <td class="cellbordure" style= "width=10%;">1</td>
                                        <td class="cellbordure" style= "width=60%;" style="text-align:center;">Cahier 100 pages petit format Cahier 100 pages petit format</td>
                                        <td class="cellbordure" style= "width=18%;" style="text-align:center;">10</td>
                                        <td class="cellbordure" style= "width=18%;" style="text-align:center;">Nombre</td>
                                        <td class="cellbordure" style= "width=25%;" style="text-align:center;">2</td>
                                        <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                        <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                    </tr>
                                    <tr class="tred">
                                        <td class="cellbordure" style= "width=10%;">1</td>
                                        <td class="cellbordure" style= "width=60%;" style="text-align:center;">Cahier 100 pages petit format Cahier 100 pages petit format</td>
                                        <td class="cellbordure" style= "width=18%;" style="text-align:center;">10</td>
                                        <td class="cellbordure" style= "width=18%;" style="text-align:center;">Nombre</td>
                                        <td class="cellbordure" style= "width=25%;" style="text-align:center;">2</td>
                                        <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                        <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                    </tr>
                                    <tr class="tred">
                                        <td class="cellbordure" style= "width=10%;">1</td>
                                        <td class="cellbordure" style= "width=60%;" style="text-align:center;">Cahier 100 pages petit format Cahier 100 pages petit format</td>
                                        <td class="cellbordure" style= "width=18%;" style="text-align:center;">10</td>
                                        <td class="cellbordure" style= "width=18%;" style="text-align:center;">Nombre</td>
                                        <td class="cellbordure" style= "width=25%;" style="text-align:center;">2</td>
                                        <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                        <td class="cellbordure" style= "width=20%;" style="text-align:center;"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Language - Comma Decimal Place table end -->
                        </div>
                    </div>

                </div>
            </div>
            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 ThemeKit v2.0. All Rights Reserved.</span>
                    <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Lavalite</a></span>
                </div>
            </footer>
        </div>




        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="modules/screenfull/dist/screenfull.js"></script>
        <script src="modules/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="dist/js/theme.min.js"></script>
        <script src="js/datatables.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
