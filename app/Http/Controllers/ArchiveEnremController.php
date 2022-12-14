<?php

namespace App\Http\Controllers;

use App\Models\AcademicDegree;
use App\Models\Address;
use App\Models\AppliantLanguage;
use App\Models\Archive;
use App\Models\EnvironmentRelatedSkills;
use App\Models\FieldsOfInterest;
use App\Models\FinancingStudies;
use App\Models\FuturePlans;
use App\Models\HearAboutProgram;
use App\Models\ReasonsToChoise;
use App\Models\RecommendationLetterEnrem;
use App\Models\SecondaryEducation;
use App\Models\User;
use App\Models\WorkingExperience;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArchiveEnremController extends Controller
{
    public function updatePersonalData(Request $request)
    {        
        try {
            $request->validate([
                'archive_id' => ['required', 'numeric', 'exists:archives,id'],
                'name' => ['required', 'string', 'max:255'],
                'middlename' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string'],
                'birth_date' => ['required', 'date', 'before:' . Carbon::now()->toString(),],
                'marital_state' => ['required', 'string'],
                'birth_country' => ['required', 'string', 'max:255'],
                'nationality' => ['required', 'string', 'max:255'],
                'residense_country' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'altern_email' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'numeric'],
                'no_children' => ['required', 'numeric'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error al actualizar informacion de appliant en expediente', 'error' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }


        $archive =  Archive::with('appliant')->firstWhere('id', $request->archive_id);
        $user = User::where('id',$archive->appliant->id)->first();
        $user->update($request->only(['marital_state', 'birth_state', 'no_children']));
        // $archive->appliant()->save(
        //     $request->except(['no_children'])
        // );

        return new JsonResponse(['message' => 'Data of appliant section was saved'], JsonResponse::HTTP_ACCEPTED);
    }

    // ADDRESS

    // UPDATE

    public function updateAddress(Request $request)
    {
        try {
            $request->validate([
                'archive_id' => ['required', 'numeric', 'exists:archives,id'],
                'id' =>['required', 'numeric'],
                'care_of' => ['required', 'string'],
                'street' => ['required', 'string'],
                'number_address' => ['required', 'numeric'],
                'city' => ['required', 'string', 'max:255'],
                'state_country' => ['required', 'string', 'max:255'],
                'telephone' => ['required', 'numeric'],
                'postal_code' => ['required', 'string', 'max:255'],
                'mobile_phone' => ['required', 'numeric'],

            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to validate data', 'error' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        try {
            $address = Address::find($request->id);
            $address->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected address', 'error' => $e->getMessage()], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Address update', 'object' => $address], 200);
    }

    public function updateSecondaryEducation(Request $request)
    {
        try {
            $request->validate([
                'archive_id' => ['required', 'numeric', 'exists:archives,id'],
                'id' => ['required', 'numeric'],

                'school_certificade' => ['required', 'string'],
                'final_score' => ['required', 'numeric'],
                'name_of_institution' => ['required', 'string'],
                'from' => ['required', 'date', 'before:' . Carbon::now()->toString(),],
                'to' => ['required', 'date', 'before:' . Carbon::now()->toString(),],
                'city_country' => ['required', 'string', 'max:255'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to validate data' + $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        try {
            $secondary_education = SecondaryEducation::find($request->id);
            $secondary_education->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected Secondary Education'], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Secondary Education update', 'object' => $secondary_education], 200);
    }

    public function updateHigherEducation(Request $request)
    {
        // try {
        //     $request->validate([
        //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
        //         'id' => ['required', 'numeric'],

        //         'degree_type' => ['required', 'string', 'max:255'],
        //         'degree' => ['required', 'string', 'max:255'],
        //         'to' => ['required', 'date', 'before:' . Carbon::now()->toString()],
        //         'from' => ['required', 'date', 'before:' . Carbon::now()->toString()],
        //         'date_of_award_of_degree' => ['required', 'date', 'before:' . Carbon::now()->toString()],
        //         'final_grade_average' => ['required', 'string', 'max:255'],
        //         'university' => ['required', 'string', 'max:255'],
        //         'country' => ['required', 'string', 'max:255'],
        //         'graduation_mode' => ['required', 'string', 'max:255'],
        //         'fill_according_graduation' => ['required', 'string'],
        //         'average' => ['required', 'numeric'],
        //         'min_avg' => ['required', 'numeric'],
        //         'max_avg' => ['required', 'numeric'],

        //     ]);
        // } catch (\Exception $e) {
        //     return new JsonResponse(['message' => 'Error trying to validate data in higher education', 'error' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }

        try {
            $higher_education = AcademicDegree::find($request->id);
            $higher_education->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected Higher Education'], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Higher Education update', 'object' => $higher_education], 200);
    }


    public function updateEnvironmentSkills(Request $request)
    {
        try {
            $request->validate([
                'archive_id' => ['required', 'numeric', 'exists:archives,id'],
                'id' => ['required', 'numeric'],
                'message_review' => ['required', 'string'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to validate data' + $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        }

        try {
            $environment = EnvironmentRelatedSkills::find($request->id);
            $environment->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected  Environment Related Skills'], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Environment Related Skills update', 'object' => $environment], 200);
    }

    public function updateWorkingExperiences(Request $request)
    {
        // try {
        //     $request->validate([
        //         'id' => ['required', 'numeric'],
        //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
        //         'from' => ['required', 'date', 'before:' . Carbon::now()->toString()],
        //         'to' => ['required', 'date', 'before:' . Carbon::now()->toString()],
        //         'knowledge_area' => ['required', 'string', 'max:255'],
        //         'working_position' => ['required', 'string', 'max:255'],
        //         'institution' => ['required', 'string', 'max:255'],
        //         'state' => ['required', 'string', 'max:255'],
        //         'working_position_description' => ['required', 'string']
        //     ]);
        // } catch (\Exception $e) {
        //     return new JsonResponse(['message' => 'Error trying to validate data','error' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }

        try {
            $we = WorkingExperience::find($request->id);
            $we->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected Working Experiences'], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Working Experiences update', 'object' => $we], 200);
    }

    public function updateReasonsToChoise(Request $request)
    {
        // try {
        //     $request->validate([
        //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
        //         'id' => ['required', 'numeric'],
        //         'first_choise' => ['required', 'string', 'max:255'],
        //         'reasons_choise' => ['required', 'string'],
        //         'other_choises' => ['required', 'string', 'max:255'],
        //         'selected_choises' => ['required', 'json'],
        //     ]);
        // } catch (\Exception $e) {
        //     return new JsonResponse(['message' => 'Error trying to validate data' + $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }

        try {
            $rea = ReasonsToChoise::find($request->id);
            $rea->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected Reasons to choise', 'error'=> $e->getMessage()], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Environment Reasons to choise update', 'object' => $rea], 200);
    }

    public function updateLanguageSkills(Request $request)
    {
        // try {
        //     $request->validate([
        //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
        //         'id' => ['required', 'numeric'],
        //         'language' => ['required', 'string', 'max:255'],
        //         'exam_presented' => ['required_if:language,English', 'string', 'max:255', 'nullable'],
        //         'kind_of_exam' => ['required_if:language,English', 'string', 'max:255' ,'nullable'],
        //         'date_of_exam' => ['required_if:language,English', 'date', 'before:' . Carbon::now()->toString(), 'nullable'],
        //         'learning_method' => ['required_if:language,Spanish,German', 'string', 'max:255', 'nullable'],
        //         'country' => ['required', 'string', 'max:255'],
        //         'duration_in_months' => ['required_if:language,Spanish,German', 'numeric', 'nullable'],
        //         'overal_grade_score' => ['required', 'string', 'max:255'],
        //         'language_domain' => ['required', 'string', 'max:255'],
        //         'conversational_level' => ['required', 'string', 'max:255'],
        //         'reading_level' => ['required', 'string', 'max:255'],
        //         'writing_level' => ['required', 'string', 'max:255'],

        //    ]);
        // } catch (\Exception $e) {
        //     return new JsonResponse(['message' => 'Error trying to validate data' ,'error' => $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }

        try {
            $rea = AppliantLanguage::find($request->id);
            $rea->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected Reasons to choise'], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Environment Reasons to choise update', 'object' => $rea], 200);    }


    public function updateFuturePlansExpectations(Request $request)
    {
        // try {
        //     $request->validate([
        //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
        //         'id' => ['required', 'numeric'],
        //         'pursue_future' => ['required', 'string', 'max:255'],
        //         'explain_pursue_future' => ['required', 'string'],
        //     ]);
        // } catch (\Exception $e) {
        //     return new JsonResponse(['message' => 'Error trying to validate data' + $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }

        try {
            $fp = FuturePlans::find($request->id);
            $fp->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected Future plans expectations'], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Environment Future plans expectation update', 'object' => $fp], 200);
    }


    public function updateFieldsOfInterest(Request $request)
    {
        // try {
        //     $request->validate([
        //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
        //         'id' => ['required', 'numeric'],
        //         'research_area_mexico' => ['required', 'string', 'max:255'],
        //         'research_area_german' => ['required', 'string', 'max:255'],
        //         'professor_research_mexico' => ['required', 'string', 'max:255'],
        //         'professor_research_german' => ['required', 'string', 'max:255'],
        //         'elective_modules_PMPCA_german' => ['required', 'string'],
        //         'elective_modules_PMPCA_mexico' => ['required', 'string'],
        //         'elective_modules_ITT_german' => ['required', 'string'],
        //         'elective_modules_ITT_mexico' => ['required', 'string'],
        //         'proyect_idea' => ['required', 'string'],
        //         'keywords_proyect_idea' => ['required', 'string'],
        //     ]);
        // } catch (\Exception $e) {
        //     return new JsonResponse(['message' => 'Error trying to validate data' + $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }

        try {
            $foi= FieldsOfInterest::find($request->id);
            $foi->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected Fields of Interest'], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Environment Fields of Interest update', 'object' => $foi], 200);
    }

    public function updateFinancingStudies(Request $request)
    {
        // try {
        //     $request->validate([
        //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
        //         'id' => ['required', 'numeric'],
        //         'financing_options' => ['required', 'json'],
        //     ]);
        // } catch (\Exception $e) {
        //     return new JsonResponse(['message' => 'Error trying to validate data' + $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
        // }

        try {
            $fs= FinancingStudies::find($request->id);
            $fs->update($request->except(['archive_id', 'id']));
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Error trying to update the selected Financing Studies'], JsonResponse::HTTP_CONFLICT);
        }

        return new JsonResponse(['message' => 'Great! Financing Studies update', 'object' => $fs], 200);

        }

        public function updateLettersOfRecommendation(Request $request)
        {
            // try {
            //     $request->validate([
            //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
            //         'id' => ['required', 'numeric'],
            //         'type' => ['required', 'string', 'max:255'],
            //         'date' => ['required', 'date', 'before:' . Carbon::now()->toString(),],
            //         'title' => ['required', 'string', 'max:255'],
            //         'position' => ['required', 'string', 'max:255'],
            //         'organization' => ['required', 'string', 'max:255'],
            //         'telephone' => ['required', 'integer'],
            //         'full_name' => ['required', 'string'],
            //         'email' => ['required', 'string'],
            //     ]);
            // } catch (\Exception $e) {
            //     return new JsonResponse(['message' => 'Error trying to validate data' + $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
            // }
    
            try {
                $rl= RecommendationLetterEnrem::find($request->id);
                $rl->update($request->except(['archive_id', 'id']));
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'Error trying to update the selected Recommendation Letter'], JsonResponse::HTTP_CONFLICT);
            }
    
            return new JsonResponse(['message' => 'Great! Environment Recomendation Letter update', 'object' => $rl], 200);
    
        }

        public function updateHearAboutProgram(Request $request)
        {
            // try {
            //     $request->validate([
            //         'archive_id' => ['required', 'numeric', 'exists:archives,id'],
            //         'id' => ['required', 'numeric'],
            //         'how_hear' => ['required', 'json'],
                    
            //     ]);
            // } catch (\Exception $e) {
            //     return new JsonResponse(['message' => 'Error trying to validate data' + $e->getMessage()], JsonResponse::HTTP_SERVICE_UNAVAILABLE);
            // }
    
            try {
                $rl= HearAboutProgram::find($request->id);
                $rl->update($request->except(['archive_id', 'id']));
            } catch (\Exception $e) {
                return new JsonResponse(['message' => 'Error trying to update the selected Hear About Program'], JsonResponse::HTTP_CONFLICT);
            }
    
            return new JsonResponse(['message' => 'Great! Environment Hear About Program update', 'object' => $rl], 200);
    
        }

    //                 'birth_date' => ['required', 'date', 'before:' . Carbon::now()->toString(),],


}