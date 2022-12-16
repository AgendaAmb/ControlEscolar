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

        th,
        td {
            text-align: left;
            padding: 2px;
            max-height: 10px;
            overflow-wrap: break-word;
        }


        tr {
            text-align: center !important;
            line-height: 2px;
            overflow-wrap: break-word;
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
        }

        h5 {
            font-size: 0.85em;
        }

        p {
            font-size: 0.7em;
            line-height: 0.5;
        }


        .break-line {
            color: #115089;
            border: 2px solid #115089;
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
                    <p>{{ $data['personal_data']['name'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Last name(s):</h5>
                </td>

                <td>
                    <p> {{ $data['personal_data']['middlename'] . ' ' . $data['personal_data']['surnames'] }}</p>
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
                    <p> {{ $data['personal_data']['gender'] }}</p>
                </td>

                <td>
                    <h5>Marital status:</h5>
                </td>

                <td>
                    <p> {{ $data['personal_data']['marital_state'] }}</p>
                </td>

                <td>
                    <h5>Nr. of children:</h5>
                </td>

                <td>
                    <p> {{ $data['personal_data']['no_children'] }}</p>
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
                    <p> {{ $data['personal_data']['birth_date'] }}</p>
                </td>

                <td>
                    <h5>Place of Birth:</h5>
                </td>

                <td>
                    <p> {{ $data['personal_data']['birth_state'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Nationality(ies):</h5>
                </td>

                <td>
                    <p> {{ $data['personal_data']['birth_country'] }}</p>
                </td>

                <td>
                    <h5>Country of residense:</h5>
                </td>

                <td>
                    <p> {{ $data['personal_data']['residence_country'] }}</p>
                </td>
            </tr>


            <tr>
                <td>
                    <h5>Email:</h5>
                </td>

                <td>
                    <p> {{ $data['personal_data']['email'] }}</p>
                </td>

                <td>
                    <h5>Altern Email:</h5>
                </td>

                <td>
                    <p> {{ $data['personal_data']['altern_email'] }}</p>
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
                    <p>{{ $data['address'][0]['care_of'] }}</p>
                </td>
            </tr>

            <tr>
                <td>
                    <h5>Street and number:</h5>
                </td>

                <td>
                    <p>{{ $data['address'][0]['street'] . ' ' . $data['address'][0]['number_address'] }}</p>
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
                    <p>{{ $data['address'][0]['street'] . ' ' . $data['address'][0]['number_address'] }}</p>
                </td>
                <td>
                    <h5>Postal Code:</h5>
                </td>

                <td>
                    <p>{{ $data['address'][0]['postal_code'] }}</p>
                </td>

                <td>
                    <h5>State/Country:</h5>
                </td>

                <td>
                    <p>{{ $data['address'][0]['state_country'] }}</p>
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
                    <p>{{ $data['address'][0]['telephone'] }}</p>
                </td>
                <td>
                    <h5>Mobile phone:</h5>
                </td>

                <td>
                    <p>{{ $data['address'][0]['mobile_phone'] }}</p>
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
                        <p>If is different from permanent
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
                        <p>{{ $data['address'][1]['care_of'] }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <h5>Street and number:</h5>
                    </td>

                    <td>
                        <p>{{ $data['address'][1]['street'] . ' ' . $data['address'][1]['number_address'] }}</p>
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
                        <p>{{ $data['address'][1]['street'] . ' ' . $data['address'][1]['number_address'] }}</p>
                    </td>
                    <td>
                        <h5>Postal Code:</h5>
                    </td>

                    <td>
                        <p>{{ $data['address'][1]['postal_code'] }}</p>
                    </td>

                    <td>
                        <h5>State/Country:</h5>
                    </td>

                    <td>
                        <p>{{ $data['address'][1]['state_country'] }}</p>
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
                        <p>{{ $data['address'][1]['telephone'] }}</p>
                    </td>
                    <td>
                        <h5>Mobile phone:</h5>
                    </td>

                    <td>
                        <p>{{ $data['address'][1]['mobile_phone'] }}</p>
                    </td>

                </tr>
            </tbody>
        </table>
    @endif
    <div class="row" style="margin-top: 5px; margin-bottom:5px;">
        <h4>3. Secondary Education (High School)</h4>
    </div>
    {{-- Permanent Address --}}
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <h5>School certificade </h5>

                </td>

                <td>
                    <p>{{ $data['secondary_education'][0]['school_certificade'] }}</p>
                </td>

                <td>
                    <h5>Final score:</h5>
                </td>

                <td>
                    <p>{{ $data['secondary_education'][0]['final_score'] }}</p>
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
                    <p>{{ $data['secondary_education'][0]['name_of_institution'] }}</p>
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
                    <p>{{ $data['secondary_education'][0]['from'] }}</p>
                </td>

                <td>
                    <h5>To (mm.yyyy):</h5>
                </td>

                <td>
                    <p>{{ $data['secondary_education'][0]['to'] }}</p>
                </td>

                <td>
                    <p>{{ $data['secondary_education'][0]['city_country'] }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- Higher Education --}}
    @foreach ($data['higher_education'] as $item)
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <h5>School certificade </h5>

                    </td>

                    <td>
                        <p>{{ $data['secondary_education'][0]['school_certificade'] }}</p>
                    </td>

                    <td>
                        <h5>Final score:</h5>
                    </td>

                    <td>
                        <p>{{ $data['secondary_education'][0]['final_score'] }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach



</body>

</html>
