@component('mail::message')

# Estimado(a) Sr(a):

Le enviamos un cordial saludo.
Le escribimos de nuestro programa de "{{$academic_program['name']}}", debido a que nuestro postulante {{$appliant['name'] . ' ' .  $appliant['middlename'] . ' ' . $appliant['surname']}}, lo ha asignado a usted para otorgarle una carta de recomendación. Dicho documento es requisito indispensable para continuar con su proceso de admisión.

Usted podrá otorgar su carta de recomendación.

{{-- Token: {{$my_token}} --}}

@component('mail::button', ['url' => route('recommendationLetter.show', ['token' => $my_token])])
dando clic aquí
@endcomponent

<br>
Agradecemos su colaboración.

Atentamente
Control Escolar de Agenda Ambiental.
<br>
@endcomponent