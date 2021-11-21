<!DOCTYPE html>
<style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  width: auto;
}
    </style>
<body>
    <main class="container-fluid">
        <div class="row">
            <div style="width: 100%; display: block;margin: 0 auto">
                <img src="{{ $message->embed('imagenes/logod.png') }}">
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <p style="text-align:center;"> 
                        <strong> 
                        Notificación de entrevista para ingresar a
                        <br>
                        Doctorado en Ciencias Ambientales 
                        <br>
                        Convocatoria 2021-02
                    </strong>
                    </p>
                   
                </div>
            </div>
            <div class="row justify-content-end"style="text-align: right;">
                San Luis Potosí, S.L.P,&nbsp; {{Carbon\Carbon::parse(Carbon\Carbon::now())->locale('es')->isoFormat('dddd DD MMMM YYYY')}}
            </div>

            <div style="margin: 20px 0;">
                <table class="table"  style="max-width: 600px; margin: 0 auto;">
                   
                    <tbody>
                        <tr>
                            <td scope="row">Nombre del aspirante</td>
                            <td>{{$Student->middlename ." ".$Student->surname." ".$Student->name}}</td>
                           
                        </tr>
                        <tr>
                            <td scope="row">Correo electrónico</td>
                            <td>{{$Student->email}} </td>
                           
                        </tr>
                        <tr>
                            <td>Día de la entrevista</td>
                            <td>{{Carbon\Carbon::parse($Meeating['start_time'])->locale('es')->isoFormat('DD MMMM YYYY')}}</td>
                        </tr>
                        <tr>
                            <td>Horario de la entrevista</td>
                            <td>{{Carbon\Carbon::parse($Meeating['start_time'])->subHour(6)->toTimeString()}}-{{Carbon\Carbon::createFromDate($Meeating['start_time'])->addMinutes($Meeating['duration'])->subHour(6)->toTimeString()}}</td>
                        </tr>
                        <tr>
                            <td>Lugar</td>
                            <td>{{$Room}}</td>
                        </tr>
                        <tr>
                            <td>Enlace para la entrevista</td>
                            <td>{{$Meeating['join_url']}}</td>
                        </tr>
                        <tr>
                            <td>Modalidad de la entrevista</td>
                            <td>En línea a través de ZOOM</td>
                        </tr>

                    </tbody>
                </table>
                <p>

                <p><strong>Indicaciiones:</strong></p>
                <p>Los aspectos a tomar en cuenta para el desarrollo de la entrevista son los siguientes:</p>
                <ul>
                    <li> Conocer la información disponible en el sitio web de los PMPCA <a href="https://pmpca.uaslp.mx"></a></li>
                    <li> Demostrar que conoce al menos, el número de áreas que constituyen el posgrado</li>
                    <li>Estructura y funcionamiento de los seminarios que integran el currículo del mismo. </li>
                    <li> Conocer alguna tesis desarrollada dentro de cada una de las áreas que solicita ingreso. Las tesis se consultan en la sección de “Biblioteca” del sitio web.</li>
                    <li>Presentar la propuesta de proyecto en PPT ante los profesores del Comité de Evaluación. El tiempo límite para la presentación es de 20 minutos.</li>
                    <li>Demostrar que conoce las líneas de investigación de profesores del núcleo básico del posgrado, que podrían ser su director de tesis o bien que pueden formar parte de su comité tutelar.</li>
                    <li> Además, debe conocer los objetivos del programa de manera explícita. </li>
                </ul>
                <p>Favor de confirmar asistencia a la entrevista, al correo <a href="mailto: pmpca@uaslp.mx "> pmpca@uaslp.mx </a></p>
                  <p>Saludos cordiales, <br>
                    M.I Maricela Rdz. Díaz de León <br>
                    Coordinación Educativa <br>
                    Agenda Ambiental de la Universidad Autónoma de San Luis Potosí <br>
                    Ave. Manuel Nava 201, 2do piso <br>
                    Zona Universitaria (Entre Facultad de Estomatología y Oficina de Finanzas)78210 San Luis Potosí, México. <br>
                    Tels: (444) 8262439 y 2435 
                </p>
                
                
                
               
                </p>
            </div>
        </div>
    </main>
</body>