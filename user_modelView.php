<!-- This page uses the google model viewer instead of the BabylonJS model viewer to support augmented reality -->

<?php include('normal_header.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <link rel="stylesheet" href="css/page_three.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.js"></script>
    <!-- Loads <model-viewer> for old browsers like IE11: -->
    <script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js">
    </script>
</head>

<body>
    <script>
        $("#link1").text("Home");
        $("#link1").attr('href', 'index.php');
        $("#link2").text("Catalogue");
        $("#link2").attr('href', 'model_index.php');
    </script>

    <!-- Allow files upload to view models in the model viewer -->
    <div class="uploader">
        <div class="upload">
            <div class="upload-files">
                <header>
                    <p>
                        <i class="fas fa-cloud-upload-alt" id="icon1"></i>
                        <span class="up">up</span>
                        <span class="load">load</span>
                    </p>
                </header>
                <div class="body" id="drop">
                    <i class="fas fa-file-alt" id="icon2"></i>
                    <p class="pointer-none"><a href="" id="triggerFile">Browse</a> and upload a proper .glb file</p>
                    <input type="file" multiple="multiple" />

                    <p id="wrongFileMessage" style="color: red; display:none;">Incorrect file format. Please use a glb file.</p>
                </div>
                <footer>
                    <div class="divider">
                    </div>
                    <div class="list-files">
                        <!--   template   -->
                    </div>
                    <button class="importar">UPDATE FILES</button>
                </footer>
            </div>
        </div>
    </div>

    <div class="model_container">
        <model-viewer ar id="toggle-model" class="viewer" src="models/boudha.glb" background-color="#404040" ios-src="models/jigsaw.usdz" auto-rotate alt="A 3D model of an astronaut" camera-controls>
        </model-viewer>
    </div>

    <script>
        const $ = document.querySelector.bind(document);
        let App = {};
        App.init = (function() {
            function handleFileSelect(evt) {
                const files = evt.target.files;
                Object.keys(files).map(file => {
                    if (files[file].name.substring(files[file].name.length - 4, files[file].name.length) != ".glb") {
                        jQuery("#wrongFileMessage").css('display', 'inline-block');
                    } else {
                        jQuery("#wrongFileMessage").css('display', 'none');
                        let template = `${Object.keys(files)
                    .map(file => `<div class="file file--${file}">
                    <div class="name"><span>${files[file].name}</span></div>
                    <div class="progress active"></div>
                    <div class="done">
                    <a href="" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                    x="0px" y="0px" viewBox="0 0 1000 1000">
                    <g><path id="path" d="M500,10C229.4,10,10,229.4,10,500c0,270.6,219.4,490,490,490c270.6,0,490-219.4,490-490C990,229.4,770.6,10,500,10z M500,967.7C241.7,967.7,32.3,758.3,32.3,500C32.3,241.7,241.7,32.3,500,32.3c258.3,0,467.7,209.4,467.7,467.7C967.7,758.3,758.3,967.7,500,967.7z M748.4,325L448,623.1L301.6,477.9c-4.4-4.3-11.4-4.3-15.8,0c-4.4,4.3-4.4,11.3,0,15.6l151.2,150c0.5,1.3,1.4,2.6,2.5,3.7c4.4,4.3,11.4,4.3,15.8,0l308.9-306.5c4.4-4.3,4.4-11.3,0-15.6C759.8,320.7,752.7,320.7,748.4,325z"</g>
                    </svg>
                                    </a>
                    </div>
                    </div>`)
                    .join("")}`;

                        $("#drop").classList.add("hidden");
                        $("footer").classList.add("hasFiles");
                        $(".importar").classList.add("active");
                        setTimeout(() => {
                            $(".list-files").innerHTML = template;
                        }, 1000);

                        Object.keys(files).forEach(file => {
                            let load = 2000 + (file * 2000); // fake load
                            setTimeout(() => {
                                $(`.file--${file}`).querySelector(".progress").classList.remove("active");
                                $(`.file--${file}`).querySelector(".done").classList.add("anim");
                            }, load);
                        });
                    }
                });

            }
            $(".importar").addEventListener("click", () => {
                $(".list-files").innerHTML = "";
                $("footer").classList.remove("hasFiles");
                $(".importar").classList.remove("active");
                setTimeout(() => {
                    $("#drop").classList.remove("hidden");
                }, 500);
            });


            // trigger input
            $("#triggerFile").addEventListener("click", evt => {
                evt.preventDefault();
                $("input[type=file]").click();
            });

            // input change
            $("input[type=file]").addEventListener("change", handleFileSelect);
        })();
    </script>

</body>

</html>