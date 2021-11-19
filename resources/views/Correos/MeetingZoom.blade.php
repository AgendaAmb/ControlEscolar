<!DOCTYPE html>
<body>
    <main class="container-fluid">
        <div class="row">
            <div style="width: 100%; display: block;">
                <img src="{{ $message->embed('imagenes/logod.png') }}">
            </div>
            <div style="margin: 50px 0;">
                <p>
                Estimado(a) Sr(a): <br><br>

                Le enviamos un cordial saludo. <br>
                Le escribimos de nuestro programa de , debido a que nuestro postulante 
                {{ $aspirante->PrimerApellido.' '.$aspirante->SegundoApellido.' '.$aspirante->Nombres }}, lo ha asignado a usted para otorgarle una 
                carta de recomendación. Dicho documento es requisito indispensable para continuar con su proceso de admisión. <br><br>

                Adjunto a este correo encontrará el formato de recomendación, por favor, llénelo y súbalo 
                <a href="{{ $url }}">dando clic aquí </a><br><br>

                Agradecemos su colaboración <br><br><br>
                
                Atentamente. <br><br>
                Control Escolar de Agenda Ambiental
                </p>
            </div>
        </div>
    </main>
</body>