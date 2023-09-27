<template>
  <div style="margin-left: 150px">
    <div class="col-12">
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 01 ENREM Application</strong>
          </p>
          <p class="my-2 d-block">
            <strong>
              ENREM application form for Study place (must be signed)
            </strong>
            Complete application form (PDF) in English ENREM application form
            for Study place (must be signed) Complete application form (PDF) in
            English Note: Some browser pdf viewers will not support this form.
            Please, first save the file to your computer and then open on your
            computer in order to fill it out.
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <label>
              <a
                :href="'https://www.enrem-master.info/images/pdf/ENREM-Application-2023_V1.pdf'"
                style="height: 45px; width: 100%"
                target="_blank"
              >
                <button class="uaslp-btn">
                  <font-awesome-icon icon="fa-solid fa-eye" />
                  <span>Download</span>
                </button>
              </a>
            </label>
          </div>

          <div
            class="d-flex justify-content-center"
            style="max-height: 45px !important; width: 100%"
          >
            <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
            <label>
              <button class="uaslp-btn" @click="handleDocument">
                <font-awesome-icon icon="fa-solid fa-upload" />
                <input
                  type="file"
                  ref="fileInput"
                  class="form-control d-none"
                  @change="cargaDocumento"
                />
                <span>Upload</span>
              </button>
              <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
            </label>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong>
              01A ApplicationDAAD (additional for DAAD-Scholarships)
            </strong>
          </p>
          <p class="my-2 d-block">
            <strong> DAAD Application Form</strong>
            - Complete the application form digitally in English, not by hand -
            On page 2, point 7., you must list all EPOS master programs you have
            applied for (to start in the current year) * For application to
            DAAD-Scholarship you must be submitted both Application Forms (ENREM
            and DAAD)
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <label>
              <a
                :href="'https://www2.daad.de/medien/deutschland/stipendien/formulare/forschungsstipendium_en.pdf'"
                style="height: 45px; width: 100%"
                target="_blank"
              >
                <button class="uaslp-btn">
                  <font-awesome-icon icon="fa-solid fa-eye" />
                  <span>Download</span>
                </button>
              </a>
            </label>
          </div>

          <div
            class="d-flex justify-content-center"
            style="max-height: 45px !important; width: 100%"
          >
            <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
            <label>
              <button class="uaslp-btn" @click="handleDocument">
                <font-awesome-icon icon="fa-solid fa-upload" />
                <input
                  type="file"
                  ref="fileInput"
                  class="form-control d-none"
                  @change="cargaDocumento"
                />
                <span>Upload</span>
              </button>
              <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
            </label>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 02A BachelorDegree</strong>
          </p>
          <p class="my-2 d-block">
            <strong>
              Bachelor Degree Bachelor’s degree (normally four years) in a
              related subject</strong
            >
            Bachelor’s degree (normally four years) in a related subject
            <strong>For DAAD Scholarship</strong>
            - A copy of the original document and a copy of the certified
            translation made by a sworn translator, if the original is not in
            German or English. Make sure they are clearly legible * Only for
            DAAD-Scholarship applicants: The last academic degrees should
            generally not be older than six years
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <label>
              <a
                :href="'https://www.enrem-master.info/images/pdf/ENREM-Application-2023_V1.pdf'"
                style="height: 45px; width: 100%"
                target="_blank"
              >
                <button class="uaslp-btn">
                  <font-awesome-icon icon="fa-solid fa-eye" />
                  <span>Download</span>
                </button>
              </a>
            </label>
          </div>

          <div
            class="d-flex justify-content-center"
            style="max-height: 45px !important; width: 100%"
          >
            <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
            <label>
              <button class="uaslp-btn" @click="handleDocument">
                <font-awesome-icon icon="fa-solid fa-upload" />
                <input
                  type="file"
                  ref="fileInput"
                  class="form-control d-none"
                  @change="cargaDocumento"
                />
                <span>Upload</span>
              </button>
              <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
            </label>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 02B TranscriptBachelor</strong>
          </p>
          <p class="my-2 d-block">
            <strong> Transcript of Academic Records – Bachelor’s Degree</strong>
            Official certificate of all the courses that you have completed,
            including the number of credits and the final grade
            <strong>For DAAD Scholarship</strong>
            - A copy of the original document and a copy of the certified
            translation made by a sworn translator, if the original is not in
            German or English. Make sure they are clearly legible * Only for
            DAAD-Scholarship applicants: The last academic degrees should
            generally not be older than six years
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 02C ConstanciaPromBa</strong>
          </p>
          <p class="my-2 d-block">
            <strong> Final Grade Average of Bachelor’s Degree</strong>
            Final grade average obtained in your higher education studies
            (Bachelors) with an official certificate or letter describing the
            grading scale used by your institution. This document should include
            the minimum and maximum possible scores, as well as the score
            required to pass a course.
            <strong>For DAAD Scholarship</strong>
            - A copy of the original document and a copy of the certified
            translation made by a sworn translator, if the original is not in
            German or English. Make sure they are clearly legible
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 03 MotivationLetter</strong>
          </p>
          <p class="my-2 d-block">
            <strong> Motivation Letter (1 page), must be signed* </strong>
            A statement that explains why you have chosen this program in a
            specific and convincing manner. You should answer the following
            question: - Why do you want to study this master’s program in
            relation to your previous academic qualification and professional
            experiences? (one paragraph) - What is your professional goal after
            obtaining your master’s degree, and how will the master’s program
            contribute to this? (one paragraph) - Which three main benefits do
            you expect to gain from the program, and which three main
            contributions could you provide to the program? (List) Why you think
            you should be selected? (List five arguments of personal
            characteristics) * German applicants and native English speakers are
            expected to express in English and Spanish, all others in English
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 04 ProjectIdea </strong>
          </p>
          <p class="my-2 d-block">
            <strong> Project Idea (max. 2 pages incl. 5 keywords) *</strong>
            Short research proposal of the potential research topic you want to
            pursue during your master’s thesis: - The proposal’s focus must be
            linked to the above-mentioned subjects, content, and areas of PMPCA
            and the Master NRM at ITT, your own skills, as well as your future
            professional interests. - The subject must be of importance to the
            current scientific discussion. - Briefly describe your research
            project; i.e. the topic, research focus, theoretical and methodical
            approach. - The proposal should be written in a scientific research
            proposal format (e.g. structure, citation, sources, etc) - Your
            essay will be submitted to a plagiarism check. * To be written in
            English and it must be signed * This project does not necessarily
            represent the final thesis project
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 05A English</strong>
          </p>
          <p class="my-2 d-block">
            <strong> Proof of English Proficiency</strong>
            <strong>TOEFL: </strong>
            (Test of English as a Foreign Language, USA) - Internet based Test
            version (iBT): At least 79 points * NOTE: We don’t accepted TOEFL
            ITP and TOEFL MyBest Scores
            <strong>IELTS: </strong>
            (International English Language Testing System, UK) - Academic
            Version: at least level 6.0
            <strong>Cambridge</strong>
            First (FCE) Certificate - Scale score: 160 -190 (CEFR: B2) * Scores
            must be no more than 3 years old * Required for ALL applicants whose
            nationality does NOT have English as a mother language
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 05B Spanish </strong>
          </p>
          <p class="my-2 d-block">
            <strong> Proof of Spanish Proficiency</strong>
            - Certificate of language course - Extended period of time living,
            studying or working (internship is possible) in a Spanish speaking
            country: As a proof of proficiency a letter from the
            company/organization detailing the time period of the activity and
            confirming that Spanish was the main working language would be an
            advantage * Required ONLY for applicants whose nationality does NOT
            have Spanish as a mother language
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 05C German </strong>
          </p>
          <p class="my-2 d-block">
            <strong> Proof of German Proficiency</strong>
            - Certificate of language course or exam * Not obligatory only if
            you have
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 06A CV </strong>
          </p>
          <p class="my-2 d-block">
            <strong> Curriculum Vitae in English</strong>
            – only EUROPASS format – max. 3 pages, must be dated and signed – in
            reverse chronological order, dates must precisely correspond to all
            requested application documents * Please do not include degrees and
            certificates attachments in the CV
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 06B ProofExperience </strong>
          </p>
          <p class="my-2 d-block">
            <strong> Certificate(s) of Employment/Internship</strong>
            Certificate of Employment or Internship relevant to the master’s
            program. This must include the position and the specific activities,
            as well as the exact period of the activity. * The Certificate(s) of
            Employment must have a letterhead, a date of issue, a signature and
            an official stamp (seal) * No more than 3 certificates
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong>
              06C WorkexperienceDAAD (additional for DAAD Scholarships)
            </strong>
          </p>
          <p class="my-2 d-block">
            <strong> Work certificate(s), in German or English* </strong>
            – Certificate(s) of relevant work experiences after the bachelor’s
            degree. – The certificate(s) in total must amount to at least two
            years of documented work experience after graduation by time of
            application. – The Certificate(s) must include the exact period of
            the activity (i.e. dd.mm.yyyy-dd.mm.yyyy), the position and the
            specific activities. – A copy of the original document and a copy of
            the certified translation made by a sworn translator, if the
            original is not in German or English. Make sure they are clearly
            legible * Obligatory: The Certificate(s) of Employment must have a
            letterhead, a date of issue, a signature and an official stamp
            (seal)
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong> 07 Recommendation_01 Recommendation_02 </strong>
          </p>
          <p class="my-2 d-block">
            <strong> Two Recommendation Letters for a study place </strong>
            From your university and/or from your employer * IMPORTANT: The
            letters must have a signature and an official stamp (seal) and must
            be of recent data (not in a sealed envelope)
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong>
              07A Professionalrecommendation (additional for DAAD
              Scholarships)</strong
            >
          </p>
          <p class="my-2 d-block">
            <strong> Professional Recommendation from Current Employer </strong>
            – The recommendation from the current employer must have a
            letterhead, a recent date of issue, a signature and an official
            stamp (seal). – The recommendation may substitute the work
            certificate if it fulfills the criteria in point 06C (see above). –
            A copy of the original document and a copy of the certified
            translation made by a sworn translator, if the original is not in
            German or English. Make sure they are clearly legible * Obligatory:
            The Recommendation from current employer must have a letterhead, a
            date of issue, a signature and an official stamp (seal)
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong>08 Passport</strong>
          </p>
          <p class="my-2 d-block">
            <strong> Passport </strong>
            Copy of passport page that contains your name, personal information
            and other official details.
          </p>
        </div>

        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong>09 BirthCert</strong>
          </p>
          <p class="my-2 d-block">
            <strong> Birth Certificate </strong>
            Copy of the original birth certificate *No translation is required
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong
              >10 Professional License (in Spanish cédula professional)
            </strong>
          </p>
          <p class="my-2 d-block">
            <strong> Professional License </strong>
            Applies only for Mexicans - Optional for application - At time of
            inscription at UASLP, proof of application for Professional License
            has to be delivered(obligatory)
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-flex align-items-center my-2" style="width: 100%">
        <div class="form-group col-10 col-md-10 col-xs-9 width-100">
          <h5 class="mt-2 d-block">
            <template v-if="checkUpload() === true">
              <i>State:</i> <i class="text-success">uploaded</i>
            </template>
            <template v-else>
              <i>State:</i> <i class="text-danger"> without uploading</i>
            </template>
          </h5>

          <p class="my-2 d-block">
            <strong>11 HighSchool</strong>
          </p>
          <p class="my-2 d-block">
            <strong> High School Certificate </strong>
            High school education certificate (Abitur, Bachillerato, Secundaria,
            High School, etc.)
          </p>
        </div>
        <div class="form-group col-1 col-md-1 col-xs-2 align-items-center">
          <div
            class="d-flex justify-content-center my-1"
            style="max-height: 45px; width: 100%"
          >
            <div
              class="d-flex justify-content-center"
              style="max-height: 45px !important; width: 100%"
            >
              <!-- <label v-if="isIntentionLetter() === false" v-bind:style="{ 'background-image': 'url(require(' + bkgCargarArchivo('seleccionar') + ')); height:100%; width:100%;'}"  > -->
              <label>
                <button class="uaslp-btn" @click="handleDocument">
                  <font-awesome-icon icon="fa-solid fa-upload" />
                  <input
                    type="file"
                    ref="fileInput"
                    class="form-control d-none"
                    @change="cargaDocumento"
                  />
                  <span>Upload</span>
                </button>
                <!-- <img
            :src="images_btn.seleccionar"
            alt=""
            style="max-height: 45px !important"
          /> -->
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "enrem-archives",

  props: {},

  data() {
    return {
      errores: {},
      datosValidos: {},
      textStateUpload: "",
      academiLetterCommitment: "",
      images: null,
    };
  },

  computed: {
    styleBtn() {
      return {
        backgroundColor: "rgba(0,96,175,255)",
        color: "rgb(244, 244, 244)",
        border: "none",
        alignItems: "center",
        height: "100%",
      };
    },
  },

  // created() {
  //   // console.log(this.language);
  //   axios
  //     .get("/controlescolar/solicitud/getAllButtonImage")
  //     .then((response) => {
  //       // console.log('recibiendo imagenes' + response.data.ver);
  //       this.images = response.data;
  //       // console.log('imagenes buttons: ' + this.images.ver);
  //     })
  //     .catch((error) => {
  //       console.log(error);
  //     });
  // },

  methods: {
    handleDocument() {
      this.$refs.fileInput.click();
    },
    bkgCargarArchivo(type) {
      // console.log(this.language);
      axios
        .get("/controlescolar/solicitud/getButtonImage", {
          params: {
            type: type,
          },
        })
        .then((response) => {
          // console.log('hola' + response.data);
          return response.data;
        })
        .catch((error) => {
          // console.log(error);
          return null;
        });
    },
    checkUpload() {
      if (this.location !== null && this.location !== undefined) {
        return true;
      } else {
        return false;
      }
    },
    cargaDocumento(e) {
      let file = e.target.files[0];
      let name = file.name;
      this.Errores = {};

      if (file.type !== "application/pdf") {
        this.Errores = {
          file: "El archivo debe tener formato PDF.",
        };
        return false;
      }

      var formData = new FormData();
      formData.append("archive_id", 1);
      formData.append("requiredDocumentId", 1);
      formData.append("file", file);

      axios({
        method: "post",
        url: "/controlescolar/solicitud/updateArchivePersonalDocument",
        data: formData,
        headers: {
          Accept: "application/json",
          "Content-Type": "multipart/form-data",
        },
      })
        .then((response) => {})
        .catch((error) => {});
    },
  },
};
</script>
