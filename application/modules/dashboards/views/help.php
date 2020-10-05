<div class="row my-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="help-item" onclick="helpContentToggle('about')">
                    <h5 class="m-0">About</h5>
                    <img src="<?= base_url() ?>assets/images/dashboard/help-icon.png" alt="help-image" class="help-img" id="about-icon">
                </div>

                <!-- <p class="mt-3 m-0 help-content" id="about">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut libero tenetur odio commodi eius, optio non doloribus dolorem sed fuga temporibus animi laudantium assumenda a, earum iusto aperiam maiores magni.
                </p> -->
                <div class="mt-3 m-0 help-content" id="about">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="<?= base_url() ?>assets/images/landings/l2-right_icon.png" alt="right-icon" class="img-fluid mb-3">
                            <p class="text-center">
                                Edition: Special package for TFRIC-19 BPPT
                                <br />
                                Version: 1.0 (as of July 1, 2020)
                            </p>
                        </div>

                        <div class="col-md-8">
                            <ul>
                                <li>
                                    DSS KGS for Covid-19 Detection is developed as part of Artificial Intelligence-based Imaging System within a multi-stakeholder collaboration team Research and Innovation Task Force for Covid-19 (TFRIC19) Agency o for the Assessment and Application of Technology (BPPT).
                                </li>
                                <li>
                                    DSS KGS for Covid-19 Detection is a copyright of Cognitive Artificial Intelligence Research Group (CAIRG) team and it utilizes ASSA2010 information inferencing fusion  which was invented by Colonel Dr. Ir. Arwin Datumaya Wahyudi Sumari, S.T., M.T., IPM, ASEAN Eng. and Prof. Dr-ing. Ir. Adang Suwandi Ahmad, DEA, IPU in 2009.
                                </li>
                                <li>
                                    All credits go to all CAIRG team members as well as supporting team as follows.
                                    <ol>
                                        <li class="font-weight-bold">Colonel Dr. Ir. Arwin Datumaya Wahyudi Sumari, S.T., M.T., IPM, ASEAN Eng. – Team Leader</li>
                                        <li class="font-weight-bold">Dr.rer.pol. Rizqi Abdulharis – Unit Leader for KGS Geospatial</li>
                                        <li class="font-weight-bold">Ika Noer Syamsiana, S.T., M.T., Ph.D. – Unit Leader for KGS Front end User Interface Developer</li>
                                        <li class="font-weight-bold">Muhammad Nurwiseso Wibisono, S.Kom., M.T. – KGS Core Engine Developer (Version 0.1)</li>
                                        <li class="font-weight-bold">Dimas Rossiawan Hendra Putra, S.T. – KGS Image Processing Engineer</li>
                                        <li class="font-weight-bold">Rafarda Ajeng Septiardhya, S.Pd. – KGS Writer</li>
                                    </ol>

                                    Support Team

                                    <ol>
                                        <li class="font-weight-bold">Yogi Dwianandono Rizkiadi – Network and Integration Support</li>
                                        <li class="font-weight-bold">Moh. Khafidzul Ifan Ashari – KGS Front end Developer</li>
                                        <li class="font-weight-bold">Andrian Rachmat – KGS User Interface Developer</li>
                                        <li class="font-weight-bold">Angger Pratamadhita Wibawa– KGS Core Enginer Developer (version 0.5 and up)</li>
                                        <li class="font-weight-bold">Thariq Alfa Benriska – KGS Back End Developer (version 0.2)</li>
                                    </ol>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="help-item" onclick="helpContentToggle('user-manual')">
                    <h5 class="m-0">User Manual</h5>
                    <img src="<?= base_url() ?>assets/images/dashboard/help-icon.png" alt="help-image" class="help-img" id="user-manual-icon">
                </div>

                <!-- <p class="mt-3 m-0 help-content" id="user-manual">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut libero tenetur odio commodi eius, optio non doloribus dolorem sed fuga temporibus animi laudantium assumenda a, earum iusto aperiam maiores magni.
                </p> -->
                <div class="mt-3 m-0 help-content" id="user-manual">
                    <img src="<?= base_url() ?>assets/images/help/help-user_manual.png" alt="auth-image" class="mx-auto w-100">
                    <div>
                        Instruction when using DSS KGS for Covid-19 Detection.
                    </div>
                    <ol>
                        <li>For new user please do registration first and have report file prepared.</li>
                        <li>The report file for input data should be csv type with data format follows the rule already settled.</li>
                        <li>There are two options for data processing that can be selected (single report and multiple reports).</li>
                        <li>The results of the data processing can be saved and also in form of Application Programming Interface (API).</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function helpContentToggle (id) {
        $(`#${id}`).toggle()
        document.getElementById(`${id}-icon`).classList.toggle('help-reverse')
    }
</script>
