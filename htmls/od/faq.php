<?php
    $author = 'Tunas';
    $titleBrowser = 'F.A.Q | Tunas';
    $titlePage = 'F.A.Q';
    $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime dignissimos illum libero at, porro expedita deserunt recusandae in, labore odit!" ;
    $img = "../skin/img/logo.svg"; // img to 
    $pg = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
?>
<?php include('../resources/partials/header.php');?>

    <div class="page has-sidebar-left height-full">

        <div class="container-fluid animatedParent">
            <div class="animated fadeInUpShort col-md-12 f-none">

                <ul class="no-list slide-acc slideFAQ mt-30">
                    <li>
                        <div class="titleHeadline" data-acc="click">
                            Lorem ipsum dolor sit.
                        </div>
                        <div class="detailHeadline" data-detail="description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam consectetur officia similique quia voluptatum praesentium asperiores illum quo dignissimos, sunt.
                            </p>
                            <div class="action mt-15">
                                <a href="#" class="text-main mr-5"><i>Edit</i></a>
                                <a href="#" class="text-red"><i>X Remove</i></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="titleHeadline" data-acc="click">
                            Lorem ipsum dolor sit amet.
                        </div>
                        <div class="detailHeadline" data-detail="description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum consequuntur assumenda veniam accusantium dolorem molestias laborum quasi maiores fugiat itaque!
                            </p>
                            <div class="action mt-15">
                                <a href="#" class="text-main mr-5"><i>Edit</i></a>
                                <a href="#" class="text-red"><i>X Remove</i></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="titleHeadline" data-acc="click">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ullam!
                        </div>
                        <div class="detailHeadline" data-detail="description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint saepe ea ipsam aperiam error vel dignissimos, vero. Ratione veniam est ullam quas! Architecto porro aliquid officia harum, beatae, hic eum?
                            </p>
                            <div class="action mt-15">
                                <a href="#" class="text-main mr-5"><i>Edit</i></a>
                                <a href="#" class="text-red"><i>X Remove</i></a>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
        
    </div>

    <script src="../skin/js/app.js"></script>

<?php include('../resources/partials/foot.php');?>