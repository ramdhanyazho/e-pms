<?php
    $author = 'Tunas';
    $titleBrowser = 'Announcement | Tunas';
    $titlePage = 'Announcement';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header-employee.php');?>

    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <div class="row no-gutters">
                    <div class="col-md-4 sticky mt-30">
                        <!-- SEARCH ANNOUNCEMENT -->
                        <div class="col-sm-12 columns f-none mb-15">
                            <form action="" class="row">
                                <div class="input-group border r-10 mb-10 bg-whtsmoke-opacity">
                                    <input type="text" class="s-18 form-control bg-transparent no-b p-25" placeholder="Search Announcement" />
                                    <button type="submit" class="ic-search fa fa-search search"></button>
                                </div>
                            </form>
                        </div>
                        <!-- END SEARCH ANNOUNCEMENT -->
                        <div class="slimScroll" data-height="700">
                            <!-- MAIN SIDE LEFT PROFILE -->
                            <div class="columns">
                                <ul class="list-unstyled list-inbox nav d-block" role="tablist">
                                    <li>
                                        <a class="inbox-content active" data-toggle="tab" href="#inbox-1" role="tab" aria-selected="true">
                                            <div class="s-18 text-main mb-10">
                                                <strong>Abdul</strong>
                                            </div>
                                            <div class="s-18">
                                                Vivamus diam elit diam
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="inbox-content" data-toggle="tab" href="#inbox-2" role="tab" aria-selected="false">
                                            <div class="s-18 text-main mb-10">
                                                <strong>Pierce</strong>
                                            </div>
                                            <div class="s-18">
                                                Lorem ipsum dolor sit amet.
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="inbox-content" data-toggle="tab" href="#inbox-3" role="tab" aria-selected="false">
                                            <div class="s-18 text-main mb-10">
                                                <strong>Abdul Pierce</strong>
                                            </div>
                                            <div class="s-18">
                                                Ipsum Subject
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="inbox-content" data-toggle="tab" href="#inbox-4" role="tab" aria-selected="false">
                                            <div class="s-18 text-main mb-10">
                                                <strong>AbdulPierce</strong>
                                            </div>
                                            <div class="s-18">
                                                Subject 4
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="inbox-content" data-toggle="tab" href="#inbox-5" role="tab" aria-selected="false">
                                            <div class="s-18 text-main mb-10">
                                                <strong>Abdul Hz</strong>
                                            </div>
                                            <div class="s-18">
                                                Vivamus diam elit diam
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MAIN SIDE LEFT PROFILE -->
                        </div>
                    </div>
                    <div class="col-md-8 mt-30">
                        <!-- MAIN SIDE RIGHT -->
                        <div class="ml-4">
                            <!-- AREA INBOX -->
                            <div class="col-sm-12 f-none mb-50 tab-content tab-announce">
                                <div class="tab-pane fade show active" id="inbox-1" role="tabpanel">
                                    <div class="white p-40 r-10 slimScroll" data-height="700">
                                        <a href="#" class="inbox-back">Back</a>
                                        <div class="d-flex">
                                            <div class="s-18 text-main wd-fl-dynamic">
                                                <strong>Abdul</strong>
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </div>
                                        <div class="s-18">
                                            Vivamus diam elit diam
                                        </div>
                                        <div class="s-18 chat-meta text-whitesmoke">
                                            To: Me, <a href="#">asdasdas@aasa.com</a>
                                        </div>
                                        <hr >
                                        <div class="s-18 my-3 message-content">
                                                <p>Hello User,</p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, in, nam officia sunt asperiores numquam laboriosam eius quam doloremque eos! Veniam quos similique dignissimos fuga repellat ea unde officia beatae, distinctio tempora laudantium vitae! Earum, neque reiciendis asperiores veritatis? Excepturi dicta ipsa perferendis omnis iure qui provident itaque modi architecto
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam, impedit tenetur soluta aut harum repellendus omnis, amet doloremque et.
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ipsa, tempore qui id. Quis quibusdam, fuga
                                                </p>
                                                <p>Thanks,<br>Abdul Pierce</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inbox-2" role="tabpanel">
                                    <div class="slimScroll white p-40 r-10" data-height="700">
                                        <a href="#" class="inbox-back">Back</a>
                                        <div class="d-flex">
                                            <div class="s-18 text-main wd-fl-dynamic">
                                                <strong>Pierce</strong>
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </div>
                                        <div class="s-18">
                                            Lorem ipsum dolor sit amet.
                                        </div>
                                        <div class="s-18 chat-meta text-whitesmoke">
                                            To: Me, <a href="#">asdasdas@aasa.com</a>
                                        </div>
                                        <hr >
                                        <div class="s-18 my-3 message-content">
                                                <p>Hello User,</p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, in, nam officia sunt asperiores numquam laboriosam eius quam doloremque eos! Veniam quos similique dignissimos fuga repellat ea unde officia beatae, distinctio tempora laudantium vitae! Earum, neque reiciendis asperiores veritatis? Excepturi dicta ipsa perferendis omnis iure qui provident itaque modi architecto
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam, impedit tenetur soluta aut harum repellendus omnis, amet doloremque et.
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ipsa, tempore qui id. Quis quibusdam, fuga
                                                </p>
                                                <p>Thanks,<br>Abdul Pierce</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inbox-3" role="tabpanel">
                                    <div class="slimScroll white p-40 r-10" data-height="700">
                                        <a href="#" class="inbox-back">Back</a>
                                        <div class="d-flex">
                                            <div class="s-18 text-main wd-fl-dynamic">
                                                <strong>Abdul Pierce</strong>
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </div>
                                        <div class="s-18">
                                            Ipsum Subject
                                        </div>
                                        <div class="s-18 chat-meta text-whitesmoke">
                                            To: Me
                                        </div>
                                        <hr >
                                        <div class="s-18 my-3 message-content">
                                                <p>Hello User,</p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, in, nam officia sunt asperiores numquam laboriosam eius quam doloremque eos! Veniam quos similique dignissimos fuga repellat ea unde officia beatae, distinctio tempora laudantium vitae! Earum, neque reiciendis asperiores veritatis? Excepturi dicta ipsa perferendis omnis iure qui provident itaque modi architecto
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam, impedit tenetur soluta aut harum repellendus omnis, amet doloremque et.
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ipsa, tempore qui id. Quis quibusdam, fuga
                                                </p>
                                                <p>Thanks,<br>Abdul Pierce</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inbox-4" role="tabpanel">
                                    <div class="slimScroll white p-40 r-10" data-height="700">
                                        <a href="#" class="inbox-back">Back</a>
                                        <div class="d-flex">
                                            <div class="s-18 text-main wd-fl-dynamic">
                                                <strong>AbdulPierce</strong>
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </div>
                                        <div class="s-18">
                                            Subject 4
                                        </div>
                                        <div class="s-18 chat-meta text-whitesmoke">
                                            To: Me
                                        </div>
                                        <hr >
                                        <div class="s-18 my-3 message-content">
                                                <p>Hello User,</p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, in, nam officia sunt asperiores numquam laboriosam eius quam doloremque eos! Veniam quos similique dignissimos fuga repellat ea unde officia beatae, distinctio tempora laudantium vitae! Earum, neque reiciendis asperiores veritatis? Excepturi dicta ipsa perferendis omnis iure qui provident itaque modi architecto
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam, impedit tenetur soluta aut harum repellendus omnis, amet doloremque et.
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ipsa, tempore qui id. Quis quibusdam, fuga
                                                </p>
                                                <p>Thanks,<br>Abdul Pierce</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inbox-5" role="tabpanel">
                                    <div class="slimScroll white p-40 r-10" data-height="700">
                                        <a href="#" class="inbox-back">Back</a>
                                        <div class="d-flex">
                                            <div class="s-18 text-main wd-fl-dynamic">
                                                <strong>Abdul Hz</strong>
                                            </div>
                                            <div class="s-18 chat-meta text-whitesmoke">
                                                oct 6, 2019 / 11:12 pm
                                            </div>
                                        </div>
                                        <div class="s-18">
                                            Subject Lorem ipsum dolor.
                                        </div>
                                        <div class="s-18 chat-meta text-whitesmoke">
                                            To: Me
                                        </div>
                                        <hr >
                                        <div class="s-18 my-3 message-content">
                                                <p>Hello User,</p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, in, nam officia sunt asperiores numquam laboriosam eius quam doloremque eos! Veniam quos similique dignissimos fuga repellat ea unde officia beatae, distinctio tempora laudantium vitae! Earum, neque reiciendis asperiores veritatis? Excepturi dicta ipsa perferendis omnis iure qui provident itaque modi architecto
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam, impedit tenetur soluta aut harum repellendus omnis, amet doloremque et.
                                                </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ipsa, tempore qui id. Quis quibusdam, fuga
                                                </p>
                                                <p>Thanks,<br>Abdul Pierce</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END AREA INBOX -->
                        </div>
                        <!-- END MAIN SIDE RIGHT -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../skin/js/app.js"></script>

<?php include('../resources/partials/foot.php');?>