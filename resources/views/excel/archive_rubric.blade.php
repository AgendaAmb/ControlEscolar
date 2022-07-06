<table>
    <thead>
        <tr>
            <th> Nombre del aspirante </th>
            <th> Nombre del profesor evaluador </th>
            <th> Ponderación sección 1 </th>
            <th> Ponderación sección 2 </th>
            <th> Ponderación sección 3 </th>
            <th> Ponderación sección 4 </th>
            <th> Ponderación sección 5 </th>
            <th> Ponderación de rúbrica </th>
            <th> Ponderación promedio de rúbricas </th>
            @foreach($data['rubrics']['0']['academic_concepts'] as $concept)
            <th>
                2.{{$loop->index + 1}} 
            </th>
            @endforeach
            @foreach($data['rubrics']['0']['research_concepts'] as $concept)
            <th>
                3.{{$loop->index + 1}} 
            </th>
            @endforeach
            @foreach($data['rubrics']['0']['working_experience_concepts'] as $concept)
            <th>
                4.{{$loop->index + 1}} 
            </th>
            @endforeach
            @foreach($data['rubrics']['0']['personal_attributes_concepts'] as $concept)
            <th>
                5.{{$loop->index + 1}} 
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($data['rubrics'] as $rubric)
        <tr>
            <th> {{ $data['appliant']['name'] }} </th>
            <th> {{ $rubric['user'] }} </th>
            <!-- Ponderaciones -->
            <th>{{ $data['avg_collection'][$loop->index]['basic'] }}</th>
            <th>{{ $data['avg_collection'][$loop->index]['academic'] }}</th>
            <th>{{ $data['avg_collection'][$loop->index]['research'] }}</th>
            <th>{{ $data['avg_collection'][$loop->index]['exp'] }}</th>
            <th>{{ $data['avg_collection'][$loop->index]['personal'] }}</th>
            <th>{{ $data['avg_collection'][$loop->index]['rubric_total'] }}</th>
            <th>{{ $score }}</th>
            @foreach($rubric['academic_concepts'] as $concept)
            <th>
                {{$concept['notes']}} 
            </th>
            @endforeach
            @foreach($rubric['research_concepts'] as $concept)
            <th>
                {{$concept['notes']}} 
            </th>
            @endforeach
            @foreach($rubric['working_experience_concepts'] as $concept)
            <th>
                {{$concept['notes']}} 
            </th>
            @endforeach
            @foreach($rubric['personal_attributes_concepts'] as $concept)
            <th>
                {{$concept['notes']}} 
            </th>
            @endforeach
        </tr>
        @endforeach
    </tbody>
    <tfoot>
    </tfoot>
</table>