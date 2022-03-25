{{-- Document --}}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
            <div class="col-12 mb-0">
                <img src="{{$url_LogoAA}}" alt="Logo Agenda Ambiental">
            </div>
            <div class="col-12 mt-0 mb-5" style="height:25px; background-color:#ffc300">
            </div>
        </div>
    </header>

    <div class="container p-4">
        <div class="row mt-2">
            <div class="col-12">
                <h1> Estimado(a) Sr(a):</h1>
                <p class="lead">
                    Le enviamos un cordial saludo. <br>
                </p>
                <p class="lead">
                    Le escribimos de nuestro programa de "{{$academic_program['name']}}", debido a que nuestro postulante {{$appliant['name'] . ' ' .  $appliant['middlename'] . ' ' . $appliant['surname']}}, lo ha asignado a usted para otorgarle una carta de recomendación. Dicho documento es requisito indispensable para continuar con su proceso de admisión.<br>
                </p>
                <p class="lead">
                    Usted podrá otorgar su carta de recomendación.
                </p>
            </div>
        </div>

        <div class="row mt-2 mb-2">
            @component('mail::button', ['url' => route('recommendationLetter.show', ['token' => $my_token])])
                Dando clic aquí
            @endcomponent
        </div>

        <div class="row">
            <div class="col-12">
                <h4>
                    Agradecemos su colaboración.
                </h4>
                <p><em>
                    Atentamente. <br>
                    Control Escolar de Agenda Ambiental.    
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




