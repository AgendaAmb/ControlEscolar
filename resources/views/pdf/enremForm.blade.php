<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css" media="all">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #FAFEF4;
            color: #fff;
        }

        .app{
            width: 100%;
            
            padding: 20px;
        }

        .fixed{
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #FAFEF4;
        }

        .container{
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }

        .col-md-12{
            width: 100%;
            padding: 0 15px;
            background-color: transparent !important;
        }
        .col-md-4{
            width: calc(100%/3);
            padding: 0 15px;
            background-color: transparent !important;

        }

        .footer-text{
            text-align: center;
            padding: 20px 0;
        }

        .footer-text p{
            font-size: 14px;
            color: #000;
        }

        .footer-text p a{
            color: #000;
            text-decoration: none;
        }

        header, .header{
            color: #fff;
            max-height: 100px;
        }

        h1{
            color: #000;
            background-color: transparent !important;

        }
        .blue{
            background-color: #004A98;
        }

        .transparent {
            background-color: transparent !important;
        }
        
        .border{
            border: 1px solid yellow;
        }

    
        
    </style>
</head>

<body>
    <header class="header blue">
        <div class="container header transparent ">
            <!-- <table class="row header transparent border">
                
                <tr>
                    <td class="cols-md-12">1</td>
                    <td class="cols-md-12">2</td>
                    <td class="cols-md-12">3</td>
                </tr>
                
            </table> -->
        </div>
    </header>

    <div class="app">
        
    </div>

    <footer class="fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-text">
                        <p>Universidad Autónoma de San Luis Potosí</p>
                        <p>Maestría en Ciencias Ambientales: Doble Titulación. </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
