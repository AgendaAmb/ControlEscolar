<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css" media="all">
        .container,
        .container-fluid,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .display-1 {
            font-size: 4rem;
            font-weight: 300;
            line-height: 0.7;
        }

        .display-2 {
            font-size: 3.5rem;
            font-weight: 300;
            line-height: 0.7;
        }

        .display-3 {
            font-size: 2.5rem;
            font-weight: 300;
            line-height: 0.7;
        }

        .display-4 {
            font-size: 2.0rem;
            font-weight: 275;
            line-height: 0.7;
        }

        .display-5 {
            font-size: 1.5rem;
            font-weight: 250;
            line-height: 0.7;
        }



        .navbar .container,
        .navbar .container-fluid,
        .navbar .container-sm,
        .navbar .container-md,
        .navbar .container-lg,
        .navbar .container-xl {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-expand-md>.container,
        .navbar-expand-md>.container-fluid,
        .navbar-expand-md>.container-sm,
        .navbar-expand-md>.container-md,
        .navbar-expand-md>.container-lg,
        .navbar-expand-md>.container-xl {
            flex-wrap: nowrap;
        }

        @media (max-width: 991.98px) {

            .navbar-expand-lg>.container,
            .navbar-expand-lg>.container-fluid,
            .navbar-expand-lg>.container-sm,
            .navbar-expand-lg>.container-md,
            .navbar-expand-lg>.container-lg,
            .navbar-expand-lg>.container-xl {
                padding-right: 0;
                padding-left: 0;
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }

        table.declarationSignature{
            padding: 20px;
            margin-top: 50px;
              text-align: center;
        }

        th,
        td {
            text-align: left;
            padding: 2px;
            max-height: 10px;
            overflow-wrap: break-word;
        }


        tr {
            text-align: center !important;
            line-height: 0px;
            overflow-wrap: break-word;
        }

        td.checkbox {
            width: 10% !important;
        }

        td.notCheckbox {
            width: 90% !important;

        }

        tr:nth-child(even) {
            /* background-color: #f2f2f2; */
            overflow-wrap: break-word;
        }

        th {
            height: 10px;
            background-color: #115089;
            color: white;
            overflow-wrap: break-word;
        }

        h4 {
            font-size: 1.0em;
            line-height: 1.5;

        }

        h5 {
            font-size: 0.7em;
        }

        p {
            font-size: 0.7em;
            line-height: 0.5;
            text-decoration: underline;
        }

        label {
            font-size: 0.7em;
            font-style: italic;
            line-height: 1.5;
        }

        label.signature{

        }

        
        .break-line {
            color: #115089;
            border: 2px solid #115089;
        }
        
        .paragraph{
            
            line-height: 20px;
        }
    </style>
</head>

<body>
    {{-- Personal data --}}
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>1. Personal Data (enter exactly as it appears on your passport)</h4>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>First Name(s): </h5>

                </td>

                <td>
                    <p class="paragraph">{{ $data['personal_data']['name'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Last name(s):</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['middlename'] . ' ' . $data['personal_data']['surnames'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>Gender:</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['gender'] }}</p>
                </td>

                <td>
                    <h5>Marital status:</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['marital_state'] }}</p>
                </td>

                <td>
                    <h5>Nr. of children:</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['no_children'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>Date of Birth (dd.mm.yyyy):</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['birth_date'] }}</p>
                </td>

                <td>
                    <h5>Place of Birth:</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['birth_state'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Nationality(ies):</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['birth_country'] }}</p>
                </td>

                <td>
                    <h5>Country of residense:</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['residence_country'] }}</p>
                </td>
            </tr>


            <tr>
                <td>
                    <h5>Email:</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['email'] }}</p>
                </td>

                <td>
                    <h5>Altern Email:</h5>
                </td>

                <td>
                    <p class="paragraph"> {{ $data['personal_data']['altern_email'] }}</p>
                </td>
            </tr>

        </tbody>
    </table>

    {{-- Correspondence Address --}}
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4><strong>2. Correspondence Address</strong> (Mailing address where you may be contacted at any time)</h4>
    </div>
    {{-- Permanent Address --}}
    <table class="table">
        <thead>
            <tr id='header-alone'>
                <th>
                    <h4>Permanent Address</h4>
                </th>
            </tr>

        </thead>
    </table>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>Care of (C/O)(s): </h5>

                </td>

                <td>
                    <p class="paragraph">{{ $data['address'][0]['care_of'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Street and number:</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['address'][0]['street'] . ' ' . $data['address'][0]['number_address'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>City:</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['address'][0]['street'] . ' ' . $data['address'][0]['number_address'] }}</p>
                </td>
                <td>
                    <h5>Postal Code:</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['address'][0]['postal_code'] }}</p>
                </td>

                <td>
                    <h5>State/Country:</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['address'][0]['state_country'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>Telephone:</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['address'][0]['telephone'] }}</p>
                </td>
                <td>
                    <h5>Mobile phone:</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['address'][0]['mobile_phone'] }}</p>
                </td>

            </tr>
        </tbody>
    </table>

    {{-- Current Address --}}
    @if ($data['address'][1]['care_of'] != null)
        <table class="table">
            <thead>
                <tr id='header-alone'>
                    <th>
                        <h4>Current Address</h4>
                        <p class="paragraph">If is different from permanent
                        <address></address>
                        </p>
                    </th>
                </tr>

            </thead>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <h5>Care of (C/O)(s): </h5>

                    </td>

                    <td>
                        <p class="paragraph">{{ $data['address'][1]['care_of'] }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5>Street and number:</h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $data['address'][1]['street'] . ' ' . $data['address'][1]['number_address'] }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <h5>City:</h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $data['address'][1]['street'] . ' ' . $data['address'][1]['number_address'] }}</p>
                    </td>
                    <td>
                        <h5>Postal Code:</h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $data['address'][1]['postal_code'] }}</p>
                    </td>

                    <td>
                        <h5>State/Country:</h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $data['address'][1]['state_country'] }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <h5>Telephone:</h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $data['address'][1]['telephone'] }}</p>
                    </td>
                    <td>
                        <h5>Mobile phone:</h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $data['address'][1]['mobile_phone'] }}</p>
                    </td>

                </tr>
            </tbody>
        </table>
    @endif
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>3. Secondary Education (High School)</h4>
    </div>

    {{-- Secondary Education high school --}}
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>School certificade </h5>

                </td>

                <td>
                    <p class="paragraph">{{ $data['secondary_education'][0]['school_certificade'] }}</p>
                </td>

                <td>
                    <h5>Final score:</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['secondary_education'][0]['final_score'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>Name if institution:</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['secondary_education'][0]['name_of_institution'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>From (mm.yyyy):</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['secondary_education'][0]['from'] }}</p>
                </td>

                <td>
                    <h5>To (mm.yyyy):</h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['secondary_education'][0]['to'] }}</p>
                </td>

                <td>
                    <p class="paragraph">{{ $data['secondary_education'][0]['city_country'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="page-break-after:always;"></div>

    {{-- Higher Education --}}
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>4. Higher Education (starting with the Bachelor)</h4>
    </div>
    @foreach ($data['higher_education'] as $item)
        @if ($item['degree_type'] != null)
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>Degree Obtained </h5>

                        </td>

                        <td>
                            <p class="paragraph">{{ $item['degree_type'] }}</p>
                        </td>

                        <td>
                            <h5>Date of award:</h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['date_of_award_of_degree'] }}</p>
                        </td>

                        <td>
                            <h5>Final grade:</h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['final_grade_average'] }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>Exact Degree </h5>

                        </td>
                        <td>
                            <p class="paragraph">{{ $item['degree'] }}</p>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Name of institution </h5>

                        </td>
                        <td>
                            <p class="paragraph">{{ $item['university'] }}</p>

                        </td>
                    </tr>

                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>City / Country </h5>

                        </td>

                        <td>
                            <p class="paragraph">{{ $item['country'] }}</p>
                        </td>

                        <td>
                            <h5>From:</h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['from'] }}</p>
                        </td>

                        <td>
                            <h5>To:</h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['to'] }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>Gradudation Mode: </h5>

                        </td>
                        <td>
                            <p class="paragraph">{{ $item['graduation_mode'] }}</p>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Fill according to your graduation: </h5>

                        </td>
                        <td>
                            <p class="paragraph">{{ $item['fill_according_graduation'] }}</p>

                        </td>
                    </tr>

                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>Minimun Score </h5>

                        </td>

                        <td>
                            <p class="paragraph">{{ $item['min_avg'] }}</p>
                        </td>

                        <td>
                            <h5>Min Passing Score:</h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['average'] }}</p>
                        </td>

                        <td>
                            <h5>Maximum Score:</h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['max_avg'] }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endforeach

    {{-- Language Skills --}}
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>5. Language Skills (When possible fill un according to your profiency exam)</h4>
    </div>

    @foreach ($data['language_skills'] as $item)
        @if ($item['language'] != null)
            @switch($item['language'])
                @case('English')
                    <table class="table">
                        <thead>
                            <tr id='header-alone'>
                                <th>
                                    <h4>English Profiency Examination</h4>
                                </th>
                            </tr>

                        </thead>
                    </table>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Exam Name </h5>

                                </td>

                                <td>
                                    <p class="paragraph">{{ $item['kind_of_exam'] }}</p>
                                </td>

                                <td>
                                    <h5>Type:</h5>
                                </td>

                                <td>
                                    <p class="paragraph">{{ $item['exam_presented'] }}</p>
                                </td>

                                <td>
                                    <h5>Date of exam:</h5>
                                </td>

                                <td>
                                    <p class="paragraph">{{ $item['presented_at'] }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @break

                @case('Spanish')
                    <table class="table">
                        <thead>
                            <tr id='header-alone'>
                                <th>
                                    <h4>Spanish Profiency</h4>
                                </th>
                            </tr>

                        </thead>
                    </table>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Learning Method: </h5>

                                </td>
                                <td>
                                    <p class="paragraph">{{ $item['learning_method'] }}</p>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Duration in Months: </h5>

                                </td>
                                <td>
                                    <p class="paragraph">{{ $item['duration_in_months'] }}</p>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                @break

                @case('German')
                    <table class="table">
                        <thead>
                            <tr id='header-alone'>
                                <th>
                                    <h4>German Profiency</h4>
                                </th>
                            </tr>

                        </thead>
                    </table>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <h5>Learning Method: </h5>

                                </td>
                                <td>
                                    <p class="paragraph">{{ $item['learning_method'] }}</p>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Duration in Months: </h5>

                                </td>
                                <td>
                                    <p class="paragraph">{{ $item['duration_in_months'] }}</p>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                @break

                @default
            @endswitch

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>City/Country: </h5>

                        </td>
                        <td>
                            <p class="paragraph">{{ $item['country'] }}</p>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Overall grade/score: </h5>

                        </td>
                        <td>
                            <p class="paragraph">{{ $item['overal_grade_score'] }}</p>

                        </td>
                    </tr>

                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>Reading: </h5>
                        </td>
                        <td>
                            <p class="paragraph">{{ $item['reading_level'] }}</p>
                        </td>
                        <td>
                            <h5>Comprehension: </h5>
                        </td>
                        <td>
                            <p class="paragraph">{{ $item['language_domain'] }}</p>
                        </td>
                        <td>
                            <h5>Writing: </h5>
                        </td>
                        <td>
                            <p class="paragraph">{{ $item['writing_level'] }}</p>
                        </td>
                        <td>
                            <h5>Speaking: </h5>
                        </td>
                        <td>
                            <p class="paragraph">{{ $item['conversational_level'] }}</p>
                        </td>
                    </tr>

                </tbody>
            </table>
        @endif
    @endforeach

   <!--  <div style="page-break-after:always;"></div>
 -->

    {{-- Environment related skills --}}
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>6. Environment Related Skills</h4>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>Message Review: </h5>

                </td>
                <td>
                    <p class="paragraph" class="paragraph">{{ $data['enviroment_related_skills'][0]['message_review'] }}</p>

                </td>
            </tr>
        </tbody>
    </table>

    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>7. Working Experience (Last three experiences)</h4>
    </div>
    @foreach ($data['working_experiences'] as $item)
        @if ($item['working_position_description'] != null)
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>From </h5>

                        </td>

                        <td>
                            <p class="paragraph">{{ $item['from'] }}</p>
                        </td>

                        <td>
                            <h5>To:</h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['to'] }}</p>
                        </td>

                        <td>
                            <h5>Type of experience:</h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['knowledge_area'] }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>Position </h5>

                        </td>

                        <td>
                            <p class="paragraph">{{ $item['working_position'] }}</p>
                        </td>

                    </tr>
                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>Organization </h5>
                        </td>

                        <td>
                            <p class="paragraph" class="paragraph">{{ $item['institution'] }}</p>
                        </td>

                        <td>
                            <h5>Country </h5>
                        </td>

                        <td>
                            <p class="paragraph">{{ $item['state'] }}</p>
                        </td>

                    </tr>
                </tbody>
            </table>

            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h5>Main responsabilities </h5>

                        </td>

                        <td>
                            <p class="paragraph" class="paragraph">{{ $item['working_position_description'] }}</p>
                        </td>

                    </tr>
                </tbody>
            </table>
        @endif
    @endforeach

    <div style="page-break-after:always;"></div>


    {{-- Special Reasons to choise --}}
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>8. Special reasons for your choice of the Master Program </h4>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>Is the ENREM master program your first choice? </h5>

                </td>

                <td>
                    <p class="paragraph" class="paragraph">{{ $data['reasons_to_choise'][0]['first_choise'] }}</p>
                </td>

            </tr>

            <tr>
                <td>
                    <h5> Let us know why - or why not </h5>

                </td>

                <td>
                    <p class="paragraph" class="paragraph">{{ $data['reasons_to_choise'][0]['reasons_choise'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Which other University and Master Program came on your short list? </h5>

                </td>

                <td>
                    <p class="paragraph">{{ $data['reasons_to_choise'][0]['others_choises'] }}</p>
                </td>
            </tr>


        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td>
                    <h5> Why did you decide to study the ENREM master's degree? (Multiple choice is possible)</h5>

                </td>
            </tr>
            @if ($data['reasons_to_choise'][0]['selected_choises'] != null)
                <tr>
                    <td>
                        @foreach ($data['reasons_to_choise'][0]['selected_choises_list'] as $item)
                            <p class="paragraph">{{ $item->value }}</p>
                        @endforeach
                    </td>
                </tr>

            @endif
        </tbody>
    </table>

    {{-- Future plans and expectations --}}
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>9. Future Plans and Expectations </h4>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5> Which path are you planning to pursue in the future?</h5>

                </td>

                <td>
                    <p class="paragraph" class="paragraph">{{ $data['future_plans'][0]['pursue_future'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Explain your choise</h5>

                </td>

                <td>
                    <p class="paragraph">{{ $data['future_plans'][0]['explain_pursue_future'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div style="page-break-after:always;"></div>

    {{-- 10. Fields of Interests   --}}
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>10. Fields of Interests </h4>
    </div>


    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <p class="paragraph"> Project idea: </p>
        <label>Identify a potential area of research you want to pursue during your master thesis that matches the areas
            of
            PMPCA and the Master NRM at ITT, your own skills as well as your future professional interest</label>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5> Project idea: </h5>

                </td>

                <td>
                    <p class="paragraph" class="paragraph">{{ $data['fields_of_interest'][0]['proyect_idea'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Keywords:</h5>

                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['keywords_proyect_idea'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <p class="paragraph"> Research Area at both Universities: </p>
        <label>In accordance with your research idea and the identified professor (senior
            researcher) for your research idea select a research area from PMPCA and ITT (BOTH) that mostly
            relates.</label>
    </div>

    <table class="table">
        <thead>
            <tr id='header-alone'>
                <th>
                    <h4>Country</h4>
                </th>
                <th>
                    <h4>Mexico</h4>
                </th>
                <th>
                    <h4>Germany</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <h5> Research Area: </h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['research_area_mexico'] }}</p>
                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['research_area_german'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5> Professor (Senior Researchers): </h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['professor_research_mexico'] }}</p>
                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['professor_research_german'] }}</p>
                </td>
            </tr>


        </tbody>
    </table>

    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <p class="paragraph"> Elective modules: </p>
        <label> Refer to the following link: http://www.enrem-master.info/about-enrem/content (Module Catalogue ENREM)
            Which elective modules offered in the ENREM Master program would you take to develop your research
            idea?</label>
    </div>

    <table class="table">
        <thead>
            <tr id='header-alone'>
                <th>
                    <h4>Country</h4>
                </th>
                <th>
                    <h4>Mexico</h4>
                </th>
                <th>
                    <h4>Germany</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <h5> Second semester PMPCA: </h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['elective_modules_PMPCA_mexico'] }}</p>
                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['elective_modules_PMPCA_german'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5> Third semester ITT: </h5>
                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['elective_modules_ITT_mexico'] }}</p>
                </td>

                <td>
                    <p class="paragraph">{{ $data['fields_of_interest'][0]['elective_modules_ITT_german'] }}</p>
                </td>
            </tr>


        </tbody>
    </table>

    <div style="page-break-after:always;"></div>


    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>12. Letters of recommendation </h4>
    </div>

    @foreach ($data['recommendation_letter_enrem'] as $rl)
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <h5> Type: </h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $rl['type'] }}</p>
                    </td>

                    <td>
                        <h5> Date: </h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $rl['date'] }}</p>
                    </td>

                </tr>
            </tbody>
        </table>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <h5> Full name: </h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $rl['full_name'] }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5> Title: </h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $rl['title'] }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5> Position: </h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $rl['position'] }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5> Organization: </h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $rl['organization'] }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5> Telephone: </h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $rl['telephone'] }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5> Email: </h5>
                    </td>

                    <td>
                        <p class="paragraph">{{ $rl['email'] }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach

    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>13. How did you hear about this master programme? </h4>
    </div>

    <table>
        <tbody>
            @if ($data['reasons_to_choise'][0]['selected_choises'] != null)

                @foreach ($data['reasons_to_choise'][0]['selected_choises_list'] as $item)
                    @if ($item->value == 'DAAD Brochure' ||
                        $item->value == 'CONACYT Information' ||
                        $item->value == 'current student' ||
                        $item->value == 'Alumni')
                        <tr>
                            <td>
                                <label>{{ $item->label }}</label>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>
                                <label>{{ $item->label }}</label>
                            </td>
                            <td>
                                <p class="paragraph">{{ $item->value }}</p>
                            </td>
                        </tr>
                    @endif
                @endforeach

            @endif
        </tbody>
    </table>

    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>Declaration (Please read before signing the application)</h4>
    </div>

    <div class="row">
        <table>
            <tbody>
                <tr>
                    <td class="checkbox">
                        <input type="checkbox" id="cbox1" value="first_checkbox">
                    </td>

                    <td class="notCheckbox">
                        <label> I hereby certify that the information provided in this application is accurate to the
                            best of my
                            knowledge. I accept the responsibility for the completeness of my application. Furthermore,
                            I agree to
                            inform ITT and PMPCA immediately of any changes and amendments.
                            I give my consent for ITT and PMPCA to store my personal data and the information provided
                            on the
                            application only to the extent necessary for the administration of applications and
                            scholarships, in
                            compliance with the “Federal Data Protection Law”. All applications of unsuccessful
                            candidates will be
                            destroyed after one year</label>
                        <h4>NOTE: Only SIGNED and COMPLETE applications WITH ATTACHMENTS will be considered.</h4>

                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <table class="declarationSignature">
        <tbody>
            <tr>
                <td class="date">
                    <hr size="3" width="90%" color="black">  
                    <label class="signature">Date</label>
                </td>
                <td class="place">
                    <td class="date">
                        <hr size="3" width="90%" color="black">  
                        <label class="signature">Place (City Name, Country)</label>
                    </td>
                </td>
                <td class="signature">
                    <td class="date">
                        <hr size="3" width="90%" color="black">  
                        <label class="signature">Signature / First-Last Name</label>
                    </td>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
