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
                    Por medio de la presente se le informa que la documentación presentada para el proceso de selección 2022 para el programa de {{$academic_program['name']}} requiere modificación o actualización. A continuación se enlistan los requerimientos: <br>
                </p>
                <ul>
                @foreach ($name_documents as $doc_name)
                    <li><p class="h4">
                        {{$doc_name}}
                        </p></li>
                @endforeach

                </ul>
                @if ($instructions != null && $instructions != '')
                    <p class="lead">
                        El revisor ha dejado las siguientes indicaciones de los documentos a corregir
                    </p>

                    <p class="lead">
                        {{ $instructions }}
                    </p>
                @endif

                <p>
                    Podras actualizar el siguiente enlace hasta que el revisador los acepte en el siguiente enlace
                </p>

                {{-- @foreach ($required_documents as $document)
                   <p>Id documento: {{$document}}</p>
               @endforeach

               <p>Archive id: {{$archive_id}}</p> --}}
            </div>
        </div>

        {{-- <div class="row">
            <a href="{{ route('updateDocuments.show', $archive_id, serialize($required_documents)) }}" class="btn btn-default">Actualizar mis documentos</a>
        </div> --}}

        <div class="row mt-2 mb-2">
            @component('mail::button',
                [
                    'url' => route('updateDocuments.show', [
                        'archive_id' => $archive_id,
                        'personal_documents' => json_encode($personal_documents),
                        'entrance_documents' => json_encode($entrance_documents),
                        'academic_documents' => json_encode($academic_documents),
                        'language_documents' => json_encode($language_documents),
                        'working_documents'  =>  json_encode($working_documents),
                    ]),
                ])
                Actualizar mis documentos
            @endcomponent
        </div>

        <div class="row">
            <div class="col-12">
                <h4>
                    Más informes al correo electrónico: pmpca@uaslp.mx
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
