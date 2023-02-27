{{-- Document --}}
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

{{-- Header --}}

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
{{-- Body --}}

<body>
    <header class="container-fluid p-4">
        <div class="row">
            <div class="col-12 my-2">
                <img src="{{ $url_LogoAA }}" alt="Logo Agenda Ambiental" style="width: 100%">
            </div>
        </div>
    </header>

    <div class="container p-4">
        <div class="row mt-2">
            <div class="col-12">
                <h1> Estimado(a) <strong>{{ $appliant['name'] . ' ' . $appliant['middlename'] . ' ' . $appliant['surname'] }}</strong>:</h1>
                
                <p class="lead">
                    Por medio de la presente se le informa que la documentación presentada para el proceso de selección 2022 para el programa de {{$academic_program['name']}} NO CUMPLE con los requisitos establecidos para continuar con la segunda etapa de la selección. 
                </p>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <h4>
                    Agradecemos su interés por este posgrado                </h4>
                <p><em>
                        Atentamente. <br>
                        COMITÉ ACADÉMICO
                    </em></p>
            </div>
        </div>
    </div>
    {{-- Footer --}}

    <footer class="container-fluid p-4">
        <div class="row">
            <div class="col-12">
                <img src="{{ $url_ContactoAA }}" alt="Contacto Agenda Ambiental">
            </div>
        </div>
    </footer>
</body>

</html>
