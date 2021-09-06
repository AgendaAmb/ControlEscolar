<script>
    export default {
        name: 'student-appliance',
        props: [ 'color' ],
        functional: true,

        // Crea el componente como instancia funcional
        render(createElement, {data, listeners, slots}) {
            
            return createElement("div", { class: "mt-5 row justify-content-left" }, [
                createElement('div', { class:'form-group col-12' }, [
                    createElement('h4', { class:'mt-4' }, [
                        createElement('strong', 'Datos Personales')
                    ])
                ]),

                slots().default,
                createElement('hr', { class:'col-12', style: 'color: ' + data.color}),
                createElement('h4', { class:'col-md-9 my-4' }, [
                    createElement('strong', 'Datos Solicitud')
                ]), 

                slots().datos_solicitud,
                createElement('hr', { class:'col-12', style: 'color: ' + data.color}),

                createElement('h4', { class:'col-md-9 my-4' }, [
                    createElement('strong', 'Experiencia laboral')
                ]), 
                slots().experiencia_laboral,
                createElement('hr', { class:'col-12', style: 'color: ' + data.color}),

                createElement('div', { class:'form-group col-12' }, [
                    createElement('div', { class:'row' }, [
                        createElement('h4', { class:'col-md-9 my-4' }, [
                            createElement('strong', 'Información personal')
                        ])


                    ]),
                    slots().personal_documents,

                ]),

                createElement('div', { class:'form-group col-12' }, [
                    createElement('div', { class:'row' }, [
                        createElement('h4', { class:'col-md-9 my-4' }, [
                            createElement('strong', 'Información académica')
                        ])


                    ]),
                    slots().academic_documents,
                    
                ]),

                createElement('div', { class:'form-group col-12' }, [
                    createElement('div', { class:'row' }, [
                        createElement('h4', { class:'col-md-9 my-4' }, [
                            createElement('strong', 'Formatos de ingreso')
                        ])


                    ]),
                    slots().entrance_documents,
                    
                ]),

                createElement('div', { class:'form-group col-12' }, [
                    createElement('div', { class:'row' }, [
                        createElement('h4', { class:'col-md-9 my-4' }, [
                            createElement('strong', 'Documentos curriculares')
                        ])


                    ]),
                    slots().curricular_documents,
                    
                ]),
            ]);
        }
    }
</script>